@extends('layouts.client.master')

@section('content')
    @csrf
    <main id="main" class="site-primary">
        <div class="site-content">
            <div class="homepage-content">
                <div class="shop-content">
                    <div class="container">
                        <nav class="woocommerce-breadcrumb">
                            <ul>
                                <li><a href="https://klbtheme.com/bacola">Home</a></li>
                                <li>Cart</li>
                            </ul>
                        </nav>
                        {{-- NO CART --}}


                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="row content-wrapper sidebar-right">
                                <div class="col-12 col-md-12 col-lg-12 content-primary">
                                    <div class="cart-wrapper">

                                        <form class="woocommerce-cart-form"
                                            action="https://klbtheme.com/bacola/cart/"method="post">
                                            {{-- {{ print_r($cart_session); die(); }} --}}
                                            @if ($cart_session != null && count($cart_session->products) >= 1)
                                                @if ($cart_session->current_percent_freeship >= 100)
                                                    <div class="klb-free-progress-bar success">
                                                        <div class="free-shipping-notice">
                                                            Your order qualifies for free shipping! </div>
                                                        <div class="klb-progress-bar">
                                                            <span class="progress" style="width: 100%"></span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="klb-free-progress-bar warning">
                                                        <div class="free-shipping-notice">
                                                            Add <span class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol"></span>{{ number_format($cart_session->remain_to_get_freeship) }} đ</span>
                                                            to
                                                            cart and get free shipping! </div>
                                                        <div class="klb-progress-bar">
                                                            <span class="progress"
                                                                style="width: {{ $cart_session->current_percent_freeship }}%"></span>
                                                        </div>
                                                    </div>
                                                @endif
                                                <table
                                                    class="table shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">&nbsp;</th>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-subtotal">Subtotal</th>
                                                            <th class="product-remove">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        {{-- <h1>Cart session exist {{ print_r($cart_session) }}</h1> --}}
                                                        @foreach ($cart_session->products as $item)
                                                            <tr class="woocommerce-cart-form__cart-item cart_item">

                                                                <td class="product-thumbnail">
                                                                    <a
                                                                        href="https://klbtheme.com/bacola/product/blue-diamond-almonds-lightly-salted/"><img
                                                                            width="90" height="90"
                                                                            src="{{ $item['product_info']['img_url'] }}"
                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                            alt="" decoding="async" loading="lazy"
                                                                            srcset="{{ $item['product_info']['img_url'] }} 90w, {{ $item['product_info']['img_url'] }} 150w, {{ $item['product_info']['img_url'] }} 450w, {{ $item['product_info']['img_url'] }} 600w, {{ $item['product_info']['img_url'] }} 96w"
                                                                            sizes="(max-width: 90px) 100vw, 90px"></a>
                                                                </td>

                                                                <td class="product-name" data-title="Product">
                                                                    <a
                                                                        href="{{ route('product.view', $item['product_info']['slug']) }}">{{ $item['product_info']['title'] }}</a>
                                                                </td>

                                                                <td class="product-price" data-title="Price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span>
                                                                            {{ $item['product_info']['format_price'] }}
                                                                        </span>
                                                                </td>

                                                                <td class="product-quantity" data-title="Quantity">
                                                                    <div class="quantity">
                                                                        <label class="screen-reader-text"
                                                                            for="quantity_64873bc025bdc">Blue Diamond
                                                                            Almonds
                                                                            Lightly Salted quantity</label>
                                                                        <div class="quantity-button minus"><i
                                                                                class="klbth-icon-minus"></i></div>
                                                                        <input type="text" id="quantity_64873bc025bdc"
                                                                            class="input-text qty text"
                                                                            name="cart[b6f0479ae87d244975439c6124592772][qty]"
                                                                            value="{{ $item['qty'] }}" title="Qty"
                                                                            size="4" min="0" max=""
                                                                            step="1" placeholder=""
                                                                            data-product_id="{{ $item['product_info']['id'] }}"
                                                                            inputmode="numeric" autocomplete="off">


                                                                        <div class="quantity-button plus"><i
                                                                                class="klbth-icon-plus"></i></div>
                                                                    </div>
                                                                </td>

                                                                <td class="product-subtotal" data-title="Subtotal">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span
                                                                            class="subtotal-{{ $item['product_info']['id'] }}">{{ number_format($item['price']) }}đ</span>

                                                                </td>

                                                                <td class="product-remove">
                                                                    <a href="#" class="remove-item"
                                                                        aria-label="Remove this item"
                                                                        data-product_id="{{ $item['product_info']['id'] }}">
                                                                        <i class="klbth-icon-cancel"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            {{-- {{ print_r($item['product_info']['img_url']) }} --}}
                                                        @endforeach
                                                        {{-- @elseif (count($cartItems) >= 1) --}}
                                                        {{-- @php
                                                                print_r($cartItems); die();
                                                            @endphp --}}
                                                        {{-- @foreach ($cartItems as $item)
                                                            <input hidden type="text" data-product_id="{{ $item->id }}">
                                                            <tr class="woocommerce-cart-form__cart-item cart_item">

                                                                <td class="product-thumbnail">
                                                                    <a
                                                                        href="https://klbtheme.com/bacola/product/blue-diamond-almonds-lightly-salted/"><img
                                                                            width="90" height="90"
                                                                            src="{{ $item->img_url }}"
                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                            alt="" decoding="async" loading="lazy"
                                                                            srcset="{{ $item->img_url }} 90w, {{ $item->img_url }} 150w, {{ $item->img_url }} 450w, {{ $item->img_url }} 600w, {{ $item->img_url }} 96w"
                                                                            sizes="(max-width: 90px) 100vw, 90px"></a>
                                                                </td>

                                                                <td class="product-name" data-title="Product">
                                                                    <a
                                                                        href="{{ route('product.view', $item->slug) }}">{{ $item->title }}</a>
                                                                </td>

                                                                <td class="product-price" data-title="Price">
                                                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"></span>{{ $item->format_price }}</bdi></span>
                                                                </td>

                                                                <td class="product-quantity" data-title="Quantity">
                                                                    <div class="quantity">
                                                                        <label class="screen-reader-text"
                                                                            for="quantity_64873bc025bdc">Blue Diamond
                                                                            Almonds
                                                                            Lightly Salted quantity</label>
                                                                        <div class="quantity-button minus"><i
                                                                                class="klbth-icon-minus"></i></div>
                                                                        <input type="text" id="quantity_64873bc025bdc"
                                                                            class="input-text qty text"
                                                                            name="cart[b6f0479ae87d244975439c6124592772][qty]"
                                                                            value="{{ $item->qty }}" title="Qty"
                                                                            size="4" min="0" max=""
                                                                            step="1" placeholder=""
                                                                            data-product_id="{{ $item->id }}"
                                                                            inputmode="numeric" autocomplete="off">
                                                                        <div class="quantity-button plus"><i
                                                                                class="klbth-icon-plus"></i></div>
                                                                    </div>
                                                                </td>

                                                                <td class="product-subtotal" data-title="Subtotal">
                                                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol">$</span>42.32</bdi></span>
                                                                </td>

                                                                <td class="product-remove">
                                                                    <a href="https://klbtheme.com/bacola/cart/?remove_item=b6f0479ae87d244975439c6124592772&amp;_wpnonce=661866aee9"
                                                                        class="remove" aria-label="Remove this item"
                                                                        data-product_id="420" data-product_sku="UCB59"><i
                                                                            class="klbth-icon-cancel"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach --}}


                                                        <tr>
                                                            <td colspan="6" class="actions">
                                                                <div class="actions-wrapper">
                                                                    <div class="coupon">
                                                                        <label for="coupon_code"
                                                                            class="screen-reader-text">Coupon:</label>
                                                                        <input type="text" name="coupon_code"
                                                                            class="input-text" id="coupon_code"
                                                                            value="" placeholder="Coupon code">
                                                                        <button type="button"
                                                                            class="button button-apply-counpon wp-element-button"
                                                                            name="apply_coupon" value="Apply coupon">Apply
                                                                            coupon</button>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="button wp-element-button"
                                                                        name="update_cart" value="Update cart"
                                                                        disabled="" aria-disabled="true">Update
                                                                        cart</button>

                                                                    <a href="" class="button remove-all">Remove
                                                                        All</a>
                                                                    <input type="hidden" id="woocommerce-cart-nonce"
                                                                        name="woocommerce-cart-nonce"
                                                                        value="661866aee9"><input type="hidden"
                                                                        name="_wp_http_referer" value="/bacola/cart/">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>


                                        </form>


                                        <div class="cart-collaterals">
                                            <div class="cart_totals ">


                                                <h2>Cart totals</h2>

                                                <table cellspacing="0" class="shop_table shop_table_responsive">

                                                    <tbody>
                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td data-title="Subtotal">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <bdi>
                                                                        <span
                                                                            class="sub-total-cart woocommerce-Price-currencySymbol">
                                                                            {{ number_format($cart_session->subTotalPrice) }}
                                                                            đ
                                                                        </span>
                                                                    </bdi>
                                                                </span>
                                                            </td>
                                                        </tr>




                                                        <tr class="woocommerce-shipping-totals shipping">
                                                            <th>Shipping</th>
                                                            <td data-title="Shipping">
                                                                <ul id="shipping_method"
                                                                    class="woocommerce-shipping-methods">
                                                                    <li>
                                                                        <input type="radio" name="shipping_method[0]"
                                                                            data-index="0"
                                                                            id="shipping_method_0_flat_rate1"
                                                                            value="flat_rate:1" class="shipping_method"
                                                                            checked="checked"><label
                                                                            for="shipping_method_0_flat_rate1">Ship cost:
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <bdi>
                                                                                    <span
                                                                                        class="woocommerce-Price-currencySymbol">
                                                                                        {{ number_format($cart_session->ship_cost) }}
                                                                                        đ
                                                                                    </span>
                                                                                </bdi>
                                                                            </span>
                                                                        </label>
                                                                    </li>

                                                                    <li>
                                                                        <label> Counpon:
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span
                                                                                    class="use-counpon woocommerce-Price-currencySymbol">
                                                                                    @if ($cart_session->counpon)
                                                                                        -{{ number_format($cart_session->counpon['amount_discount']) }}
                                                                                        đ
                                                                                    @endif

                                                                                </span>
                                                                            </span>
                                                                        </label>
                                                                    </li>
                                                                    
                                                                </ul>
                                                                <p class="woocommerce-shipping-destination">
                                                                    {{ $cart_session->ship_address }}</p>

                                                                <form class="woocommerce-shipping-calculator"
                                                                    method="post">

                                                                    <a href="" class="shipping-calculator-button">
                                                                        Change address
                                                                    </a>
                                                                    <section style="display: none;"
                                                                        class="shipping-calculator-form" style="">

                                                                        <p class="form-row validate-required address-field form-row-wide"
                                                                            id="calc_shipping_postcode_field">
                                                                            <label for="calc_shipping_postcode"
                                                                                class="screen-reader-text">First
                                                                                name></label>
                                                                            <input type="text" class="input-text"
                                                                                name="x" value=""
                                                                                placeholder="First name" id="first_name">
                                                                        </p>
                                                                        <p class="form-row validate-required address-field form-row-wide"
                                                                            id="calc_shipping_postcode_field">
                                                                            <label for="calc_shipping_postcode"
                                                                                class="screen-reader-text">Last
                                                                                name</label>
                                                                            <input type="text" class="input-text"
                                                                                value="" placeholder="Last name"
                                                                                name="last_name" id="last_name">
                                                                        </p>
                                                                        <p class="form-row validate-required address-field form-row-wide"
                                                                            id="calc_shipping_postcode_field">
                                                                            <label for="calc_shipping_postcode"
                                                                                class="screen-reader-text">Street<abbr
                                                                                    class="required"
                                                                                    title="required">*</abbr></label>
                                                                            <input type="text" class="input-text"
                                                                                value="" placeholder="Street"
                                                                                name="street_address" id="street_address">
                                                                        </p>
                                                                        <p class="form-row validate-required address-field form-row-wide"
                                                                            id="calc_shipping_postcode_field">
                                                                            <label for="calc_shipping_postcode"
                                                                                class="screen-reader-text">Town city<abbr
                                                                                    class="required"
                                                                                    title="required">*</abbr></label>
                                                                            <input type="text" class="input-text"
                                                                                value="" placeholder="Town City"
                                                                                name="town_city" id="town_city">
                                                                        </p>
                                                                        <p class="form-row validate-required address-field form-row-wide"
                                                                            id="calc_shipping_postcode_field">
                                                                            <label for="calc_shipping_postcode"
                                                                                class="screen-reader-text">Phone<abbr
                                                                                    class="required"
                                                                                    title="required">*</abbr></label>
                                                                            <input type="text" class="input-text"
                                                                                value="" placeholder="Phone"
                                                                                name="phone" id="phone">
                                                                        </p>
                                                                        <p class="form-row validate-required address-field form-row-wide"
                                                                            id="calc_shipping_postcode_field">
                                                                            <label for="calc_shipping_postcode"
                                                                                class="screen-reader-text">ZIP
                                                                                Code</label>
                                                                            <input type="text" class="input-text"
                                                                                value=""
                                                                                placeholder="Postcode / ZIP"
                                                                                name="zip_code" id="zip_code">
                                                                        </p>


                                                                        <p>
                                                                            <button type="submit" name="calc_shipping"
                                                                                value="1"
                                                                                class="button update-address-button wp-element-button">Update</button>
                                                                        </p>

                                                                    </section>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td data-title="Total">
                                                                <strong>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>
                                                                            <span
                                                                                class="total-price woocommerce-Price-currencySymbol">
                                                                                {{ number_format($cart_session->totalPrice) }}
                                                                                đ
                                                                            </span>

                                                                        </bdi>
                                                                    </span>
                                                                </strong>
                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>

                                                <div class="wc-proceed-to-checkout">

                                                    <a href="{{ route('order.create') }}"
                                                        class="checkout-button button alt wc-forward wp-element-button">
                                                        Proceed to checkout</a>
                                                </div>


                                            </div>
                                        </div>
                                    @else
                                        <div class="woocommerce">
                                            <div class="row content-wrapper sidebar-right">
                                                <div class="col-12 col-md-12 col-lg-12 content-primary">

                                                    <div class="cart-wrapper">

                                                        <div class="cart-empty-page">
                                                            <div class="empty-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 280.028 280.028" width="280.028"
                                                                    height="80.028">
                                                                    <path class="c-01"
                                                                        d="M35.004 0h210.02v78.758H35.004V0z"
                                                                        fill="#d07c40"></path>
                                                                    <path class="c-02"
                                                                        d="M262.527 61.256v201.27c0 9.626-7.876 17.502-17.502 17.502H35.004c-9.626 0-17.502-7.876-17.502-17.502V61.256h245.025z"
                                                                        fill="#f4b459"></path>
                                                                    <path class="c-03"
                                                                        d="M35.004 70.007h26.253V26.253L35.004 0v70.007zm183.767-43.754v43.754h26.253V0l-26.253 26.253z"
                                                                        fill="#f4b459"></path>
                                                                    <path class="c-04"
                                                                        d="M61.257 61.256V26.253L17.503 61.256h43.754zm157.514-35.003v35.003h43.754l-43.754-35.003z"
                                                                        fill="#e3911c"></path>
                                                                    <path class="c-05"
                                                                        d="M65.632 105.01c-5.251 0-8.751 3.5-8.751 8.751s3.5 8.751 8.751 8.751 8.751-3.5 8.751-8.751c0-5.25-3.5-8.751-8.751-8.751zm148.764 0c-5.251 0-8.751 3.5-8.751 8.751s3.5 8.751 8.751 8.751 8.751-3.5 8.751-8.751c.001-5.25-3.501-8.751-8.751-8.751z"
                                                                        fill="#cf984a"></path>
                                                                    <path class="c-06"
                                                                        d="M65.632 121.637c5.251 0 6.126 6.126 6.126 6.126 0 39.379 29.753 70.882 68.257 70.882s68.257-31.503 68.257-70.882c0 0 .875-6.126 6.126-6.126s6.126 6.126 6.126 6.126c0 46.38-35.003 83.133-80.508 83.133s-80.508-37.629-80.508-83.133c-.001-.001.874-6.126 6.124-6.126z"
                                                                        fill="#cf984a"></path>
                                                                    <path class="c-07"
                                                                        d="M65.632 112.886c5.251 0 6.126 6.126 6.126 6.126 0 39.379 29.753 70.882 68.257 70.882s68.257-31.503 68.257-70.882c0 0 .875-6.126 6.126-6.126s6.126 6.126 6.126 6.126c0 46.38-35.003 83.133-80.508 83.133s-80.508-37.629-80.508-83.133c-.001 0 .874-6.126 6.124-6.126z"
                                                                        fill="#fdfbf7"></path>
                                                                </svg>
                                                            </div><!-- empty-icon -->
                                                            <div class="woocommerce-notices-wrapper"></div>
                                                            <p class="cart-empty woocommerce-info">Your
                                                                cart is currently empty.</p>
                                                            <p class="return-to-shop">
                                                                <a class="button-primary rounded large button wc-backward wp-element-button"
                                                                    href="{{ route('home') }}">
                                                                    Return to shop </a>
                                                            </p>
                                                        </div><!-- cart-empty -->

                                                    </div><!-- cart-wrapper -->

                                                </div><!-- content-primary -->
                                            </div><!-- row -->

                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            {{-- <script>
                                var timeout;

                                jQuery(document).ready(function($) {

                                    var timeout;

                                    $('.woocommerce').on('change', 'input.qty', function() {

                                        if (timeout !== undefined) {
                                            clearTimeout(timeout);
                                        }

                                        timeout = setTimeout(function() {
                                            $("[name='update_cart']").trigger("click");
                                        }, 1000); // 1 second delay, half a second (500) seems comfortable too

                                    });

                                });
                            </script> --}}
                        </div>
                    </div>
                </div>
            </div><!-- homepage-content -->
        </div><!-- site-content -->
    </main>
