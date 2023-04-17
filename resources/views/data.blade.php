@if(count($products) > 0)
    <div class="row pl-40 pl-xs-15 pr-xs-15">
    
        @foreach($products as $product)
            @php
            $id = $product->id;
            $titles = ucwords($product->title);
            $titlesi = $titles;
            $titles1 = strtolower($product['title']);
            $titles1 = str_replace(" ", "-", $titles1);
            $views = $product->views;
            
            $gen_num1=time();
            $gen_num1=substr($gen_num1,5);
            if(strlen($titles)>30)
                $titles = substr($titles, 0, 30)."...";
            $Prod_cats = "Category: ".ucwords($product->category);
            @endphp


            <div class="col-md-4 pl-10 pr-10 col-sm-6 mb-30">
                <div class="product1">
                    <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" id="{{ $id }}">
                        <img src="{{ asset('products/'.$product->file1) }}" class="img" alt=""  />
                        <div class="cover_inner" id="cover_inner{{ $id }}">
                            <span class="price">
                                <p class="anchors open_views" id="{{ $id }}{{ $gen_num1 }}" titles="{{ $titles1 }}">{{ $titles }}</p>
                                <p><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">N</span>{{ number_format($product->price) }}</span> </p>

                                <div class="socials">
                                    <span title="Share On Facebook" class="open_social"><img src="{{ asset('img/facebook.png') }}"></span>

                                    <span title="Share On Twitter" class="open_social"><img src="{{ asset('img/twitter1.png') }}"></span>

                                    <span class="for_mobile1 open_social" title="Share On WhatsApp"><img src="{{ asset('img/whatsapp.png') }}"></span>
                                        
                                    <span class="for_desktop1 open_social" title="Share On WhatsApp"><img src="{{ asset('img/whatsapp.png') }}"></span>
                                </div>
                            </span>
                        </div>
                    </a>
                    
                    <div data-quantity="1" class="button product_type_variable add_to_cart_button">
                        <div>
                            <input type="hidden" value="1" id="txtqty{{ $id }}" />
                            <a href="javascript:;" class="add_to_basket" id="add_to_basket{{ $id }}" ids="{{ $id }}" title="{{ $product->title }}" qty="1" main_qty="{{ $product->qty }}" price="{{ $product->price }}" image="{{ $product->file1 }}" title="Add to Cart"><span class="fa fa-shopping-cart"></span></a>

                            <a href="javascript:;" class="open_views" id="{{ $id }}{{ $gen_num1 }}" titles="{{ $titles1 }}" title="View {{ $titles }}"><span class="fa fa-eye"></span> {{ $views }}</a>
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>

        @endforeach
        </div>
    </div>
    
@else
    <p style='text-align:center; font-size:16px; margin:3em 0 15em 0'>No products yet!</p>
@endif