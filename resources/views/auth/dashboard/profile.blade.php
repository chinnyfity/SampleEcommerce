
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
                
                <form action="#" class="form_profile" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form_first pb-lg-9" style="display: nones">
                        <div class="col-md-12 col-12 mt-md-3 mt-4 mb-5 text-center">
                            <h1><b>My Profile</b></h1>
                            @php
                            if($user->pics == ""){
                                $imgs1 = asset('images/avatar.jpg');
                                $yes_file=0;
                            }else{
                                $imgs1 = asset('profiles/'.$user->pics);
                                $yes_file=1;
                            }
                            $yes_file=1;
                            @endphp

                            <div class="col-md-12 col-sm-12 p-0 mb-30" style="text-align:center;">

                                <input type="hidden" name="txtf0" id="txtf0" value="{{$user->pics}}">
                                <input type="hidden" name="txt_idcard" id="txt_idcard" value="{{ $user->files }}">

                                <input type="hidden" name="txt_verified" id="txt_verified" value="{{ $user->files }}">
                                
                                <div class="row">
                                    <div id="img_prev" class="profile_pics3">
                                        <span>remove</span>

                                        <div class="col-12 text-center">
                                            <img src="{{ $imgs1 }}" src1="{{ $imgs1 }}" id="img_photo">
                                            <!-- <input id="isPhoto" value="" style="display:none;" /> -->
                                        </div>

                                        <div class="col-12">
                                            <input type="file" name="txt_pic" id="txt_pic" style="padding:4px; font-size:16px; margin:8px 0 0px 0; border:1px solid #ccc; display:none; border-radius: 7px; width: 60%; background:#f4f4f4;" accept=".jpg, .jpeg" />
                                        </div>

                                        <p style="color:#808000; text-align: center; font-size:16px; cursor:pointer; display:none; margin:10px 0 -15px 0;" id="hide_basic_uploader"><b>Click To Hide This</b></p>
                                        
                                    </div>
                                    <!-- <input name="isPhoto" type="hidden" value=""> -->
                                </div>
                                <p style="margin:4px 0 -2em 0; font-weight:600; font-size:15.5px; text-align: center; line-height: 21px;">
                                    <span style="color:#444; cursor:pointer;" class="basic_uploader">Touch the circle above Or <span style="color:#06C">click here</span> to try the simple uploader</span>
                                </p>
                            </div>
                        </div>

                        <div class="row mb-1 mt-10">
                            <div class="col-6 pe-1">
                                <div class="mb-3">
                                    <label for="txtfname" class="form-label">Firstname</label>
                                    <input type="text" value="{{ ucwords($user->firstname) }}" class="form-control" id="txtfname" placeholder="Enter your firstname" name="txtfname" style="text-transform: capitalize;">
                                </div>
                            </div>

                            <div class="col-6 ps-1">
                                <div class="mb-3">
                                    <label for="txtlname" class="form-label">Lastname</label>
                                    <input type="text" value="{{ ucwords($user->lastname) }}" class="form-control" id="txtlname" placeholder="Enter your lastname" name="txtlname" style="text-transform: capitalize;">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="txtemail_edit" class="form-label">Email</label>
                                    <input type="email" value="{{ strtolower($user->email) }}" class="form-control" style="text-transform: lowercase;" id="txtemail_edit" placeholder="Enter your email" name="txtemail">
                                </div>
                            </div>

                            <div class="col-sm-2 col-3 pe-0">
                                <div class="mb-3">
                                    <label for="txtphone" class="form-label">Code</label>
                                    <select class="select2_2 form-control" id="txt_code" name="txt_code" style="padding:17px!important;">
                                        <option value="">-Code-</option>
                                        @foreach($phoneCodes as $phoneCode)
                                        @php $phone_code = $phoneCode['phonecode']; @endphp
                                        <option value="{{ $phone_code }}" {{ $phone_code == $user->phone_code ? "selected" : "" }}>{{ $phone_code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-10 col-9">
                                <div class="mb-3">
                                    <label for="txtphone" class="form-label">Phone</label>
                                    <input type="number" value="{{ $user->phone }}" class="form-control" id="txtphone" placeholder="Enter your mobile number" name="txtphone">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="txtzip" class="form-label">Zip Code</label>
                                    <input type="text" value="{{ $user->zip_code }}" class="form-control" id="zipcode" placeholder="Enter your zip code" name="txtzip" maxlength="6">

                                    <div class="zipcode_output"></div>

                                    <input type="hidden" value="{{ $user->longitude }}" id="long" name="long">
                                    <input type="hidden" value="{{ $user->latitude }}" id="lati" name="lati">

                                    <!-- <div class="click_me">click me</div> -->
                                </div>
                            </div>

                            <div class="col-sm-4 col-6 pe-1">
                                <div class="mb-3">
                                    <label for="txt_state" class="form-label">State</label>
                                    <input type="hidden" id="txt_state" name="txt_state" value="{{ $user->state ? $user->state : '' }}">
                                    <label class="form-control zipcode_state" style="background:#ddd!important;color:#777!important">{{ $user->state ? $user->state : '---' }}</label>
                                    <?php /* ?>
                                    <select class="select2_2" id="txt_state" name="txt_state">
                                        <option value="">-Select State-</option>
                                        @foreach($states as $state)
                                        @php
                                        $state_id = $state['id'];
                                        $state = $state['state_name'];
                                        @endphp
                                        <option value="{{ $state_id }}" {{ $state_id == $user->state ? "selected" : "" }}>{{ $state }}</option>
                                        @endforeach
                                    </select>
                                    <?php */ ?>
                                </div>
                            </div>


                            <div class="col-sm-4 col-6 ps-sm-1 pe-sm-1">
                                <div class="mb-sm-3">
                                    <label for="txt_city" class="form-label">City</label>
                                    <input type="hidden" id="txt_city" name="txt_city" value="{{ $user->city ? $user->city : '' }}">
                                    <label class="form-control zipcode_city" style="background:#ddd!important;color:#777!important">{{ $user->city ? $user->city : '---' }}</label>
                                    <?php /* ?>
                                    <select class="select2_2" id="txt_city" name="txt_city">
                                        @if($user->city == "")
                                            <option value="">-Select City-</option>
                                        @else
                                            <option value="">-Select City-</option>
                                            @foreach($citys as $city)
                                            @php
                                            $city_id = $city['id'];
                                            $city = $city['city'];
                                            @endphp
                                            <option value="{{ $city_id }}" {{ $city_id == $user->city ? "selected" : "" }}>{{ $city }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <?php */ ?>
                                </div>
                            </div>

                            <div class="col-sm-4 col-12 ps-lg-1">
                                <div class="mb-3">
                                    <label for="txt_country" class="form-label">County</label>
                                    <input type="hidden" id="txt_country" name="txt_country" value="{{ $user->country ? $user->country : '' }}">
                                    <label class="form-control zipcode_country" style="background:#ddd!important;color:#777!important">{{ $user->country ? $user->country : '---' }}</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="txt_city" class="form-label">Your Address</label>
                                    <textarea style="height:5em" class="form-control" placeholder="Enter your address" name="txtaddress">{{ $user->address }}</textarea>
                                </div>
                            </div>

                            @php $bankDetails=""; @endphp
                            @if($user->bank_details != "")
                            @php
                                $bank_details = explode(" | ", $user->bank_details);
                                $bank_name = ucwords($bank_details[0]);
                                $bank_acct = $bank_details[1];
                            @endphp
                            <div class="col-sm-6 pe-sm-1">
                                <div class="mb-3">
                                    <label for="" class="form-label">Your Stripe Full Names</label>
                                    <input type="text" value="{{ $bank_name }}" class="form-control" id="txt_s_name" placeholder="Enter your stripe full names" name="txt_s_name">
                                </div>
                            </div>

                            <div class="col-sm-6 ps-sm-1">
                                <div class="mb-3">
                                    <label for="" class="form-label">Your Stripe Account Number</label>
                                    <input type="number" value="{{ $bank_acct }}" class="form-control" id="txt_s_acct" placeholder="Enter your stripe account number" name="txt_s_acct">
                                </div>
                            </div>
                            @endif
                        </div>


                        @if($user->files == "" && $user->verified == 0)
                            <div class="row mb-2 mt-2 kyc_form">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="mb-1 border-bottom">
                                            <label for="txt_city" class="form-label" style="font-size:25px">KYC</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class='m-0' style="line-height:21px;">Your Government ID (Driver's license or passport) is needed in order to share your services.</p>

                                        <p style="color:red; font-size:14px;line-height:21px;" class='m-0 mb-3 mt-1'>Note that your document(s) must contain exactly the names and address you specified above.</p>
                                    </div>

                                    <div class="mb-3">
                                        <input class="form-control" type="file" id="formFile" name="txtkyc[]" multiple accept=".jpg, .jpeg, .png, .doc, .docx, .pdf">
                                    </div>
                                </div>
                                
                                <!-- <div class="btn-groups mt-2" role="group" aria-label="filterType">
                                    <input type="checkbox" class="btn-checks" id="agree" checked>
                                    <label class="btns btn-outline-secondarys btn-sm" for="agree">By clicking this, you agree to the <a href="#">terms and condition</a> of Sharreit</label>
                                </div> -->
                            </div>

                            <div class="row_ mb-7 mt-5 kyc_uploaded" style="display:none">
                                <div class="col-lg-12">
                                    <div class="mb-1 border-bottom">
                                        <i class="mdi mdi-check-bold icon-shape icon-shape3 rounded-circle"></i>&nbsp;
                                        <label for="txt_city" class="form-label" style="font-size:20px;font-weight:600;color:#36963b">
                                        KYC Uploaded Successfully</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class='m-0 mt-2' style="line-height:23px;color:#333;">Your files have been uploaded <b>awaiting for approval</b>. It will take about an hour or less, kindly be patient, thank you.</p>

                                    <p class='m-0 mt-2' style="line-height:23px;color:#333;">Once we notice any change of details on your profile different from the documents you provided, your account will be suspended.</p>
                                </div>
                            </div>
                        @endif

                        @if($user->files != "" && $user->verified == 0)
                            <div class="row_ mb-7 mt-5 kyc_uploaded">
                                <div class="col-lg-12">
                                    <div class="mb-1 border-bottom">
                                        <i class="mdi mdi-check-bold icon-shape icon-shape3 rounded-circle"></i>&nbsp;
                                        <label for="txt_city" class="form-label" style="font-size:20px;font-weight:600;color:#36963b">
                                        KYC Uploaded Successfully</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class='m-0 mt-2' style="line-height:23px;color:#333;">Your files have been uploaded <b>awaiting for approval</b>. It will take about an hour or less, kindly be patient, thank you.</p>

                                    <p class='m-0 mt-2' style="line-height:23px;color:#333;">Once we notice any change of details on your profile different from the documents you provided, your account will be suspended.</p>
                                </div>
                            </div>
                        @endif

                        @if($user->files != "" && $user->verified == 1)
                            <div class="row_ mb-4 mt-3 kyc_uploaded">
                                <div class="col-lg-12">
                                    <div class="mb-1 border-bottom">
                                        <i class="mdi mdi-check-bold icon-shape icon-shape3 rounded-circle"></i>&nbsp;
                                        <label for="txt_city" class="form-label" style="font-size:20px;font-weight:600;color:#36963b">
                                        Your KYC Has Been Verified</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class='m-0 mt-2' style="line-height:23px;font-size:15px;color:#333;">You can now share your services but once we notice any change of details on your profile different from the documents you provided, <span style="color:red">your account will be suspended.</span></p>
                                </div>
                            </div>
                        @endif


                        <div class="row_ mb-7 mt-0 kyc_uploaded">
                            <div class="col-lg-12">
                                <div class="mb-1 border-bottom">
                                    <label for="txt_city" class="form-label" style="font-size:20px;font-weight:600;color:#36963b;line-height:27px">
                                    Enable 2 Factor Authentication (Optional)</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <p class='m-0 mt-0' style="line-height:23px;font-size:16px;color:#444;"><font class='fa_code'>{{ $user->is2fa == 1 ? 'Disable 2-step verification and enable just one-step' : 'Enable a 2-step verification authentication to provide you a more higher security.' }}</font></p>
                            </div>

                            <button type="button" class="btn btn-primary btn-md mt-3 pe-4 ps-4 cmd2FactorAuth" style="opacity:0.9; {{ $user->is2fa == 1 ? 'background:red; border-color:red' : 'background:#2b275c; border-color:#2b275c' }}">{{ $user->is2fa == 1 ? 'Disable 2FA' : 'Enable Now' }}</button>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-md pe-7 ps-7 cmdUpdateProfile">Update Your Profile</button>
                            </div>
                        </div>
                    </div>

                    <div class="form_sec text-center pb-6" style="display: none">
                        <i class="mdi mdi-check-bold icon-shape icon-shape2 rounded-circle"></i>
                        <h3 class="mt-3 mb-3" style="color:#25913d"><b>Your profile has been updated.</b></h3>
                        <p style="font-size:16px; color:#444!important;line-height:26px;">Your profile has been updated. You can share your services after some review of your changes by the administrators.</p>

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