@endsection

@push('js')
    <script>
        (function name($) {
            let btnApplyCounpon = $(".button-apply-counpon");
            $(btnApplyCounpon).click(function() {
                let counpon_code = btnApplyCounpon.prev().val();
                axios.post('/cart/apply-counpon', {
                        counpon_code: counpon_code
                    })
                    .then((result) => {
                        const formatter = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND',
                        });
                        console.log(result);
                        $(".total-price").text(formatter.format(result.data.data.totalPrice));
                        $(".use-counpon").text(
                            `-${formatter.format(result.data.data.counpon.amount_discount)}`)
                        toastr.success('Sử dụng mã thành công !', 'success!');
                    }).catch((err) => {
                        toastr.error(err.response.data.message);
                    });

            });

            let changeAddressBtn = $(".shipping-calculator-button");
            let changeAdressForm = $(".shipping-calculator-form");
            let updateAddressBtn = $(".update-address-button");
            let formChangeAddress = $(".woocommerce-shipping-calculator");
            let btnRemoveAllProduct = $(".button.remove-all");

            $(btnRemoveAllProduct).click(function(e) {
                e.preventDefault();
                const _this = $(this);
                if (!confirm('Are you sure to delete all products')) {
                    return;
                }
                axios.interceptors.request.use(function(config) {
                    _this.append(
                        '<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>'
                    )
                    return config;
                }, function(error) {
                    return Promise.reject(error);
                });
                axios.get('/cart/deleteAllCart')
                    .then((result) => {
                        console.log(result);
                        toastr.success(result.data.message)
                        $(".loader-image").remove();
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);

                    }).catch((err) => {
                        $(".loader-image").remove();
                        console.log(err);
                    });

            });

            $(changeAddressBtn).click(function(e) {
                e.preventDefault();
                changeAdressForm.toggle();

            });
            $(formChangeAddress).on('submit', function(e) {
                let data = $(this).serialize()
                console.log(JSON.stringify(data));
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/cart/change-address",
                    data: {
                        first_name: $("#first_name").val(),
                        last_name: $("#last_name").val(),
                        street_address: $("#street_address").val(),
                        town_city: $("#town_city").val(),
                        phone: $("#phone").val(),
                        zip_code: $("#zip_code").val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response.message);
                    }
                });

            });
        })(jQuery.noConflict());
    </script>
@endpush
