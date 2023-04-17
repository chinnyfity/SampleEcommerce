
@include('header')

<div class="py-6 py-lg-6 mt-lg-10 mt-8 pb-lg-6 pb-7 mainCon">
    <div class="container">
        <div class="gotoDashboard">
            <a href="{{route('dashboard')}}">
                <i class="mdi mdi-arrow-left-bold icon-shape icon-shape3 icon-purple rounded-circle"></i>
                Back
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <form action="#" class="form_password" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form_first pb-lg-9 offset-md-2 col-md-8" style="display: nones">
                        <div class="col-12 mb-0 mt-lg-3 mt-md-5 mt-6 text-center">
                            <h2><b>Update Your Password</b></h2>
                        </div>

                        <div class="row mb-1 mt-7">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="txtpass1" class="form-label">Old Password</label>
                                    <input type="password" class="form-control" id="txtpass1" placeholder="Enter your old password" name="txtpass1">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="txtpass2" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="txtpass2" placeholder="Enter your new password" name="txtpass2">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="txtpass3" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="txtpass3" placeholder="Confirm your password" name="txtpass3">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-md pe-7 ps-7 cmdUpdatePass">Update Your Password</button>
                            </div>
                        </div>
                    </div>

                    <div class="form_sec text-center pb-6 mt-lg-3 mt-md-5 mt-5" style="display: none">
                        <i class="mdi mdi-check-bold icon-shape icon-shape2 rounded-circle"></i>
                        <h3 class="mt-3 mb-1" style="color:#25913d"><b>Your password has been updated.</b></h3>
                        <p style="font-size:16px; color:#444!important;line-height:26px;">Your password has been updated successfully.</p>

                        <div class="offset-lg-2 col-lg-8 mt-4">                                
                            <button type="button" class="btn btn-primary pe-7 ps-7 rounded-50 gotoFirst">Done</button>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@include('footer')
