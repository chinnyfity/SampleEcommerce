
@include('header')


    <!-- <div class="py-6 py-lg-8 mt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 text-left">
                    <h1><b>Welcome {{ $user->firstname }}</b></h1>
                </div>
            </div>
        </div>
    </div> -->

    <div class="py-6 py-lg-10_ pt-lg-8 pb-lg-10 mt-10 mainCon">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-5 p-0 pt-lg-12 pt-3">
                    <div class="dashboard_girl">
                    </div>
                </div>

                <div class="col-lg-7 p-0">
                    <div class="container ps-lg-0 ps-3">
                        <div class="row_">
                            <div class="col-lg-12 col-md-12 col-12 text-left">
                                <h1><b>Welcome {{ $user->firstname }}</b></h1>
                            </div>
                        </div>
                    </div>


                    @if($hasProduct > 0)
                        @if($user->bank_details == "")
                        <div class="container ps-lg-0 ps-3 div_add_bank">
                            <div class="row_">
                                <div class="col-lg-12 col-md-12 col-12 text-center notificatn_info">
                                    <h4>To be able to pay you we need your payout stripe account details</h4>
                                    <button type="button" class="btn btn-primary pe-5 ps-5 rounded-50" data-bs-toggle="modal" data-bs-target="#add_account">Add Stripe Account</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif

                    <div class="row mt-6">
                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 ps-4 pe-1">
                            <a href="{{ url('/') }}/dashboard/transactions/">
                                <div class="profile_box">
                                    <h3>My Wallet</h4>
                                    <p style="font-size:18px;font-weight:600">${{ $user->wallet }}</p>
                                    <div style="font-size:15px;" class="mt-4">View Transactions</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 ps-2 pe-4">
                            <a href="{{ url('/') }}/dashboard/profile/">
                                <div class="profile_box">
                                    <h3>My Profile</h4>
                                    <p>Update your profile and upload your ID to verify your account</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 pe-1 ps-4">
                            <div class="profile_box myNotificatns">
                                <h3>Notifications
                                    @if($notifys >= 1) 
                                        <span class="">{{$notifys}}</span>
                                    @endif
                                </h3>
                                <p>Check your notifications here</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 ps-2 pe-4">
                            <a href="{{ url('/') }}/dashboard/booked-services/">
                                <div class="profile_box">
                                    <h3>My Bookings</h4>
                                    <p>View or edit your booked services here</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 ps-4 pe-1">
                            <a href="{{ url('/') }}/dashboard/my-customers/">
                                <div class="profile_box">
                                    <h3>My Customers</h4>
                                    <p>Customers who booked my services</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 ps-2 pe-4">
                            <a href="{{ url('/') }}/post-services/">
                                <div class="profile_box">
                                    <h3>Post Services</h4>
                                    <p>View, edit or delete your services here</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 pe-1 ps-4">
                            <a href="{{ url('/') }}/dashboard/view-services/">
                                <div class="profile_box">
                                    <h3>View Services</h4>
                                    <p>View, edit or delete your services here</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 ps-2 pe-4">
                            <a href="{{ url('/') }}/dashboard/messages/">
                                <div class="profile_box">
                                    <h3>Messages
                                        @if($notifys >= 1) 
                                            <span class="">{{$user_messages}}</span>
                                        @else
                                            <span style="background:none!important;color:green;font-size:16px">{{$user_messages_read}}</span>
                                        @endif
                                    </h3>
                                    <p>View messages from your services</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 ps-4 pe-1">
                            <div class="profile_box">
                                <h3>Favorite Services</h4>
                                <p>View your favorite services you saved</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-6 ps-md-2 pe-md-2 pe-4 ps-2">
                            <a href="{{ url('/') }}/dashboard/password-setting/">
                                <div class="profile_box">
                                    <h3>Pasword Setting</h4>
                                    <p>Click here to change your password</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('footer')
