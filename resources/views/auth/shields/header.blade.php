<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $page_title }} </title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('dashboard_files/vendor/chartist/css/chartist.min.css') }}">

	<link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">

	<!-- <link href="{{ asset('dashboard_files/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('dashboard_files/css/style.css') }}" rel="stylesheet">
	
	<link rel="stylesheet" href="{{ asset('css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap_modal.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
	<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	<link rel='stylesheet' href="{{ asset('css/sweetalert2.min.css') }}">
  	<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
	

	<link rel="stylesheet" href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" type="text/css"/>

</head>
<body>
	<input type="text" value="{{ url('/') }}" id="txtsite_url" style="display:none">
	<input type="text" value="{{ $page_name1 }}" id="page_name1" style="display:none">

	<div class="alert1 alert-danger"></div>
  	<div class="overlay1"></div>

	<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content border-0">
				<div class="modal-body p-0">
					<div class="card_ border-0 p-sm-3 p-2 justify-content-center">
						<div class="card-header_ pb-0 bg-white border-0 ">
							<div class="row">
								<div class="col ml-auto">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
								</div>
							</div>

							<div class="container_">
								<div class="col-md-12 modal_info"> Are you sure you want to delete this?</div>

								<div class="col-md-12 modal_desc">This will remove every content associated with this, continue?</div>
							</div>
							<input type="hidden" id="txtall_id">
							<input type="hidden" id="txtTable1">
							<input type="hidden" id="txtstatus_1">
						</div>
						
						<div class="card-body px-sm-4 mb-2 pt-1 pb-0">
							<div class="row pl-0 pr-0">								
								<div class="offset-md-7 col-md-5 offset-5 col-7 pl-0 pr-0 text-right">
									<button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button>

									<button type="button" class="btn btn-danger cmd_remove_adm" data-dismiss="modal">Delete</button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="edit_cat" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content border-0">
				<div class="modal-body p-0">
					<div class="card_ border-0 p-sm-3 p-2 justify-content-center">
						<div class="card-header_ pb-0 bg-white border-0 ">
							<div class="row">
								<div class="col ml-auto">
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
								</div>
							</div>

							<div class="container_">
								<div class="col-md-12 modal_info" style="color:green">Add New Sub Category to <font class="cat_name"></font></div>

								<form class="form_cats pl-10 mt-10" autocomplete="off">
									{{ csrf_field() }}
									<div class="row">
										<div class="mb-3 col-md-12">
											<input type="text" id="txtcat" placeholder="Enter sub category" class="form-control">
										</div>
									</div>
									
									<input type="hidden" id="txtid">
									<input type="hidden" id="txtTable">
								</form>
							</div>
						</div>
						
						<div class="card-body px-sm-4 mb-2 pt-1 pb-0">
							<div class="row pl-0 pr-0">								
								<div class="offset-md-7 col-md-5 offset-5 col-7 pl-0 pr-0 text-right">
									<button type="button" class="btn btn-light text-muted" data-bs-dismiss="modal">Cancel</button>

									<button type="button" class="btn btn-danger cmd_add_cat">Add</button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="chat_history" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content border-0">
				<div class="modal-body p-0">
					<div class="card_ border-0 p-sm-3 p-2 justify-content-center">
						<div class="card-header_ pb-0 bg-white border-0 ">
							<div class="row">
								<div class="col ml-auto">
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="position:relative;z-index:9"><span aria-hidden="true">&times;</span> </button>
								</div>
							</div>
							<input type="hidden" id="user_id">

							<div class="container_">
								<div class="col-md-12 modal_info" style="color:green;font-weight:500"></div>

								<div class="conversations mt-10"></div>
							</div>
						</div>
						
						<div class="card-body px-sm-4 mb-2 pt-1 pb-0">
							<div class="row pl-0 pr-0">								
								<div class="offset-md-7 col-md-5 offset-5 col-7 pl-0 pr-0 text-right">
									<button type="button" class="btn btn-light text-muted" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	

	@php $name = Route::currentRouteName(); @endphp
    <input type="hidden" value="{{$name}}" id="routeName">
    <input type="text" value="{{ url('/') }}" id="url" style="display:none">
    <input type="hidden" value="{{ csrf_token() }}" id="txt_token">
	<input type="hidden" value="{{ $page_name }}" id="page_names">

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div class="alert alert-danger alertMsg">
        <i class="fa fa-times"></i> this is an error message
    </div>
	

    <div id="main-wrapper">
        <div class="nav-header">
            <a href="../" class="brand-logo">
				<img src="{{ asset('images/favicon.png') }}" class="for_mobile small-logo">
				<img src="{{ asset('images/logo.png') }}" class="for_desktop">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
		
		
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                {{$page_title}}
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('images/no_picture.jpg') }}" width="20" alt=""/>
									<div class="header-info">
										<span>Admin</span>
									</div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('settings') }}" class="dropdown-item ai-icon">
										<i class="fa fa-cog"></i>
                                        <span class="ms-2">Settings </span>
                                    </a>

                                    <!-- <a href="#" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ms-2">Inbox </span>
                                    </a> -->

                                    <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon">
										<i class="fa fa-power-off"></i>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
		

        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow_ ai-icon" href="{{ route('indexs') }}" aria-expanded="false">
							<i class="flaticon-381-home-2"></i>
							<span class="nav-text">Dashboard</span>
						</a>

                    </li>
                    <li><a class="has-arrow_ ai-icon" href="{{ route('users') }}" aria-expanded="false">
							<i class="flaticon-381-user-7"></i>
							<span class="nav-text">View Users</span>
						</a>
                    </li>

					<li><a class="has-arrow_ ai-icon" href="{{ route('ratings') }}" aria-expanded="false">
							<i class="fa fa-star"></i>
							<span class="nav-text">Ratings</span>
						</a>
                    </li>

					<li><a class="has-arrow_ ai-icon" href="{{ route('user-chats') }}" aria-expanded="false">
							<i class="fa fa-comments"></i>
							<span class="nav-text">User Chats</span>
						</a>
                    </li>

                    <li><a class="has-arrow_ ai-icon" href="{{ route('services') }}" aria-expanded="false">
							<i class="flaticon-381-view-2"></i>
							<span class="nav-text">View Services</span>
						</a>
                    </li>

                    <li><a href="{{ route('bookings') }}" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Bookings</span>
						</a>
					</li>

					<li><a href="{{ route('notifications') }}" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-alarm-clock-1"></i>
							<span class="nav-text">Notifications</span>
						</a>
					</li>

					<li><a class="has-arrow_ ai-icon" href="{{ route('service-report') }}" aria-expanded="false">
							<i class="flaticon-381-flag-1"></i>
							<span class="nav-text">Service Report</span>
						</a>
                    </li>

					<li><a class="has-arrow_ ai-icon" href="{{ route('settings') }}" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Settings</span>
						</a>
                    </li>

					<li class="pb-40"><a href="{{ route('admin.logout') }}" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-turn-off"></i>
							<span class="nav-text">Logout</span>
						</a>
					</li>
                </ul>
			</div>
        </div>