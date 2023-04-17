@include('header')


    
    <div class="shop-parallax-banner shop_parallax_banner_home">
		<!-- <img src="img/banner1.jpg" alt="Main shop image" class="s-img-switch"> -->
        <div class="title">Slum Art Gallery</div>
        <p class="header_tlt"><label>Nature is inside art as its content, not outside as its model.</label></p>
    </div>

    <div class="row scrollups">


    <nav class="woocommerce-breadcrumb"><a href="#">Home</a>&nbsp;&#47;&nbsp;Shop</nav>

    <header class="woocommerce-products-header">
        <h1 class="woocommerce-products-header__title page-title">Shop</h1>
    </header>
    

    <div class="woocommerce-notices-wrapper alert_cart_add" style="display:none;">
        <div class="woocommerce-message1 alrt_msg" role="alert">
            <div class="row">
                <div class="col-sm-9 text-left mt-sm-10">
                    <span class="fa fa-times closealert"></span>
                    <span>&ldquo;<font class="item_name"></font>&rdquo; has been added to your cart.</span>
                </div>

                <div class="col-sm-3 mt-sm-10 mt-xs-10">
                    <a href="javascript:;" tabindex="1" class="button wc-forward view_carts">View cart</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="container mt--20 mb-30 pl-xs-40 pr-xs-40">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 pr-sm-5 pl-xs-5 rows columns">
                <div class="dropdown">
                    <button class="dropbtn dropcat">Select Category <i class="fa fa-arrow-right"></i> <font class="cats">Random</font></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#random" value="Random" ids="0">Random</a>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <a href="#{{ strtolower($category['cats']) }}" value="{{ ucwords($category['cats']) }}" ids="{{ sha1($category['id']) }}">{{ ucwords($category['cats']) }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 pl-sm-5 pr-sm-5 rows columns">
                <div class="dropdown">
                    <button class="dropbtn dropsort">Sort By <i class="fa fa-arrow-right"></i> <font class="sorts">Latest</font></button>
                    <div id="myDropdown1" class="dropdown-content">
                        <a href="#random" value="Random">Random</a>
                        <a href="#latest" value="Latest">Latest</a>
                        <a href="#most-viewed" value="Most Viewed">Most Viewed</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 pl-sm-5 pr-sm-5 rows columns">
                <div class="dropdown">
                    <button class="dropbtn dropprice">Price Range <i class="fa fa-arrow-right"></i> <font class="prices">Recommended</font></button>
                    <div id="myDropdown2" class="dropdown-content">
                        <a href="#recommended" value="Recommended">Recommended</a>
                        <a href="#lowest-price" value="Lowest Price">Lowest Price</a>
                        <a href="#highest-price" value="Highest Price">Highest Price</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

        
    <div class="container mb-50">
        <div class="products_div">
            @include('data')
        </div>
    </div>

    
</div>


</div>

@include('footer')