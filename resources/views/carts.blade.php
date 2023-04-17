@include('header')
    
<div class="shop-parallax-banner shop-parallax-banner1" style="">
    <div class="title">Cart</div>
</div>

<nav class="woocommerce-breadcrumb"><a href="#">Home</a>&nbsp;&#47;&nbsp;Shop</nav>
<header class="woocommerce-products-header">
	<h1 class="woocommerce-products-header__title page-title">Shop</h1>	
</header>
    


    <div class="container containerxx">
    <div class="row">

        <div class="cart-collaterals_ col-md-12">
            <form class="woocommerce-cart-form" action="#" method="post" autocomplete="off">
                <table class="shop_table shop_tbl shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;<b>...</b> </th>
                            <th class="product-thumbnail_">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php $i = 1; $total_prices = 0; @endphp
                    @if(count($carts) > 0) 
                        @foreach ($carts as $cart)
                            @php
                            $gen_num1 = $cart->id.substr(time(), 5);
                            $qty = $cart->quantity;
                            $main_qty = $cart->attributes->main_qty;

                            if($qty > $main_qty){ // if qty is more than the qty available, pick the highest qty
                                $qty = $main_qty;
                            }
                            $price = $cart->price;
                            $names = $cart->name;
                            $title = str_replace("_", "-", strtolower($names));
                            $names = ucwords(str_replace("_", " ", $names));
                            
                            $total = $qty * $price;
                            if(strlen($names) > 70){
                                $names=substr($names,0,70)."...";
                            }
                            @endphp
                        
                            <tr class="woocommerce-cart-form__cart-item cart_item remove_div{{ $cart->id }}">

                                <td class="product-remove">
                                    <a href="javascript:;" class="remove remove1" id="remove1{{ $cart->id }}" ids="{{ $cart->id }}" totalprice="{{ $total }}">×</a>
                                </td>

                                <td class="product-thumbnail_" style="text-align:center !important">
                                    <a href="{{ url('/').'view/$gen_num1/$title' }}">
                                        <img src="{{ asset('products/'.$cart->attributes->image) }}" class="" alt="">
                                    </a>
                                </td>

                                <td class="product-name" data-title="Product">
                                    <a href="{{ url('/').'view/$gen_num1/$title' }}">{{ $names }}</a>
                                </td>

                                <td class="product-price" data-title="Price">
                                    <span class="woocommerce-Price-amount amount amount3"><span class="woocommerce-Price-currencySymbol">&#8358;</span>{{ number_format($price) }}</span>
                                </td>

                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity quantity1">

                                        <select id="txtqty{{ $cart->id }}" class="input-text qty qtys1_" style="color:#222 !important; font-size:16px !important;">
                                            @for($i=1; $i<=$main_qty; $i++)
                                                <option value='{{ $i }}' {{ $i==$qty ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <button type="button" data-toggle="tooltip" title="Update Cart" id="upd_cart1" prices="{{ $price }}" ids="{{ $cart->id }}" class="btn btn-warning upd_cart1" data-original-title="Update Quantity"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </td>

                                <td class="product-subtotal" data-title="Total">
                                    <span class="woocommerce-Price-amount amount amount3">
                                    <input type="hidden" value="{{ $total }}" id="txttotal1{{ $cart->id }}" class="txttotal1">
                                    <span class="totals{{ $cart->id }}">&#8358;{{ number_format($total) }}</span></span>
                                </td>
                            </tr>

                            <tr style="background:none; border:none !important;" class="for_mobile">
                                <td style="border:none !important; padding-top:20px"></td>
                            </tr>

                            @php $i++; $total_prices = 0; @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6"><p style="text-align:center; margin:1em 0; font-size:18px; color:#333;">Your cart is empty!</p></td>
                        </tr>
                    @endif

                    </tbody>
                </table>

                <table class="shop_table shop_tbl_java shop_table_responsive cart woocommerce-cart-form__contents" style="display:none;" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;<b>...</b> </th>
                            <th class="product-thumbnail_">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6"><p style="text-align:center; margin:1em 0; font-size:18px; color:#333;">Your cart is empty!</p></td>
                        </tr>
                    </tbody>
                </table>

                <div class="wc-proceed-to-checkout cond_shop1">
                    @if(!empty($carts))
                        <a href="javascript:;" class="checkout-button button alt wc-forward remove1" ids="all">Clear Cart</a>
                    @else
                        <a href="javascript:;" class="checkout-button button alt wc-forward" style="opacity:0.5;" ids="all">Clear Cart</a>
                    @endif
                    
                    <a href="javascript:;" class="checkout-button button alt wc-forward remove_java" style="opacity:0.5; display:none;" ids="all">Clear Cart</a>
                </div>

                

                <div class="wc-proceed-to-checkout cond_shop">
                    <a href="{{ url('/') }}" class="checkout-button button alt wc-forward">Continue Shopping</a>
                </div>
                <div style="clear:both"></div>
            </form>
        </div>


        <div class="cart-collaterals col-md-offset-6 col-md-6">
            <div class="cart_totals">
                @if(count($carts) > 0)
                    @php
                    $txtflats = 3;
                    $final_total = $subtotal + $txtflats;
                    @endphp
                
                    <table class="shop_table shop_table_responsive" cellspacing="0">
                        <tbody>   
                            <input type="hidden" id="txtsubtotals" value="{{ $subtotal }}">
                            <input type="hidden" id="txtflats" value="{{ $txtflats }}">
                            <input type="hidden" id="txtreattotls" value="{{ $final_total }}">

                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td data-title="Subtotal"><span class="woocommerce-Price-amount amount amount4">
                                    <span class="woocommerce-Price-currencySymbol">&#8358;</span><font class="subtotals">{{ number_format($subtotal) }}</font></span>
                                </td>
                            </tr>

                            <tr class="woocommerce-shipping-totals shipping">
                                <th>Tax</th>
                                <td data-title="Tax">
                                    <ul id="shipping_method" class="woocommerce-shipping-methods">
                                        <li>
                                            <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate2" value="flat_rate:2" class="shipping_method">
                                            <label for="shipping_method_0_flat_rate2"> 
                                                <span class="woocommerce-Price-amount amount amount5">
                                                    &#8358;<font class="flatrates">{{ number_format($txtflats) }}</font>
                                                </span>
                                            </label>
                                        </li>
                                    </ul>

                                    <p class="woocommerce-shipping-destination"></p>
                                    @if(strlen($locatn)>4)
                                        <p class="woocommerce-shipping-destination">Shipping to <strong class="locans">{{ $locatn }}</strong>.</p>
                                    @endif

                                    @php
                                    $country1 = isset($user_details) && $user_details != "" ? $user_details['countrys'] : 0;
                                    @endphp
                                    
                                    @if(strlen($locatn)>4)
                                        <form class="woocommerce-shipping-calculator update_addr_form" action="#" method="post" autocomplete="off">
                                            <a href="javascript:;" class="shipping-calculator-button">Change address</a>

                                            <section class="shipping-calculator-form" style="display:none;">

                                                <p class="form-row form-row-wide" id="calc_shipping_country_field">
                                                    <select name="txtcountry" id="txtcountry" class="country_to_state country_select">
                                                        <option value="" selected>Select Country</option>
                                                        <option value="160">Nigeria</option>
                                                    </select>
                                                </p>
                                                

                                                <p class="form-row form-row-wide validate-required" id="calc_shipping_state_field">
                                                    <select name="txtstate" class="state_select" id="txtstate" data-placeholder="Select State" placeholder="Select State">
                                                        <option value="" selected>-Select State-</option>
                                                        <option value="1">Lagos</option>
                                                        <option value="2">Oyo</option>
                                                        <option value="3">Kaduna</option>
                                                    </select>
                                                </p>
                                                
                                                <p class="form-row form-row-wide" style="margin-top:8px;">
                                                    <button type="button" id="calc_shipping" class="button update_locs">Update Location</button>
                                                    <!-- <button type="button" id="calc_shipping" class="button update_locs1" style="opacity:0.5; display:none;">Update Location</button> -->
                                                </p>
                                                <div class="err_login"></div>
                                            </section>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                            <tr class="order-total">
                                <th>Total</th>
                                <td data-title="Total">
                                    <strong>
                                        <span class="woocommerce-Price-amount amount amount4">
                                            &#8358;<font class="final_total">{{ number_format($final_total) }}</font>
                                        </span>
                                    </strong>
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>
                    <div class="wc-proceed-to-checkout">
                        <a href="javascript:;" class="checkout-button button alt wc-forward cmd_checkout">Proceed to checkout</a>
                    </div>
                @endif
            </div>
        </div>

    
    </div>
    </div>


</div>

@include('footer')