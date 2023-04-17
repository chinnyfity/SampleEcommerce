
<form action="javascript:;" class="form_post" autocomplete="off">
    {{ csrf_field() }}
    <div class="form_first pb-lg-9" style="display: nones">
        <div class="col-md-12 col-12 mb-5 text-center">
            <h1><b>
                @if($products)
                    @if($products->uuid != "")
                        Edit Your Services
                    @else
                        Post Your Services
                    @endif
                @else
                    Post Your Services
                @endif
            </b></h1>
            <p style="color:#d83131;line-height:23px;margin-top:-8px">Make sure you are rendering good services that are valid and authentic for people to patronize you without any complaint or reporting your services to us.</p>

            <p style="margin-top:-8px">Every lister should have a stripe account, <a href="https://stripe.com/" target="_blank">click here</a> to create one</p>
        </div>

        <input type="hidden" name="txt_edit_id" id="txt_edit_id" value="{{ $products ? $products->uuid : '' }}" />

        <input type="hidden" name="what_user" value="" />

        <div class="row mb-1">
            <div class="col-12">
                <div class="mb-3">
                    <label for="txt_item" class="form-label">Services Name</label>
                    <input type="text" class="form-control" id="txt_item" placeholder="Enter Your services Name" name="txt_item" value="{{ $products ? ucfirst($products->title) : '' }}">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-4">
                    <label for="txt_cat" class="form-label">Category</label>
                    <select class="select2_2" id="txt_cat" name="txt_cat" style="text-align:left;border-radius:10px!important;height:auto!important;padding:15px 10px!important">
                        <option value="">-Select Categories-</option>
                        @foreach($cats as $cat)
                        @php
                        $cat_name = $cat['cat_name'];
                        $sub_cat = $cat['name'];
                        $category = $cat['category'];
                        $sub_cat_id = $cat['id'];

                        $products ? $getCats = $products->category."-".$products->sub_category : $getCats = '';
                        @endphp
                        
                        <option value="{{ $category }}-{{ $sub_cat_id }}" {{ $getCats == $category."-".$sub_cat_id ? 'selected' : '' }}>{{ ucwords($cat_name) }} - {{ ucwords($sub_cat) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="home" class="form-label">Add Services Photos</label>
                    <label style="margin-left:4px;font-size:14px">Max no. of photos is 5</label>
                    
                    <input type="hidden" id="isPhotos" name="isPhotos" value="{{ $products ? count($productPhotos) : '' }}">

                    <div id="queue" class="text-center">
                        <div class="mt-1">
                            Image previews
                            <i class="mdi mdi-cloud-upload icon-shape_ icon-shape1_ rounded-circle"></i>

                            <div class="gallery1">
                                @if($products)
                                    @foreach($productPhotos as $picture)
                                        @php
                                        $imgId = $picture->id;
                                        $files = $picture->photos;
                                        $pic_path = asset('products/'.$files);
                                        @endphp
                                        <img src='{{ $pic_path }}' class='img_responsive_adm img{{$imgId}}' />
                                        <font class="remove_img remove_img{{$imgId}}" imgId="{{$imgId}}">x</font>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <input id="gallery-photo-add" class="txtPhoto uploadifive-button" name="txtPhoto[]" type="file" multiple="true">                    
                </div>
            </div>

            <div class="mt-3 row pe-md-2 pe-0">
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="txt_price" class="form-label">Price $</label>
                        <input type="number" class="form-control" id="txt_price"
                        placeholder="Enter price of services" name="txt_price" value="{{ $products ? $products->price : '' }}">
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="row">
                        <label for="days" class="form-label">Minimum booking</label>
                        <div class="col-md-7 pe-0">
                            <input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="days"
                            placeholder="Enter minimum days" value="1" name="txtdays" value="{{ $products ? $products->min_duration : '' }}">
                        </div>

                        <div class="col-md-5 pr-0 pl-0">
                            <select class="select2_2 form-control" id="txt_dur" name="txt_dur" style="padding:17px 8px!important">
                                <!-- <option value="minute" {{ $products && $products->min_duration == "minute" ? "selected" : ""; }} >/ Minute</option> -->

                                <!-- <option value="hour" {{ $products && $products->min_duration == "hour" ? "selected" : "" }} >/ Hour</option>

                                <option value="day" {{ $products && $products->min_duration == "day" ? "selected" : "" }} >/ day</option>

                                <option value="week" {{ $products && $products->min_duration == "week" ? "selected" : "" }} >/ week</option>

                                <option value="month" {{ $products && $products->min_duration == "month" ? "selected" : "" }} >/ month</option> -->

                                <option value="hour" {{ $products && $products->min_duration == "hour" ? "selected" : "" }} >/ hour</option>

                                <option value="session" {{ $products && $products->min_duration == "session" ? "selected" : "" }} >/ session</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="txtzip" class="form-label">Zip Code</label>
                        <input type="text" value="{{ $user->zip_code }}" class="form-control" id="zipcode" placeholder="Enter your zip code" name="txtzip" maxlength="6">

                        <div class="zipcode_output"></div>

                        <input type="hidden" value="{{ $user->longitude }}" id="long" name="long">
                        <input type="hidden" value="{{ $user->latitude }}" id="lati" name="lati">
                    </div>
                </div>
            </div>

            <div class="mt-0 row pe-md-2 pe-0">
                <div class="col-md-4 col-12 pe-1">
                    <div class="mb-3">
                        <label for="txt_state" class="form-label">State</label>
                        <input type="hidden" id="txt_state" name="txt_state" value="{{ $user->state }}">
                        <label class="form-control zipcode_state" style="background:#ddd!important;color:#777!important">{{ $user->state }}</label>
                        <?php /* ?>
                        <select class="select2_2" id="txt_state" name="txt_state">
                            <option value="">-Select State-</option>
                            @foreach($states as $state)
                            @php
                                $selected="";
                                $state_id = $state['id'];
                                $state = $state['state_name'];
                            @endphp

                            @if($products)
                                @if($state_id == $products->state)
                                    @php $selected = "selected"; @endphp
                                @endif
                            @else
                                @if($state_id == $user->state)
                                    @php $selected = "selected"; @endphp
                                @endif
                            @endif
                            <option value="{{ $state_id }}" 
                                {{$selected }}
                                >
                                {{ $state }}
                            </option>
                            @endforeach
                        </select>
                        <?php */ ?>
                    </div>
                </div>

                <div class="col-md-4 col-12 ps-1 pe-1">
                    <div class="mb-3">
                        <label for="txt_city" class="form-label">City</label>
                        <input type="hidden" id="txt_city" name="txt_city" value="{{ $user->city }}">
                        <label class="form-control zipcode_city" style="background:#ddd!important;color:#777!important">{{ $user->city }}</label>
                        <?php /* ?>
                        <select class="select2_2" id="txt_city" name="txt_city" autocomplete="off">
                            <!-- <option value="">-Select City-</option> -->
                            @if($user_uuid != "" && $user->city == "")
                                <option value="">-Select City-</option>
                            @else
                                <option value="">-Select City-</option>
                                @if(count($citys) > 0)
                                    @foreach($citys as $city)
                                        @php
                                            $selected="";
                                            $city_id = $city['id'];
                                            $city = $city['city'];
                                        @endphp

                                        @if($products)
                                            @if($city_id == $products->city)
                                                @php $selected = "selected"; @endphp
                                            @endif
                                        @else
                                            @if($city_id == $user->city)
                                                @php $selected = "selected"; @endphp
                                            @endif
                                        @endif
                                        <option value="{{ $city_id }}" {{ $selected }}>{{ $city }}</option>
                                    @endforeach
                                @endif
                            @endif
                        </select>
                        <?php */ ?>
                    </div>
                </div>

                <div class="col-md-4 ps-1">
                    <div class="mb-3">
                        <label for="txt_country" class="form-label">County</label>
                        <input type="hidden" id="txt_country" name="txt_country" value="{{ $user->country }}">
                        <label class="form-control zipcode_country" style="background:#ddd!important;color:#777!important">{{ $user->city }}</label>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row mb-1">
            <div class="col-lg-12">
                <div class="mb-2">
                    <label for="city" class="form-label mb-0">Description</label>
                </div>
            </div>

            <div class="col-lg-12 mb-8">
                <div id="editor">
                    @if(!$products)
                        Clear this and write your <b>services description</b>
                    @else
                        <p>{!! $products ? $products->description : '' !!}</p>
                    @endif
                </div>
                <textarea name="editor" style="display:none" id="hiddenArea">{!! $products ? nl2br(e($products->description)) : '' !!}</textarea>
            </div>
        </div>

        @php
        $paths = $products ? "/assets/products/".$products->video_file : "";
        @endphp

        <input type="hidden" name="txtvid_file" id="txtvid_file" value="{{ $products ? $products->video_file : '' }}">

        <div class="row mb-2 mt-n5">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="formFile" class="form-label form-label2 mb-1">Add Video (Optional)</label>
                    @if($products && $products->video_file != "")
                        <p class="p-0 mt-n2 mb-2"><a href="{{ $paths }}" target='_blank'>{{ $paths }}</a></p>
                    @endif
                    <input class="form-control" type="file" id="formFile" name="formFile" accept=".3gp, .mp4">

                    <p class="p-0 mt-1 mb-1" style="color:red;font-size:13.5px">Selecting a new video file will automatically replace the former one</p>
                </div>
            </div>
            
            <div class="btn-groups mt-2" role="group" aria-label="filterType">
                <input type="checkbox" class="btn-checks" id="agree" checked>
                <label class="btns btn-outline-secondarys btn-sm" for="agree">By clicking this, you agree to the <a href="{{ url('/') }}/terms/">terms and condition</a> of Sharreit</label>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                @if($user_uuid != "" && $persona_inquiry_id == "")                
                    <button type="button" class="btn btn-primary btn-md pe-7 ps-7 verifyBtn">
                        {{$products ? "Update Services" : "List Services"}}
                    </button>

                    <button type="submit" class="btn btn-primary btn-md pe-7 ps-7 cmdAddItems" style="display:none">
                        {{$products ? "Update Services" : "List Services"}}
                    </button>
                @else
                    <button type="submit" class="btn btn-primary btn-md pe-7 ps-7 cmdAddItems">
                        {{$products ? "Update Services" : "List Services"}}
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div class="form_sec text-center pb-6" style="display: none">
        <i class="mdi mdi-check-bold icon-shape icon-shape2 rounded-circle"></i>
        <h3 class="mt-3 mb-3" style="color:#25913d"><b>Your upload was successful</b></h3>
        <p style="font-size:16px; color:#444!important;line-height:26px;">The administrators will review your uploads and notify you as soon as possible. Meanwhile you can click on <b><a href="javascript:;" class="viewMyItems">Edit/View Product</a></b> if you want to view or make any change to your services.</p>

        <div class="offset-lg-2 col-lg-8 mt-4">                                
            <button type="button" class="btn btn-primary pe-5 ps-5 rounded-50 uploadAnother">Upload Another</button>

            <p class="mt-3"><b><a href="javascript:;" class="gotoListing">I'm Done</a></b></p>
        </div>

    </div>
</form>