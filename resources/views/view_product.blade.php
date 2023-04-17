@include('header')

   @php
    $id = $product->id;
    $titles = ucwords($product->title);
    $price = $product->price;
    $views = $product->views;
    $cwidth = $product->canvas_width;
    $cheight = $product->canvas_height;
    $descrip = nl2br($product->descrip);
    $gen_num1=substr(time(), 5);
   @endphp
    
    <div class="shop-parallax-banner shop-parallax-banner1" style="">
		<div class="title">Cart</div>
    </div>


    <nav class="woocommerce-breadcrumb"><a href="#">Home</a>&nbsp;&#47;&nbsp;Shop</nav>
    <header class="woocommerce-products-header">
        <h1 class="woocommerce-products-header__title page-title">Shop</h1>	
    </header>
    

    <div class="container containerxx scrollups">
    <div class="row">

    <div class="woocommerce-notices-wrapper alert_cart_add alert_cart_add1" style="display:none;">
        <div class="woocommerce-message1 alrt_msg" role="alert">
            <div class="row">
                <div class="col-9 col-sm-8 text-left mt-sm-10">
                    <span class="fa fa-times closealert"></span>
                    <span>&ldquo;<font class="item_name"></font>&rdquo; has been added to your cart.</span>
                </div>

                <div class="col-3 col-sm-4 mt-sm-10 mt-xs-10 text-right">
                    <a href="javascript:;" tabindex="1" class="button wc-forward view_carts">View cart</a>
                </div>
            </div>
        </div>

        
    </div>


        <div class="col-md-5 col-md-5i col-sm-5 entry-summary">
            <h1 class="product_title entry-title for_mobile">{{ $titles }}</h1>

            <div data-thumb="" data-thumb-alt="" class="woocommerce-product-gallery__image_ show_imgs">
                <img src="{{ asset('products/'.$product->file1) }}" class="wp-post-image_" alt="" />
            </div>

            <div class="thumbs">
                @if($product->file1 != "")
                    <img src="{{ asset('products/'.$product->file1) }}" class='wp-post-image_' alt='' />
                @endif

                @if($product->file2 != "")
                    <img src="{{ asset('products/'.$product->file2) }}" class='wp-post-image_' alt='' />
                @endif

                @if($product->file3 != "")
                    <img src="{{ asset('products/'.$product->file3) }}" class='wp-post-image_' alt='' />
                @endif
            </div>
        </div>


        <div class="col-md-7 col-sm-7">

            <div class="summary entry-summary">
                <h2 class="product_title entry-title for_desktop">{{ $titles }}</h2>
                <p><b>Category:</b> {{ $category }}</p>

                <div class="woocommerce-product-rating">
                    <a class="woocommerce-review-link" rel="nofollow">{{ $views }}</a> |
                    <a href="javascript:;" class="woocommerce-review-link write_review" rel="nofollow">Write a review (<span class="rev_cnt_span">{{ $review_counts }}</span>)</a>
                </div>

                <p class="price price2">
                    <span class="woocommerce-Price-amount amount amount2">&#8358;{{ number_format($price) }}</span>
                </p>

                <div class="social-wrap">
                    <ul class="social1">
                        <li class="social-facebook"><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                        <li class="social-tweeter"><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="social-whatsapp for_desktop1"><a href=""><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

                <p class="canvas_size">
                    <p>Size: {{ $cwidth }} W &nbsp;x&nbsp; {{ $cheight }} H</p>
                    <p class="mt--5">Quantity: {{ $product->qty }}</p>
                </p>

                <div class="woocommerce-product-details__short-description">
                    <p>{{ $descrip }}</p>
                </div>

                <div class="quantity">
                    <select id="txtqty{{ $id }}" class="input-text qty" style="color:#222 !important">
                        @for($i=1; $i<=$product->qty; $i++)
                            <option value='{{ $i }}'>{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="button" name="add-to-cart" class="single_add_to_cart_button add_to_cart_btn button alt add_to_basket" id="add_to_basket{{$id}}" ids="{{$id}}" title="{{ $titles }}" qty="1" main_qty="{{ $product->qty }}" price="{{ $price }}" image="{{ $product->file1 }}"><span class="fa fa-shopping-cart"></span> Add to cart</button>
                </div>

            </div>

        </div>

        <div style="clear:both"></div>
        <br><br>


        <div class="container_ mytabs">

            <ul class="tabs">
                <input type="hidden" id="txtrevs" value="{{ $review_counts }}" />
                <li class="tab-link current" data-tab="tab-1">Similar Products</li>
                <li class="tab-link" data-tab="tab-2">Write Review</li>
                <li class="tab-link refresh_rev" pid="{{ $id }}" data-tab="tab-3">Reviews(<span class="rev_cnt_span">{{ $review_counts }}</span>)</li>
            </ul>

            <div id="tab-1" class="tab-content current show_imgs1 pt-40 pb-30">
                @if(count($relateds) > 0)
                    @foreach ($relateds as $related)
                        @php
                        $titles1 = str_replace(" ", "-", strtolower($related->title));
                        $gen_num1=substr(time(), 5);
                        @endphp

                        <div class="col-md-3 col-sm-4 col-xs-6 text-truncate pl-xs-10 pr-xs-10">
                            <a href="javascript:;" class="open_views sim_prods" id="{{ $related->id }}{{ $gen_num1 }}" titles="{{ $titles1 }}" title="{{ $related->title }}" style="color:#333;">
                                <img src="{{ asset('products/'.$related->file1) }}" alt="" />
                                <p>{{ ucfirst($related->title) }}</p>
                            </a>
                        </div>
                    @endforeach
                @else
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 pt-20 pb-20">No related products found yet</div>
                    </div>
                </div>
                @endif
            </div>
            <div style="clear:both"></div>


            <div id="tab-2" class="tab-content">
                <div id="review_form" class="container">
                    <form class="form-horizontal form_review" id="form-review" autocomplete="off">
                        <div id="review"></div>
                        <h2>Write a review</h2>
                        <input type="hidden" name="txtprod" value="{{ $id }}" />
                        <div class="form-group required">
                            <div class="col-md-8 col-sm-12">
                            <label class="control-label" for="input-name">Your Name</label>
                            <input type="text" name="names" value="" style="text-transform:capitalize" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group required">
                            <div class="col-md-8 col-sm-12">
                                <label class="control-label" for="input-name">Your Email</label><br>
                                <span style="font-size:14px; color:#666;">Your email address will not be published.</span>
                                <input type="email" name="email" value="" style="text-transform:lowercase" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group required">
                            <div class="col-md-8 col-sm-12">
                                <label class="control-label" for="input-review">Your Review</label>
                                <textarea name="review" rows="5" id="review" style="resize:none" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="buttons clearfix">
                            <div class="pull-left" style="margin:1.3em 0 0em 0;">
                                <button type="button" id="" class="btn btn-primary" style="font-size:14px;">Submit</button>
                            </div>
                        </div>
                        <div class="errs"></div>
                        <br>
                    </form>
                </div>
            </div>


            <div id="tab-3" class="tab-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 pt-20 pb-20">No reviews found yet</div>
                    </div>
                </div>
            </div>

        </div>

        <br><br>

    
    </div>
    </div>


</div>

@include('footer')