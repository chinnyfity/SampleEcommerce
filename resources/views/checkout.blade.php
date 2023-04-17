@include('header')

<div class="shop-parallax-banner shop-parallax-banner1" style="">
    <div class="title">Checkout</div>
</div>


<nav class="woocommerce-breadcrumb"><a href="#">Home</a>&nbsp;&#47;&nbsp;Shop</nav>
<header class="woocommerce-products-header">
	<h1 class="woocommerce-products-header__title page-title">Shop</h1>	
</header>
    


<div class="container containerxx">
    <div class="row">

        <div class="first_order_div" style="display:nones;">
            <p style="font-size:16px; margin-bottom:17px;" class="caps1">
                Final Step! Please confirm your details below and place order.<br>
                We will get a notification about your orders and place a call on you as soon as you finish ordering
            </p>

            
            <div class="accordion-demo"> 
                <div class="accordion_in">
                    <div class="acc_head acc_head_1">1. Billing & Delivery Details <i class="fa fa-caret-down"></i></div>
                    <div class="acc_content" id="customer_details">
                        <div class="row">
                            <form name="checkout" method="post" class="checkout checkouts woocommerce-checkout" action="#" autocomplete="off">
                                @csrf

                                <input type="hidden" name="user" id="user" value="{{ $user_details ? $user_details->id : '' }}">
                                <input type="hidden" id="validate_input" value="{{ $user_details && $user_details->id ? 1 : 0 }}">

                                <div class="col-md-9 reg_forms" style="display:nones;">
                                    
                                    <div class="col-md-12 already_reg">
                                        <p style="font-size:16px; margin-left:0px;">Already registered? <span class="login_here">Login here</span></p>
                                    </div>

                                    <p class="form-row col-md-6">
                                        <label for="billing_first_name" class="">First name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                        <span class="woocommerce-input-wrapper">
                                            <input type="text" class="input-text" name="firstname" style="text-transform:capitalize" id="fname" placeholder="Your first name" autocomplete="given-name" value="{{ $user_details ? $user_details->fname : '' }}">
                                        </span>
                                    </p>

                                    <p class="form-row col-md-6">
                                        <label>Last name&nbsp;<abbr class="required">*</abbr></label>
                                        <span class="woocommerce-input-wrapper">
                                            <input type="text" class="input-text " name="lastname" style="text-transform:capitalize" id="lname" placeholder="Your last name" autocomplete="given-name" value="{{ $user_details ? $user_details->lname : '' }}">
                                        </span>
                                    </p>

                                    <p class="form-row col-md-6">
                                        <label>Phone</label>
                                        <input type="text" class="input-text" placeholder="Your phone number" name="phone" id="phone" value="{{ $user_details ? $user_details->phone : '' }}">
                                    </p>

                                    <p class="form-row col-md-6">
                                        <label>Email</label>
                                        <input type="text" class="input-text" placeholder="Your email address" style="text-transform:lowercase" name="email" id="email" value="{{ $user_details ? $user_details->email : '' }}">
                                    </p>

                                    <p class="form-row col-md-6">
                                        <label>Country&nbsp;<abbr class="required">*</abbr></label>
                                        <span>
                                            <select name="country" id="txtcountry" class="country_to_state country_select">
                                                <option value="0" selected>Select Country</option>
                                                <option value="160">Nigeria</option>
                                            </select>
                                        </span>
                                    </p>
                                    
                                    <p class="form-row col-md-6">
                                        <label>State&nbsp;<abbr class="required">*</abbr></label>
                                        <span>
                                            <select name="state" class="state_select" id="txtstate" data-placeholder="Select State" placeholder="Select State">
                                                <option value="0" selected>-Select State-</option>
                                                <option value="1">Lagos</option>
                                                <option value="2">Oyo</option>
                                                <option value="3">Kaduna</option>
                                            </select>
                                        </span>
                                    </p>

                                    <p class="form-row col-md-12">
                                        <label>Your Address</label>
                                        <textarea name="address" id="address" placeholder="Your location for delivery" style="resize:none" class="form-control"> {{ $user_details ? $user_details->address : '' }}</textarea>
                                    </p>

                                    @if(!isset($user_details))
                                    <p class="form-row col-md-6 passes">
                                        <label>Password</label>
                                        <input type="password" class="input-text" placeholder="Type your password" style="text-transform:lowercase" name="password1" id="password1">
                                    </p>

                                    <p class="form-row col-md-6 passes">
                                        <label>Confirm Password</label>
                                        <input type="password" class="input-text" placeholder="Confirm your password" style="text-transform:lowercase" name="password2" id="password2">
                                    </p>
                                    @endif
                                    
                                    <p class="form-row col-md-12 update_info_btn">
                                        <button type="button" id="cmd_submit_details" class="button">Submit</button>
                                    </p>
                                    <p style="clear:both"></p>
                                    
                                    <div class="err_store"></div>
                                    <br>
                                </div>


                                <div class="col-md-9 login_forms" style="display:none;">
                                    <div class="col-md-12">
                                        <p style="font-size:16px; margin-left:0px;">Don't have account with us? <span class="reg_here">Register here</span></p>
                                    </div>
                                    <p class="form-row col-md-7">
                                        <label>Email</label>
                                        <input type="text" class="input-text" placeholder="Email / Phone" style="text-transform:lowercase" name="login_email">
                                    </p>

                                    <p class="form-row col-md-7">
                                        <label>Password</label>
                                        <input type="password" class="input-text" placeholder="Type your password" style="text-transform:lowercase" name="login_password">
                                    </p>

                                    <p style="clear:both"></p>
                                    
                                    <p class="form-row col-md-12 update_info_btn">
                                        <button type="button" id="login" class="button">Login</button>
                                    </p>
                                    <p style="clear:both"></p>
                                    
                                    <div class="err_login"></div>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="accordion_in">
                    <div class="acc_head acc_head_2">2. Confirm Your Order <i class="fa fa-caret-down"></i></div>
                    <div class="acc_content">
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <table class="shop_table woocommerce-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($carts) > 0) 
                                        @foreach ($carts as $cart)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ ucfirst($cart->name) }}&nbsp;<strong class="product-quantity">× {{ $cart->quantity }}</strong>
                                                </td>

                                                <td class="product-total">
                                                    <span class="woocommerce-Price-amount amount amount3"><font style="font-weight:normal">&#8358;{{ number_format($cart->price) }}</font></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>

                                @php
                                $final_total = 0;
                                @endphp

                                @if(count($carts) > 0)
                                    @php
                                    $txtflats = 3;
                                    $final_total = $subtotal + $txtflats;
                                    @endphp
                        
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="woocommerce-Price-amount amount amount3">&#8358;{{ number_format($subtotal) }}</span></td>
                                    </tr>
                        
                                    <tr class="woocommerce-shipping-totals shipping">
                                        <th>Tax</th>
                                        <td data-title="Shipping">
                                            <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                <li>
                                                    <label for="shipping_method_0_flat_rate2"> 
                                                        <span class="woocommerce-Price-amount amount amount5">
                                                            &#8358;<font class="flatrates">{{ number_format($txtflats) }}</font>
                                                        </span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                        
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td><strong><span class="woocommerce-Price-amount amount amount3">&#8358;{{ number_format($final_total) }}</span></strong> </td>
                                    </tr>
                                @endif
                                    
                                </tfoot>
                            </table>
                            <p class="form-row col-md-12 update_info_btn">
                                <button type="button" id="cmd_edit_order" class="button">Edit Orders</button>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="accordion_in">
                    <div class="acc_head acc_head_3">3. Payment Method <i class="fa fa-caret-down"></i></div>
                    <div class="acc_content payment_mtd">
                        <div class="row">
                            <div class="col-md-10">
                                <p><b>Please select the preferred payment method to use on this order.</b></p>

                                <div class="radio" style="line-height:1.5em;">
                                    <label for="cod"><input type="radio" name="payments" class="shipping_online" value="cod" id="cod"><span>Pay with card</span></label>
                                </div>

                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                <div id="shipping_online" style="display: none;">
                                    <div style="margin:-5px 0 2em 20px;">
                                        <div class="pay_info">
                                            <input type="hidden" value="{{ $final_total }}" id="total_charge_order">
                                            <p style="font-size:16px !important; color:#09C;"><b>Our online payment method is always easier and safer</b></p>
                                            
                                            <div class="form-row place-order">
                                                <button type="submit" class="button alt cmd_submit_orders" name="woocommerce_checkout_place_order" id="place_order" value="Place order">Pay with card</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="radio" style="line-height:2.5em;">
                                    <label for="bdt"><input type="radio" name="payments" class="bank_trans" id="bdt" value="new"><span>Bank Deposit/Transfer</span></label>
                                </div>

                                <div id="shipping-new" style="display: none;">
                                    <div style="margin:-0.5em 0 2em 20px;">
                                        <div class="pay_info">
                                            <p style="font-size:15px !important;">You can use <b>mobile or ATM transfer or bank deposit</b> to make
                                            payments into the account details
                                            stated below. Once orders are received by our customer service agent, we will place a call on you.</p>

                                            <p style="font-size:15px !important;">
                                            <label><b>Amount To Be Paid:</b></label> <font style="font-size:17px !important; color:#AA0;"><b>&#8358;{{ number_format($final_total) }}</b></font><br>
                                            <label><b>Account Name:</b></label> <font>Account Name Here</font><br>
                                            <label><b>Bank Name:</b></label> <font>Bank Name Here</font><br>
                                            <label><b>Account Number:</b></label> <font style="letter-spacing:0.7px">1234567890</font><br>
                                            </p>
                                        </div>
                                        <div class="form-row place-order">
                                            <p><b>Please click the button below to submit your orders</b></p>
                                            <button type="submit" class="button alt cmd_submit_orders" name="woocommerce_checkout_place_order" id="place_order" value="Place order">Place order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sucs_div" style="display:none;">
            <p style="margin-top:1.3em;">
                <img src="{{ asset('img/checkmark.png') }}" style="width:120px !important;">
            </p>

            <h3 style="color:#090"><b>Your order(s) have been placed!</b></h3>

            <p class="mt-20">One of our administrators will place a call on you shortly for your orders, please stay connected and expect a call from us.</p>
            <p>You can view your order history by clicking on my <a href="#">my orders</a>.</p>
            <p>Please feel free to reach us on <a href="tel:+2348012345678">08012345678</a></p>
            <p>Thanks for shopping with us online!</p>
            <br>
            <div class="form-row place-order">
                <button type="submit" class="button alt cmd_done" name="woocommerce_checkout_place_order" id="place_order" value="Done">Done</button>
            </div>
        </div>
    
    </div>
</div>
<br><br>

</div>
@include('footer')