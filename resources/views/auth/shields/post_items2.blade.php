
<form action="#" class="form_post">
    {{ csrf_field() }}
    <div class="form_first pb-lg-9" style="display: nones">
        <div class="col-md-12 col-12 mb-5 text-center">
            <h1><b>
                @if($products)
                    @if($products->uuid != "")
                        Edit User Services
                    @endif
                @else
                    Post User Service
                @endif
            </b></h1>
            <p style="color:#d83131;line-height:23px;margin-top:-8px">Editing user's service information is not a good idea unless you have notified them of the updates you are about to make on their services.</p>
        </div>

        <input type="hidden" name="txt_edit_id" id="txt_edit_id" value="{{ $products ? $products->uuid : '' }}" />

        <input type="hidden" name="what_user" value="admin" />

        <div class="row mb-1">
            <div class="col-12">
                <div class="mb-3">
                    <label for="propertyname" class="form-label">Service Name</label>
                    <input type="text" class="form-control" id="propertyname" placeholder="Enter Your service Name" name="txt_item" value="{{ $products ? ucfirst($products->title) : '' }}">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-4">
                    <label for="home" class="form-label">Category</label>
                    <select class="select2_2" id="home" name="txt_cat">
                        <option value="">-Select Categories-</option>
                        @foreach($cats as $cat)
                        @php
                        $sub_cat = $cat['name'];
                        $category = $cat['category'];
                        $sub_cat_id = $cat['id'];

                        $products ? $getCats = $products->category."-".$products->sub_category : $getCats = '';
                        @endphp
                        
                        <option value="{{ $category }}-{{ $sub_cat_id }}" {{ $getCats == $category."-".$sub_cat_id ? 'selected' : '' }}>{{ ucwords($sub_cat) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="home" class="form-label">Add Service Photos</label>
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
                        <label for="price" class="form-label">Price $</label>
                        <input type="number" class="form-control" id="price"
                        placeholder="Enter price of service" name="txt_price" value="{{ $products ? $products->price : '' }}">
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
                            <select class="select2_2 form-control" id="home" name="txt_cat" style="padding:17px 8px!important">
                                <option value="minute" {{ $products && $products->min_duration == "minute" ? "selected" : ""; }} >/ Minute</option>

                                <option value="hour" {{ $products && $products->min_duration == "hour" ? "selected" : "" }} >/ Hour</option>

                                <option value="day" {{ $products && $products->min_duration == "day" ? "selected" : "" }} >/ day</option>

                                <option value="week" {{ $products && $products->min_duration == "week" ? "selected" : "" }} >/ week</option>

                                <option value="month" {{ $products && $products->min_duration == "month" ? "selected" : "" }} >/ month</option>

                                <option value="session" {{ $products && $products->min_duration == "session" ? "selected" : "" }} >/ session</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 row pe-md-2 pe-0">
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="txt_state" class="form-label">State</label>
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
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="txt_city" class="form-label">City</label>
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
                        Clear this and write your <b>service description</b>
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
                <button type="submit" class="btn btn-primary btn-md pe-7 ps-7 cmdAddItems">
                    {{$products ? "Update Service" : "List Service"}}
                </button>
            </div>
        </div>
    </div>

    <div class="form_sec text-center pb-6" style="display: none">
        <i class="mdi mdi-check-bold icon-shape icon-shape2 rounded-circle"></i>
        <h3 class="mt-3 mb-2" style="color:#25913d"><b>User service was successfully updated</b></h3>
        <p style="font-size:16px; color:#444!important;line-height:26px;">Your update will notify the user via post notification on the platform.</p>

        <div class="offset-lg-2 col-lg-8 mt-4">                                
            <button type="button" class="btn btn-primary pe-5 ps-5 rounded-50 uploadAnother">&nbsp;&nbsp; Back &nbsp;&nbsp;</button>

            <p class="mt-3"><b><a href="javascript:history.back()">I'm Done</a></b></p>
        </div>

    </div>
</form>