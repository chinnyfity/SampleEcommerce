
@include('header')

    <div class="py-6 py-lg-8 mt-2 verify_div mainCon">
        <div class="container">
            <div class="row mt-md-8 mt-4 text-center" style="position:relative;z-index:-1">
                <div class="col-lg-12">
                    <!-- <img src="{{ url('/') }}/assets/images/oops.jpg"> -->
                    <img src="{{ asset('images/oops.png') }}">
                </div>
            </div>

            <div class="row">
                @if($page_name == "verify")
                    <div class="offset-md-2 col-md-8 col-12 mt-md-0 mt-n1 text-center">
                        <h1 class="m-0 mb-2"><b style="color:red; font-size:25px">Error! Please Update Your Profile</b></h1>
                        <p class="m-0 mt-3">This is to ensure that our users update their KYC before sharing their services for safety and security purposes. Please click the button below to update your profile.</p>

                        <div class="row mt-3 mb-5">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary btn-md pe-7 ps-7 cmdUpdateLink">Update Your Profile</button>
                            </div>
                        </div>
                    </div>
                @endif


                @if($page_name == "suspended")
                    <div class="offset-md-2 col-md-8 col-12 mt-md-n3 mt-n1 text-center">
                        <h1 class="m-0 mb-2"><b style="color:red; font-size:25px">Error! Your account has been suspended.</b></h1>
                        <p class="m-0 mt-3">We noticed a few things about your activities on the platform and we decided to suspend your account. This means that you may not be able to share your services and access your dashboard again.<br>Please contact the administrators for more details, thank you!</p>

                        <div class="row mt-5 mb-5">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary btn-md pe-7 ps-7 cmdContact">Contact Admin</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@include('footer')
