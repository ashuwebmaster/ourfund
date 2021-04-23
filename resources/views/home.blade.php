@extends('layouts.master')
@section('title', 'Our Fund')
@section('content')

<div class="row">          
  <div class="w-100 show-m-view">
	<a class="btn bold fundraiser-tab-click active border-top-0 border-left-0 border-right-0 pl-0 pr-0 mr-4">Fundraisers</a>
	<a class="btn bold requests-tab-click border-top-0 border-left-0 border-right-0 pl-0 pr-0">Requests</a>
  </div>
	<div class="col-md-12 col-lg-6 our-funds-pd-0 fundraiser-tab">
		<div class="bg-light-ctm pt-5 px-4 pb-4 ctm-shadow-2">

			@if(Session::has('action-message-fundraiser'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('action-message-fundraiser') }}</p>
			@endif				
			<div class="d-flex justify-content-between mb-3 mobile-view-hide">
				<h3>Fundraisers</h3>
				<a class="btn btn-primary text-uppercase bold add-box" href="#" data-toggle="modal" data-target="#fundraiserModal" role="button">Add Your Fund</a>
			</div>
			<div class="w-100">
				<div id="main">
				  <div class="accordion" id="faq">
				 					@forelse ($fund_data['fundraisers'] as $fundraiser)
									  <div class="card shadow-sm">
										  <div class="card-header" id="faqhead{{$fundraiser->id}}">
										  @if($fund_data['is_admin'] =='true')     
											<ul class="list-unstyled mb-0 st-hvr">
											  <li class="dropdown">        
												<a class="rounded-circle " href="#" role="button" id="dropdownUser"
												  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												  <div class="avatar avatar-md avatar-indicators avatar-online"> 
													<svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													  <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
													</svg>
												  </div>
												</a> 
										
												<div class="dropdown-menu pb-2" aria-labelledby="dropdownUser">
												  <div class="">
													<ul class="list-unstyled">
													  <li>
														<a class="dropdown-item text-success bold" href="{{ route('fund.approveRejectFund',$fundraiser->id) }}" data-action="approved" id="approveRejectFund" data-id="{{$fundraiser->id}}" data-type="fundraiser">
														  <span class="mr-1">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-patch-check" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
															  <path fill-rule="evenodd" d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
															  <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
															</svg>
														  </span>
														  Approve</a>
													  </li>
													  <li>
														<a class="dropdown-item text-warning bold" href="{{ route('fund.approveRejectFund',$fundraiser->id) }}" data-action="rejected" id="approveRejectFund" data-id="{{$fundraiser->id}}" data-type="fundraiser">
														  <span class="mr-1">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-history" fill="#ffc107" xmlns="http://www.w3.org/2000/svg">
															  <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
															  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
															  <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
															</svg>
														  </span>
														  Reject</a>
													  </li>
													  <li>
														<a class="dropdown-item text-secondary bold" href="" data-action="edit" id="editFund" data-id="{{$fundraiser->id}}" data-type="fundraiser">
														  <span class="mr-1">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="#6c757d" xmlns="http://www.w3.org/2000/svg">
															  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
															  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
															</svg>
														  </span>
														  Edit</a>
													  </li>
													  <li>
														<a class="dropdown-item text-danger bold" href="{{ route('fund.destroy',$fundraiser->id) }}" id="deleteFund" data-id="{{$fundraiser->id}}" data-type="fundraiser">
														  <span class="mr-1">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
															  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
															  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
															</svg>
														  </span>
														  Delete</a>
													  </li>
													</ul>
												  </div>            
												</div>
											</li>
										  </ul>
											@endif
											  <a href="#" class="btn btn-header-link collapsed bold" data-toggle="collapse" data-target="#faq{{$fundraiser->id}}"
											  aria-expanded="true" aria-controls="faq{{$fundraiser->id}}"> {{ $fundraiser->fund_name }}
											   <span class="font-15"><small>Organized by {{ $fundraiser->full_name }}</small> </span>
											    @if($fund_data['is_admin'] =='true')  
													<small class="text-{{  $fundraiser->fund_status == 'approved' ? 'success' : ($fundraiser->fund_status == 'rejected' ? 'danger' : 'warning') }} bold"> - {{ ucfirst($fundraiser->fund_status) }}</small>
												@endif
											   </a>                                          
										  </div>
				                            <!--<img src="{{ url('public/fund-images/'.$fundraiser->image) }}">-->
										  <div id="faq{{$fundraiser->id}}" class="collapse" aria-labelledby="faqhead{{$fundraiser->id}}" data-parent="#faq">
											  <div class="card-body pt-0">
												  <div class="ctm-mb-3 d-flex">
												@if ($fundraiser->fb_url)
													<a href="{{ $fundraiser->fb_url }}" target="_blank" class="mr-2">
												  		 <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
														 width="25px" height="25px" fill="#010002" viewBox="0 0 97.75 97.75" style="enable-background:new 0 0 97.75 97.75;" xml:space="preserve"
														>
														<path d="M48.875,0C21.882,0,0,21.882,0,48.875S21.882,97.75,48.875,97.75S97.75,75.868,97.75,48.875S75.868,0,48.875,0z
															 M67.521,24.89l-6.76,0.003c-5.301,0-6.326,2.519-6.326,6.215v8.15h12.641L67.07,52.023H54.436v32.758H41.251V52.023H30.229V39.258
															h11.022v-9.414c0-10.925,6.675-16.875,16.42-16.875l9.851,0.015V24.89L67.521,24.89z"/>
													</svg>
												</a>
												@endif
												@if ($fundraiser->insta_url)
												<a href="{{ $fundraiser->insta_url }}" target="_blank" class="mr-2">
													<svg height="25px" viewBox="0 0 512 512" width="25px" xmlns="http://www.w3.org/2000/svg"><path d="m305 256c0 27.0625-21.9375 49-49 49s-49-21.9375-49-49 21.9375-49 49-49 49 21.9375 49 49zm0 0"/><path d="m370.59375 169.304688c-2.355469-6.382813-6.113281-12.160157-10.996094-16.902344-4.742187-4.882813-10.515625-8.640625-16.902344-10.996094-5.179687-2.011719-12.960937-4.40625-27.292968-5.058594-15.503906-.707031-20.152344-.859375-59.402344-.859375-39.253906 0-43.902344.148438-59.402344.855469-14.332031.65625-22.117187 3.050781-27.292968 5.0625-6.386719 2.355469-12.164063 6.113281-16.902344 10.996094-4.882813 4.742187-8.640625 10.515625-11 16.902344-2.011719 5.179687-4.40625 12.964843-5.058594 27.296874-.707031 15.5-.859375 20.148438-.859375 59.402344 0 39.25.152344 43.898438.859375 59.402344.652344 14.332031 3.046875 22.113281 5.058594 27.292969 2.359375 6.386719 6.113281 12.160156 10.996094 16.902343 4.742187 4.882813 10.515624 8.640626 16.902343 10.996094 5.179688 2.015625 12.964844 4.410156 27.296875 5.0625 15.5.707032 20.144532.855469 59.398438.855469 39.257812 0 43.90625-.148437 59.402344-.855469 14.332031-.652344 22.117187-3.046875 27.296874-5.0625 12.820313-4.945312 22.953126-15.078125 27.898438-27.898437 2.011719-5.179688 4.40625-12.960938 5.0625-27.292969.707031-15.503906.855469-20.152344.855469-59.402344 0-39.253906-.148438-43.902344-.855469-59.402344-.652344-14.332031-3.046875-22.117187-5.0625-27.296874zm-114.59375 162.179687c-41.691406 0-75.488281-33.792969-75.488281-75.484375s33.796875-75.484375 75.488281-75.484375c41.6875 0 75.484375 33.792969 75.484375 75.484375s-33.796875 75.484375-75.484375 75.484375zm78.46875-136.3125c-9.742188 0-17.640625-7.898437-17.640625-17.640625s7.898437-17.640625 17.640625-17.640625 17.640625 7.898437 17.640625 17.640625c-.003906 9.742188-7.898437 17.640625-17.640625 17.640625zm0 0"/><path d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm146.113281 316.605469c-.710937 15.648437-3.199219 26.332031-6.832031 35.683593-7.636719 19.746094-23.246094 35.355469-42.992188 42.992188-9.347656 3.632812-20.035156 6.117188-35.679687 6.832031-15.675781.714844-20.683594.886719-60.605469.886719-39.925781 0-44.929687-.171875-60.609375-.886719-15.644531-.714843-26.332031-3.199219-35.679687-6.832031-9.8125-3.691406-18.695313-9.476562-26.039063-16.957031-7.476562-7.339844-13.261719-16.226563-16.953125-26.035157-3.632812-9.347656-6.121094-20.035156-6.832031-35.679687-.722656-15.679687-.890625-20.6875-.890625-60.609375s.167969-44.929688.886719-60.605469c.710937-15.648437 3.195312-26.332031 6.828125-35.683593 3.691406-9.808594 9.480468-18.695313 16.960937-26.035157 7.339844-7.480469 16.226563-13.265625 26.035157-16.957031 9.351562-3.632812 20.035156-6.117188 35.683593-6.832031 15.675781-.714844 20.683594-.886719 60.605469-.886719s44.929688.171875 60.605469.890625c15.648437.710937 26.332031 3.195313 35.683593 6.824219 9.808594 3.691406 18.695313 9.480468 26.039063 16.960937 7.476563 7.34375 13.265625 16.226563 16.953125 26.035157 3.636719 9.351562 6.121094 20.035156 6.835938 35.683593.714843 15.675781.882812 20.683594.882812 60.605469s-.167969 44.929688-.886719 60.605469zm0 0"/></svg>
											   </svg>
											   @endif
											</a>
												</div>
												<p class="mb-0">
													<div class="row">
                                                        <div class="col-lg-6 col-md-6">
															@if($fund_data['is_admin'] =='true' && $fundraiser->phone_no) 
															<span class="bold d-block">Phone No : {{ $fundraiser->phone_no }}</span>
															@endif
															<?php 
															$url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
															$string = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $fundraiser->fund_description);
															?>
															{!! nl2br($string) !!}
														</div>
														<div class="col-lg-6 col-md-6">
														@if($fundraiser->image)
															<img src="{{ asset('fund-images/'.$fundraiser->image) }}" id="myImg" class="img-fluid zoom_img">
														@endif
														</div>
													</div>
												</p>
												<div class="ctm-highlight d-flex p-3 mt-2">
												    @if ($fundraiser->venmo)
													  <span class="mr-5"><img src="{{ asset('assets/img/venmo.png') }}" class="mr-2"> <a href="">{{ $fundraiser->venmo }}</a></span>
													@endif
													@if ($fundraiser->paypal)
													  <span><img src="{{ asset('assets/img/paypal.png') }}" class="mr-2"> <a href="">{{ $fundraiser->paypal }}</a></span>
													@endif
												</div>
											  </div>
										  </div>
									  </div>
									@empty
									<div class="card shadow-sm p-2 text-center">
										No Fundraiser Found!
									</div>									
									@endforelse
									  
									  
								  </div>
					</div>
			</div>
			<div class="w-100 m-vi-hide">
			  <a class="btn btn-primary text-uppercase bold w-100 p-3 box-2" href="#" data-toggle="modal" data-target="#fundraiserModal" role="button"><span class="plass-icn">+</span> Add Your Fund</a>
			</div>
		</div>                
	</div>

	<div class="col-md-12 col-lg-6 our-funds-pd-0 requests-tab">
	  <div class="bg-light-ctm pt-5 px-4 pb-4 ctm-shadow-2">
			@if(Session::has('action-message-request'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('action-message-request') }}</p>
			@endif				  
		  <div class="d-flex justify-content-between mb-3 mobile-view-hide">
			  <h3>Urgent Requests</h3>
			  <a class="btn btn-primary text-uppercase bold  add-box" href="#" data-toggle="modal" data-target="#requestModal" role="button">Submit A Request</a>
		  </div>
		  <div class="w-100">
			  <div id="main">
				<div class="accordion" id="urgent">
								@forelse ($fund_data['request'] as $request)
									  <div class="card shadow-sm">
										  <div class="card-header" id="faqhead{{$request->id}}">
										  @if($fund_data['is_admin'] =='true')     
											<ul class="list-unstyled mb-0 st-hvr">
											  <li class="dropdown">        
												<a class="rounded-circle " href="#" role="button" id="dropdownUser"
												  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												  <div class="avatar avatar-md avatar-indicators avatar-online"> 
													<svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													  <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
													</svg>
												  </div>
												</a> 
										      
												<div class="dropdown-menu pb-2" aria-labelledby="dropdownUser">
												  <div class="">
													<ul class="list-unstyled">
													  <li>
														<a class="dropdown-item text-success bold" href="{{ route('fund.approveRejectFund',$request->id) }}" data-action="approved" id="approveRejectFund" data-id="{{$request->id}}" data-type="request">
														  <span class="mr-1">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-patch-check" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
															  <path fill-rule="evenodd" d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
															  <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
															</svg>
														  </span>
														  Approve</a>
													  </li>
													  <li>
														<a class="dropdown-item text-warning bold" href="{{ route('fund.approveRejectFund',$request->id) }}" data-action="rejected" id="approveRejectFund" data-id="{{$request->id}}" data-type="request">
														  <span class="mr-1">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-history" fill="#ffc107" xmlns="http://www.w3.org/2000/svg">
															  <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
															  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
															  <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
															</svg>
														  </span>
														  Reject</a>
													  </li>
													  <li>
														<a class="dropdown-item text-secondary bold fundraiser-action" data-action="edit" id="editRequest" data-id="{{$request->id}}" data-type="request">
														  <span class="mr-1">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="#6c757d" xmlns="http://www.w3.org/2000/svg">
															  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
															  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
															</svg>
														  </span>
														  Edit</a>
													  </li>
													  <li>
														<a class="dropdown-item text-danger bold" href="{{ route('fund.destroy',$request->id) }}" id="deleteFund" data-id="{{$request->id}}" data-type="request">
														  <span class="mr-1">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
															  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
															  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
															</svg>
														  </span>
														  Delete</a>
													  </li>
													</ul>
												  </div>            
												</div>
											</li>
										  </ul>
											@endif
											  <a href="#" class="btn btn-header-link collapsed bold" data-toggle="collapse" data-target="#faq{{$request->id}}"
											  aria-expanded="true" aria-controls="faq{{$request->id}}"> {{ $request->fund_name }}
											   <br><span><small>Organized by {{ $request->full_name }}</small></span>
											    @if($fund_data['is_admin'] =='true')  												
													<small class="text-{{  $request->fund_status == 'approved' ? 'success' : ($request->fund_status == 'rejected' ? 'danger' : 'warning') }} bold"> - {{ ucfirst($request->fund_status) }}</small>
												@endif											   
											   </a>                                          
										  </div>
				  
										  <div id="faq{{$request->id}}" class="collapse" aria-labelledby="faqhead{{$request->id}}" data-parent="#faq">
											  <div class="card-body pt-0">
												  <div class="ctm-mb-3 d-flex">
												@if ($request->fb_url)
													<a href="{{ $request->fb_url }}" target="_blank" class="mr-2">
														<svg  width="25px" height="25px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
														viewBox="0 0 167.657 167.657" style="enable-background:new 0 0 167.657 167.657;" xml:space="preserve">
													   <path style="fill:#010002;" d="M83.829,0.349C37.532,0.349,0,37.881,0,84.178c0,41.523,30.222,75.911,69.848,82.57v-65.081H49.626
														   v-23.42h20.222V60.978c0-20.037,12.238-30.956,30.115-30.956c8.562,0,15.92,0.638,18.056,0.919v20.944l-12.399,0.006
														   c-9.72,0-11.594,4.618-11.594,11.397v14.947h23.193l-3.025,23.42H94.026v65.653c41.476-5.048,73.631-40.312,73.631-83.154
														   C167.657,37.881,130.125,0.349,83.829,0.349z"/>
												  		 </svg>
													</a>
												@endif
												@if ($request->insta_url)
												<a href="{{ $request->insta_url }}" target="_blank" class="mr-2">
													<svg height="25px" viewBox="0 0 512 512" width="25px" xmlns="http://www.w3.org/2000/svg"><path d="m305 256c0 27.0625-21.9375 49-49 49s-49-21.9375-49-49 21.9375-49 49-49 49 21.9375 49 49zm0 0"/><path d="m370.59375 169.304688c-2.355469-6.382813-6.113281-12.160157-10.996094-16.902344-4.742187-4.882813-10.515625-8.640625-16.902344-10.996094-5.179687-2.011719-12.960937-4.40625-27.292968-5.058594-15.503906-.707031-20.152344-.859375-59.402344-.859375-39.253906 0-43.902344.148438-59.402344.855469-14.332031.65625-22.117187 3.050781-27.292968 5.0625-6.386719 2.355469-12.164063 6.113281-16.902344 10.996094-4.882813 4.742187-8.640625 10.515625-11 16.902344-2.011719 5.179687-4.40625 12.964843-5.058594 27.296874-.707031 15.5-.859375 20.148438-.859375 59.402344 0 39.25.152344 43.898438.859375 59.402344.652344 14.332031 3.046875 22.113281 5.058594 27.292969 2.359375 6.386719 6.113281 12.160156 10.996094 16.902343 4.742187 4.882813 10.515624 8.640626 16.902343 10.996094 5.179688 2.015625 12.964844 4.410156 27.296875 5.0625 15.5.707032 20.144532.855469 59.398438.855469 39.257812 0 43.90625-.148437 59.402344-.855469 14.332031-.652344 22.117187-3.046875 27.296874-5.0625 12.820313-4.945312 22.953126-15.078125 27.898438-27.898437 2.011719-5.179688 4.40625-12.960938 5.0625-27.292969.707031-15.503906.855469-20.152344.855469-59.402344 0-39.253906-.148438-43.902344-.855469-59.402344-.652344-14.332031-3.046875-22.117187-5.0625-27.296874zm-114.59375 162.179687c-41.691406 0-75.488281-33.792969-75.488281-75.484375s33.796875-75.484375 75.488281-75.484375c41.6875 0 75.484375 33.792969 75.484375 75.484375s-33.796875 75.484375-75.484375 75.484375zm78.46875-136.3125c-9.742188 0-17.640625-7.898437-17.640625-17.640625s7.898437-17.640625 17.640625-17.640625 17.640625 7.898437 17.640625 17.640625c-.003906 9.742188-7.898437 17.640625-17.640625 17.640625zm0 0"/><path d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm146.113281 316.605469c-.710937 15.648437-3.199219 26.332031-6.832031 35.683593-7.636719 19.746094-23.246094 35.355469-42.992188 42.992188-9.347656 3.632812-20.035156 6.117188-35.679687 6.832031-15.675781.714844-20.683594.886719-60.605469.886719-39.925781 0-44.929687-.171875-60.609375-.886719-15.644531-.714843-26.332031-3.199219-35.679687-6.832031-9.8125-3.691406-18.695313-9.476562-26.039063-16.957031-7.476562-7.339844-13.261719-16.226563-16.953125-26.035157-3.632812-9.347656-6.121094-20.035156-6.832031-35.679687-.722656-15.679687-.890625-20.6875-.890625-60.609375s.167969-44.929688.886719-60.605469c.710937-15.648437 3.195312-26.332031 6.828125-35.683593 3.691406-9.808594 9.480468-18.695313 16.960937-26.035157 7.339844-7.480469 16.226563-13.265625 26.035157-16.957031 9.351562-3.632812 20.035156-6.117188 35.683593-6.832031 15.675781-.714844 20.683594-.886719 60.605469-.886719s44.929688.171875 60.605469.890625c15.648437.710937 26.332031 3.195313 35.683593 6.824219 9.808594 3.691406 18.695313 9.480468 26.039063 16.960937 7.476563 7.34375 13.265625 16.226563 16.953125 26.035157 3.636719 9.351562 6.121094 20.035156 6.835938 35.683593.714843 15.675781.882812 20.683594.882812 60.605469s-.167969 44.929688-.886719 60.605469zm0 0"/></svg>
											   </svg>
											   @endif
											</a>
												</div>
												<p class="mb-0">
													<div class="row">
                                                          <div class="col-lg-6 col-md-6">
															@if($fund_data['is_admin'] =='true' && $request->phone_no) 															
															<span class="bold d-block">Phone No : {{ $request->phone_no }}</span>
															@endif														  
															<?php 
															$url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
															$string = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $request->fund_description);
															?>
															{!! nl2br($string) !!}
														</div>
														<div class="col-lg-6 col-md-6">
														@if($request->image)
															<img src="{{ asset('fund-images/'.$request->image) }}" id="myImg" class="img-fluid zoom_img">
														@endif
														</div>
													</div>
												</p>
											  </div>
										  </div>
									  </div>
									@empty
									<div class="card shadow-sm p-2 text-center">
										No Request Found!
									</div>													
									@endforelse						
									
								</div>
				  </div>
		  </div>                  
			<div class="w-100 m-vi-hide">
			  <a class="btn btn-primary text-uppercase bold w-100 p-3 box-2" href="#" data-toggle="modal" data-target="#requestModal" role="button"><span class="plass-icn">+</span> Submit A Request</a>
			</div>
	  </div>                
  </div>
</div>
@endsection