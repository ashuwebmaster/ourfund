<?php

namespace App\Http\Controllers;
use App\Helpers\HttpHelper;
use App\Traits\Throttles;
use Exception;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
class CustomAuthController extends Controller
{
    //implement App\Traits\Throttles;
    use Throttles;
    private $httpHelper;
    /**
     * CustomAuthController constructor.
     */
    public function __construct() {
        //initialize HttpHelper
        $this->httpHelper = new HttpHelper();
    }
    /**
     * Show the main login page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm() {
        return view("auth.login");
    }
    /**
     * Authenticate against the  API
     * @param AuthenticationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function authenticate(AuthenticationRequest $request) {
        //too many failed login attempts
       if ($this->getThrottleValue("login", $this->generateLoginThrottleHash($request)) > 10) {
            return redirect()->back()->with('error', 'Too many failed login attempts.');
        }
        
        //attempt API authentication
        try {   
            $result = $this->httpHelper->post("authenticate", [
                'username' => $request->email, 
                'password' => $request->password
            ]);
            //create user to store in session
            $user = new User();
            /* Set any  user specific fields returned by the api request*/
            $user->email = $request->email;
            $user->field_1 = $result->field_1;
            //..
            //store authenticated and user in session to be checked by authentication middleware
            $request->session()->put('authenticated',true);
            $request->session()->put('user', $user);
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //track login attempt
            $this->incrementThrottleValue("login", $this->generateLoginThrottleHash($request));
            //remove user and authenticated from session
            $request->session()->forget('authenticated');
            $request->session()->forget('user');
            //redirect back with error
            return redirect()->back()->with('error', 'The credentials do not match our records');
        }
        //login success - redirect to home page
        $this->resetThrottleValue("login", $this->generateLoginThrottleHash($request));
        return redirect()->action("HomeController@home");
    }
    
    /**
     * Log user out
     * @param Request $request 
     * @return type
     */
    public function logout(Request $request) {
        //remove authenticated from session and redirect to login
        $request->session()->forget('authenticated');
        $request->session()->forget('user');
        return redirect()->action("CustomAuthController@showLoginForm");
    }
    
    // Login throttling functions
     
    /**
     * @param AuthenticationRequest $request
     * @return string
     */
    private function generateLoginThrottleHash(AuthenticationRequest $request) {
        return md5($request->email . "_" . $request->getClientIp());
    }
}
