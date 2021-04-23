<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Models\Fund;
use App\Models\Option;
use Session;
use App\Mail\FundMail;
use Illuminate\Support\Facades\Mail;

class FundController extends Controller
{


    public function showFundraisers(){
        $fund_data = array();
        $fund_data['is_admin'] = false;
        if(isset(Auth::user()->user_type) && Auth::user()->user_type == 'admin')
        {
            $fund_data['is_admin'] = true;
            $fund_data['fundraisers'] = Fund::where('fund_type','=','fundraiser')->orderByDesc('id')->get();
            $fund_data['request'] = Fund::where('fund_type','=','request')->orderByDesc('id')->get();
        }
        else
        {
            $fund_data['fundraisers'] = Fund::where('fund_type','=','fundraiser')->where('fund_status','=', 'approved')->orderByDesc('id')->get();
            $fund_data['request'] = Fund::where('fund_type','=','request')->where('fund_status','=', 'approved')->orderByDesc('id')->get();
        }
       
        return view('home')->with('fund_data',$fund_data);       
    }

    public function add_fund(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fund_name'         => 'required',
            'fund_description'  => 'required|min:20',
            'full_name'         => 'required',
            'fb_url'            => 'required',
            'insta_url'         => 'required',
        ]);

        if ($validator->passes()) {
            //image upload
			$imageName='';
			if ($request->hasFile('image_file')){
				if ($request->file('image_file')->isValid()) {
					$imageName = time().'.'.$request->image_file->extension();  
					$request->image_file->move(public_path('fund-images'), $imageName);
				}
			}
            // Store your user in database 
            $fund_type = $request->get('fund_type');
			$fund_data = [
                'fund_name'          => $request->get('fund_name'),
                'fund_description'   => $request->get('fund_description'),
                'fund_type'          => $fund_type,
                'venmo'              => $request->get('venmo'),
                'paypal'             => $request->get('paypal'),
                'full_name'          => $request->get('full_name'),
                'phone_no'           => $request->get('phone_no'),
                'fb_url'             => $request->get('fb_url'), 
                'insta_url'          => $request->get('insta_url'), 
                'image'         	 => $imageName, 
                'fund_status'        => 'pending', 
            ];
            $new_fund = new Fund($fund_data);

            $new_fund->save();				
			$fund_data['email']=['midriffdeveloper7@gmail.com','ashu777joshi@gmail.com'];
			$fund_data['subject']= 'New  '. ucfirst($fund_type) .' Added';
			Mail::to($fund_data['email'])->send(new FundMail($fund_data));				
            Session::flash('action-message-'.$fund_type, ucfirst($fund_type).' Added successfully and wait for admin approval.'); 
            return Response::json(['success' => '1']);
        }
        
        return Response::json(['errors' => $validator->errors()]);

    }
	
    public function updateFund(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fund_name'         => 'required',
            'fund_description'  => 'required|min:20',
            'full_name'         => 'required',
            'fb_url'            => 'required',
            'insta_url'         => 'required',
        ]);

        $input = $request->all();

        if ($validator->passes()) {
			if ($request->hasFile('image_file')){
				if ($request->file('image_file')->isValid()) {
					$imageName = time().'.'.$request->image_file->extension();  
					$request->image_file->move(public_path('fund-images'), $imageName);
				}
			} 
            // Store your user in database 
            $fund_type = $request->get('fund_type');
			$fund = fund::find($request->get('fund_id'));
			$fund->fund_name 		= $request->get('fund_name');
			$fund->fund_description = $request->get('fund_description');
			$fund->venmo			= $request->get('venmo');
			$fund->full_name 		= $request->get('full_name');
			$fund->phone_no 		= $request->get('phone_no');
			$fund->fb_url 			= $request->get('fb_url');
			$fund->insta_url 		= $request->get('insta_url');
			if(isset($imageName)){
				$fund->image = $imageName;
			}
            $fund->update();	
			Session::flash('action-message-'.$fund_type, ucfirst($fund_type).' Updated successfully.'); 
			return Response::json(['success' => '1']);			
        }
        
        return Response::json(['errors' => $validator->errors()]);

    }

    public function destroy(Request $request, $id){

        $fund = fund::find($id);
        $fund->delete();
        Session::flash('action-message-'.$request->get('type'), ucfirst($request->get('type')).' deleted successfully!'); 
		Session::flash('alert-class', 'alert-danger'); 
        return response()->json([
            'message' => true
        ]);
    }  
	
    public function getFund($id){
       $fund = fund::find($id);
	   return Response::json(['success' => '1', 'data' => $fund]);
    }    

    public function approveRejectFund(Request $request, $id){
        $action = $request->input('action');
        $fund = fund::find($id);
        $fund->fund_status = $action;
        $fund->update();
        Session::flash('action-message-'.$request->get('type'), ucfirst($request->get('type'))." ".$action.' successfully!'); 
        if($action == "rejected"){
            Session::flash('alert-class', 'alert-danger'); 
        }else{
            Session::flash('alert-class', 'alert-success'); 
        }
        return response()->json([
            'message' => true
        ]);
    } 
	
    public function inlineEditor(Request $request){
       	$option = Option::updateOrCreate([
			'name'   => $request->get('id'),
		],[
			'value'  => $request->get('value'),
		]);	
    }   
    
}
