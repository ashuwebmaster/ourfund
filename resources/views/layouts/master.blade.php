<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
  </head>
  <body>
    <header class="mb-3">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{ asset('assets/img/logo-white.png') }}" class="d-inline-block align-top" alt="" loading="lazy">
            </a>
			@if(Auth::check()) 
				<a class="text-secondary bold text-uppercase" href="{{ route('logout') }}"
				onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
				{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
				</form>
			@endif
          </nav>          
          <div class="col-md-12">
            <h5 class="ctm-banner-heading text-white"><span @if(Auth::check() && (Auth::user()->user_type == "admin")) contentEditable='true' class='edit' id="header_tagline" @endif >{{ $options }}</span></h5>
        </div>	  
    </header>
    <section class="col-lg-12 col-md-12 our-funds">
            @yield('content')
    </section>
	
<!---img zoom--->
<div id="myModal" class="modal my-ctm">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
</div>
<!---img zoom--->

<!---Modal start fundraiserModal here-->
<div class="modal fade" id="fundraiserModal" tabindex="-1" aria-labelledby="fundraiserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ctm-light-grey">
      <div class="modal-header border-bottom-0">
        <h4 class="modal-title" id="fundraiserModalLabel">Add a New Fundraiser <small>Provide us some basic information about your fundraiser so we can
          review before it goes live:</small></h4>
        <button type="button" class="close btn-st" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">CANCEL</span>
        </button>
      </div>
      <div class="modal-body pt-0">
        <form method="POST" id="fundForm" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" name="fund_type" value="fundraiser">
            <input type="text" name="fund_name" class="form-control" placeholder="Name of Fundraiser">
            <span class="text-danger">
              <small id="fund_name-error" class="field-error"></small>
            </span>                 
          </div>
          <div class="form-group">
            <div class="image-upload-wrap">
              <input class="file-upload-input" name="image_file" type='file' onchange="readURL(this);" accept="image/*" />
              <div class="drag-text">
                <h3>Drag and drop a flyer or select add image</h3>
              </div>
            </div>
            <div class="file-upload-content">
              <img class="file-upload-image" src="#" alt="your image" />
              <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="fund_description" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="Description of Fundraiser"></textarea>
            <span class="text-danger">
              <small id="fund_description-error" class="field-error"></small>
            </span>           
          </div>
          
          <div class="mb-4 st-inner">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group d-flex">
                  <img src="{{ asset('assets/img/venmo-icon.png') }}">
                  <input type="text" name="venmo" id="" class="form-control" placeholder="Venmo Account Name (optional)">                
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-group d-flex">
                <img src="{{ asset('assets/img/paypal-icon.png') }}">
                <input type="text" name="paypal" id="" class="form-control" placeholder="PayPal Account Email (optional)">               
              </div>
            </div>
          </div>
        </div>
          <p class="bold">Provide us some information about yourself for review purposes:</p>
          <div class="form-group">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name">
            <span class="text-danger">
                  <small id="full_name-error" class="field-error"></small>
            </span>           
          </div>
          <div class="form-group">
            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number (for verification purposes)">        
          </div>
          <div class="form-group">
            <input type="text" name="fb_url" class="form-control" placeholder="Facebook URL">
            <span class="text-danger">
                  <small id="fb_url-error" class="field-error"></small>
            </span>             
          </div>
          <div class="form-group">
            <input type="text" name="insta_url" class="form-control" placeholder="Instagram Handle">
            <span class="text-danger">
                  <small id="insta_url-error" class="field-error"></small>
            </span>              
          </div>
          <button type="button" id="fundSubmit" class="btn btn-primary text-uppercase bold pl-4 pr-4">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!---Modal end here-->

<!---Modal start request here-->
<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ctm-light-grey">
      <div class="modal-header border-bottom-0">
        <h4 class="modal-title" id="requestModalLabel">Add a New Request <br><small>Provide us some basic information about your request so we can
          review before it goes live:</small></h4>
          <button type="button" class="close btn-st" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">CANCEL</span>
        </button>
      </div>
      <div class="modal-body pt-0">
        <form method="POST" id="requestForm" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
           <input type="hidden" name="fund_type" value="request">
            <input type="text" name="fund_name" class="form-control" placeholder="Name of Request">
            <span class="text-danger">
              <small id="request_name-error" class="field-error"></small>
            </span>                 
          </div>
          <div class="form-group">
            <div class="image-upload-wrap">
              <input class="file-upload-input" name="image_file" type='file' onchange="readURL(this);" accept="image/*" />
              <div class="drag-text">
                <h3>Drag and drop a flyer or select add image</h3>
              </div>
            </div>
            <div class="file-upload-content">
              <img class="file-upload-image" src="#" alt="your image" />
              <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
              </div>
            </div>
          </div>		  
          <div class="form-group">
            <textarea name="fund_description" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="Description of Request"></textarea>
            <span class="text-danger">
              <small id="request_description-error" class="field-error"></small>
            </span>           
          </div>
          
          <p class="bold">Provide us some information about yourself for review purposes:</p>
          <div class="form-group">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name">
            <span class="text-danger">
                  <small id="request_full_name-error" class="field-error"></small>
            </span>           
          </div>
          <div class="form-group">
            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number (for verification purposes)">        
          </div>
          <div class="form-group">
            <input type="text" name="fb_url" class="form-control" placeholder="Facebook URL">
            <span class="text-danger">
                  <small id="request_fb_url-error" class="field-error"></small>
            </span>             
          </div>
          <div class="form-group">
            <input type="text" name="insta_url" class="form-control" placeholder="Instagram Handle">
            <span class="text-danger">
                  <small id="request_insta_url-error" class="field-error"></small>
            </span>              
          </div>
          <button type="button" id="requestSubmit" class="btn btn-primary text-uppercase bold pl-4 pr-4">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!---Modal start update fundraiserModal here-->
<div class="modal fade" id="updateFundModal" tabindex="-1" aria-labelledby="updateFundModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-light">
      <div class="modal-header border-bottom-0">
        <h4 class="modal-title" id="updateFundModalLabel">Add a New Fundraiser <br><small>Provide us some basic information about your fundraiser so we can
          review before it goes live:</small></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0">
        <form method="POST" id="fundUpdateForm" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" name="fund_type" value="fundraiser">
            <input type="text" name="fund_name" class="form-control" placeholder="Name of Fundraiser">
            <span class="text-danger">
              <small id="fund_name-error" class="field-error"></small>
            </span>                 
          </div>
          <div class="form-group">
            <div class="image-upload-wrap">
              <input class="file-upload-input" name="image_file" type='file' onchange="readURL(this);" accept="image/*" />
              <div class="drag-text">
                <h3>Drag and drop a flyer or select add image</h3>
              </div>
            </div>
            <div class="file-upload-content">
              <img class="file-upload-image" src="#" alt="your image" />
              <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
              </div>
            </div>
          </div>		  
          <div class="form-group">
            <textarea name="fund_description" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="Description of Fundraiser"></textarea>
            <span class="text-danger">
              <small id="fund_description-error" class="field-error"></small>
            </span>           
          </div>
          
          <div class="mb-4 st-inner">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group d-flex">
                  <img src="{{ asset('assets/img/venmo-icon.png') }}">
                  <input type="text" name="venmo" id="" class="form-control" placeholder="Venmo Account Name (optional)">                
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-group d-flex">
                <img src="{{ asset('assets/img/paypal-icon.png') }}">
                <input type="text" name="paypal" id="" class="form-control" placeholder="PayPal Account Email (optional)">               
              </div>
            </div>
          </div>
        </div>
          <p class="bold">Provide us some information about yourself for review purposes:</p>
          <div class="form-group">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name">
            <span class="text-danger">
                  <small id="full_name-error" class="field-error"></small>
            </span>           
          </div>
          <div class="form-group">
            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number (for verification purposes)">        
          </div>
          <div class="form-group">
            <input type="text" name="fb_url" class="form-control" placeholder="Facebook URL">
            <span class="text-danger">
                  <small id="fb_url-error" class="field-error"></small>
            </span>             
          </div>
          <div class="form-group">
            <input type="text" name="insta_url" class="form-control" placeholder="Instagram Handle">
            <span class="text-danger">
                  <small id="insta_url-error" class="field-error"></small>
            </span>              
          </div>
          <button type="button" id="fundUpdate" class="btn btn-primary text-uppercase bold pl-4 pr-4">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!---Modal Update start here-->
<div class="modal fade" id="updateRequestModal" tabindex="-1" aria-labelledby="updateRequestModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ctm-light-grey">
      <div class="modal-header border-bottom-0">
        <h4 class="modal-title" id="updateRequestModalLabel">Add a New Request <br><small>Provide us some basic information about your fundraiser so we can
          review before it goes live:</small></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0">
        <form method="POST" id="requestUpdateForm" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
           <input type="hidden" name="fund_type" value="request">
            <input type="text" name="fund_name" class="form-control" placeholder="Name of Request">
            <span class="text-danger">
              <small id="request_name-error" class="field-error"></small>
            </span>                 
          </div>
          <div class="form-group">
            <div class="image-upload-wrap">
              <input class="file-upload-input" name="image_file" type='file' onchange="readURL(this);" accept="image/*" />
              <div class="drag-text">
                <h3>Drag and drop a flyer or select add image</h3>
              </div>
            </div>
            <div class="file-upload-content">
              <img class="file-upload-image" src="#" alt="your image" />
              <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
              </div>
            </div>
          </div>		  
          <div class="form-group">
            <textarea name="fund_description" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="Description of Request"></textarea>
            <span class="text-danger">
              <small id="request_description-error" class="field-error"></small>
            </span>           
          </div>
          
          <p class="bold">Provide us some information about yourself for review purposes:</p>
          <div class="form-group">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name">
            <span class="text-danger">
                  <small id="request_full_name-error" class="field-error"></small>
            </span>           
          </div>
          <div class="form-group">
            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number (for verification purposes)">        
          </div>
          <div class="form-group">
            <input type="text" name="fb_url" class="form-control" placeholder="Facebook URL">
            <span class="text-danger">
                  <small id="request_fb_url-error" class="field-error"></small>
            </span>             
          </div>
          <div class="form-group">
            <input type="text" name="insta_url" class="form-control" placeholder="Instagram Handle">
            <span class="text-danger">
                  <small id="request_insta_url-error" class="field-error"></small>
            </span>              
          </div>
          <button type="button" id="requestUpdate" class="btn btn-primary text-uppercase bold pl-4 pr-4">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>	
    <script src="{{ asset('assets/js/custom-main.js') }}"></script>	
    <script>
      $(document).ready(function() {
        $(".fundraiser-tab-click").click(function(){
          $(".fundraiser-tab").show();
          $(".requests-tab").hide();
        });
        $(".requests-tab-click").click(function(){
          $(".fundraiser-tab").hide();
          $(".requests-tab").show();
        });

        $('.show-m-view a').click(function(e) {

        $('.show-m-view a').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
        });

		var modal = document.getElementById('myModal');
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { 
			modal.style.display = "none";
		} 
		var modalImg = document.getElementById("img01");
        $('body').on('click', '.zoom_img', function(){

			var img = this;
			var modalImg = document.getElementById("img01");
			modalImg.src = this.src;
			modal.style.display = "block";

		});
        $('body').on('click', '#fundSubmit', function(){
            var registerForm = $("#fundForm");
            var formData = new FormData(document.getElementById("fundForm"));
            $('.field-error' ).html( "" );
            $.ajax({
                url:'{{ url('add-fund') }}',
                type:'POST',
                data:formData,
			    contentType: false,
			    cache: false,
			    processData: false,
			     headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			   },
                success:function(data) {

                    if(data.errors) {
                        if(data.errors.fund_name){
                            $( '#fund_name-error' ).html( data.errors.fund_name[0] );
                        }
                        if(data.errors.fund_description){
                            $( '#fund_description-error' ).html( data.errors.fund_description[0] );
                        }
                        if(data.errors.full_name){
                            $( '#full_name-error' ).html( data.errors.full_name[0] );
                        }
                        if(data.errors.fb_url){
                            $( '#fb_url-error' ).html( data.errors.fb_url[0] );
                        }
                        if(data.errors.insta_url){
                            $( '#insta_url-error' ).html( data.errors.insta_url[0] );
                        }
                        
                    }
                    if(data.success) {
                       location.reload();
                    }
                },
            });
        });
      });

      function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});

/*         // Get the modal
        var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            modal.style.display = "none";
        } */


    </script>
  </body>
</html>	