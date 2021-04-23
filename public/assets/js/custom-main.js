$(document).ready(function () {

    $('body').on('click', '#requestSubmit', function(){
        var registerForm = $("#requestForm");
        var formData = registerForm.serialize();
		var formData = new FormData(document.getElementById("requestForm"));
        $('.field-error' ).html( "" );
        $.ajax({
            url:'add-fund',
            type:'POST',
            data:formData,
			contentType: false,
			cache: false,
			processData: false,
            success:function(data) {
                console.log(data);
                if(data.errors) {
                    if(data.errors.fund_name){
                        $('#request_name-error' ).html( data.errors.fund_name[0] );
                    }
                    if(data.errors.fund_description){
                        $( '#request_description-error' ).html( data.errors.fund_description[0] );
                    }
                    if(data.errors.full_name){
                        $( '#request_full_name-error' ).html( data.errors.full_name[0] );
                    }
                    if(data.errors.fb_url){
                        $( '#request_fb_url-error' ).html( data.errors.fb_url[0] );
                    }
                    if(data.errors.insta_url){
                        $( '#request_insta_url-error' ).html( data.errors.insta_url[0] );
                    }
                    
                }
                if(data.success) {
                   location.reload();
                }
            },
        });
    });

    $("body").on("click","#deleteFund",function(e){
   
       if(!confirm("Do you really want to do this?")) {
          return false;
        }
   
       e.preventDefault();
       var id = $(this).data("id");
	   console.log(id);
       var type = $(this).data("type");
       var token = $("meta[name='csrf-token']").attr("content");
       $.ajax(
           {
             url: "deleteFund/"+id, 
             type: 'DELETE',
             data: {
               _token: token,
                   id: id,
				   type:type
           },  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
           success: function (response){
                if(response.message == true){
                    location.reload();
               }
           }
        });
        return false;
    });

    $("body").on("click","#approveRejectFund",function(e){
   
        if(!confirm("Do you really want to do this?")) {
           return false;
         }
    
        e.preventDefault();
        var id = $(this).data("id");
        var action = $(this).data("action");
		var type = $(this).data("type");
        var token = $("meta[name='csrf-token']").attr("content");
        var url = e.target;
        $.ajax(
            {
              url: "approveRejectFund/"+id, 
              type: 'PUT',
              data: {
                _token: token,
                    id: id,
                    action:action,
					type:type
            },  headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
            success: function (response){
                 console.log(response);
                if(response.message == true){
                     location.reload();
                }
            }
         });
         return false;
     });  

    $("body").on("click","#editFund",function(e){
        e.preventDefault();
		$('#fundUpdateForm [name ="fund_id"]').remove();
		$('#fundUpdateForm [name ="fund_type"]').remove();
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
            {
              url: "getFund/"+id, 
              type: 'get',
              data: {
                _token: token,
                    id: id,
            },  headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
            success: function (response){
                if(response.data){
					if(response.data.image){
					  $('#fundUpdateForm .image-upload-wrap').hide();
					  $('#fundUpdateForm .file-upload-image').attr('src', 'fund-images/'+response.data.image);
					  $('#fundUpdateForm .file-upload-content').show();			
					}					
					$('#fundUpdateForm [name ="fund_name"]').val(response.data.fund_name);
					$('#fundUpdateForm [name ="fund_description"]').val(response.data.fund_description);
					$('#fundUpdateForm [name ="venmo"]').val(response.data.venmo);
					$('#fundUpdateForm [name ="paypal"]').val(response.data.paypal);
					$('#fundUpdateForm [name ="full_name"]').val(response.data.full_name);
					$('#fundUpdateForm [name ="phone_no"]').val(response.data.phone_no);
					$('#fundUpdateForm [name ="fb_url"]').val(response.data.fb_url);
					$('#fundUpdateForm [name ="insta_url"]').val(response.data.insta_url);
					$('<input>').attr({ type: 'hidden', name: 'fund_id', value:id}).appendTo('#fundUpdateForm');					
					$('<input>').attr({ type: 'hidden', name: 'fund_type', value:'fundraiser'}).appendTo('#fundUpdateForm');					
					$('#updateFundModal').modal('toggle');
				}
            }
         });
         return false;
    }); 
	
    $("body").on("click","#editRequest",function(e){
        e.preventDefault();
		$('#requestUpdateForm [name ="fund_id"]').remove();
		$('#requestUpdateForm [name ="fund_type"]').remove();
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
            {
              url: "getFund/"+id, 
              type: 'get',
              data: {
                _token: token,
                    id: id,
            },  headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
            success: function (response){
                if(response.data){
					if(response.data.image){
					  $('#requestUpdateForm .image-upload-wrap').hide();
					  $('#requestUpdateForm .file-upload-image').attr('src', 'fund-images/'+response.data.image);
					  $('#requestUpdateForm .file-upload-image').attr('data-name', response.data.image);
					  $('#requestUpdateForm .file-upload-content').show();			
					}						
					$('#requestUpdateForm [name ="fund_name"]').val(response.data.fund_name);
					$('#requestUpdateForm [name ="fund_description"]').val(response.data.fund_description);
					$('#requestUpdateForm [name ="full_name"]').val(response.data.full_name);
					$('#requestUpdateForm [name ="phone_no"]').val(response.data.phone_no);
					$('#requestUpdateForm [name ="fb_url"]').val(response.data.fb_url);
					$('#requestUpdateForm [name ="insta_url"]').val(response.data.insta_url);
					$('<input>').attr({ type: 'hidden', name: 'fund_id', value:id}).appendTo('#requestUpdateForm');					
					$('<input>').attr({ type: 'hidden', name: 'fund_type', value:'request'}).appendTo('#requestUpdateForm');					
					$('#updateRequestModal').modal('toggle');
				}
            }
         });
         return false;
    }); 

    $('body').on('click', '#fundUpdate', function(e){
		e.preventDefault();
		$('#fundUpdateForm .field-error' ).html( "" );
		var formData = new FormData(document.getElementById("fundUpdateForm"));
		var id = $('#fundUpdateForm [name ="fund_id"]').val();
        $.ajax(
            {
            url: 'updateFund',
            type: 'POST',
            data: formData,  
			contentType: false,
			cache: false,
			processData: false,			  
			headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
            success: function (data){		
                if(data.errors) {
                        if(data.errors.fund_name){
                            $( '#fundUpdateForm #fund_name-error' ).html( data.errors.fund_name[0] );
                        }
                        if(data.errors.fund_description){
                            $( '#fundUpdateForm #fund_description-error' ).html( data.errors.fund_description[0] );
                        }
                        if(data.errors.full_name){
                            $( '#fundUpdateForm #full_name-error' ).html( data.errors.full_name[0] );
                        }
                        if(data.errors.fb_url){
                            $( '#fundUpdateForm #fb_url-error' ).html( data.errors.fb_url[0] );
                        }
                        if(data.errors.insta_url){
                            $( '#fundUpdateForm #insta_url-error' ).html( data.errors.insta_url[0] );
                        }
                    
                }
                if(data.success) {
                   location.reload();
                }
                
            }
         });
         return false;
    });	 

    $('body').on('click', '#requestUpdate', function(e){
		e.preventDefault();
		$('#requestUpdateForm .field-error' ).html( "" );
        var formData = new FormData(document.getElementById("requestUpdateForm"));
		var id = $('#requestUpdateForm [name ="fund_id"]').val();
        $.ajax(
            {
            url: 'updateFund', 
            type: 'POST',
            data: formData,  
			contentType: false,
			cache: false,
			processData: false,				  
			headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
            success: function (data){
                if(data.errors) {
                        if(data.errors.fund_name){
                            $( '#requestUpdateForm #fund_name-error' ).html( data.errors.fund_name[0] );
                        }
                        if(data.errors.fund_description){
                            $( '#requestUpdateForm #fund_description-error' ).html( data.errors.fund_description[0] );
                        }
                        if(data.errors.full_name){
                            $( '#requestUpdateForm #full_name-error' ).html( data.errors.full_name[0] );
                        }
                        if(data.errors.fb_url){
                            $( '#requestUpdateForm #fb_url-error' ).html( data.errors.fb_url[0] );
                        }
                        if(data.errors.insta_url){
                            $( '#requestUpdateForm #insta_url-error' ).html( data.errors.insta_url[0] );
                        }
                    
                }
                if(data.success) {
                   location.reload();
                }
                
            }
         });
         return false;
    });	
	

    $(".edit").focusout(function(){
        $(this).removeClass("editMode");		
		    var id = this.id;
			var value = $(this).text();
			console.log(value);
			$.ajax({
				url:'inlineEditor',
				type:'POST',
				data:{
                   id: id,
				   value:value
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success:function(data) {
				console.log(data);
				   console.log('hi');
				},
			}); 
    });	
});