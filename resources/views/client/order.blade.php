@extends('layouts.client.master');

@section('content')
    <main id="main" class="site-primary">
        <div class="site-content">
            <div class="homepage-content">
                <div class="shop-content">
                    <div class="container">
                        <nav class="woocommerce-breadcrumb">
                            <ul>
                                <li><a href="https://klbtheme.com/bacola">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </nav>
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="woocommerce-form-coupon-toggle">

                                <div class="woocommerce-info">
                                    Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a>
                                </div>
                            </div>

                            <div class="woocommerce-notices-wrapper"></div>
                            <form name="checkout" method="post" class="checkout woocommerce-checkout"
                                action="{{ route('order.create') }}" >
                                <div class="cart-form-wrapper">
                                    <div class="row content-wrapper sidebar-right">
                                        <div class="col-12 col-md-12 col-lg-12 content-primary">
                                            <div class="cart-wrapper">
                                                <div class="klb-free-progress-bar warning">
                                                    <div class="free-shipping-notice">
                                                        Add <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">$</span>42.75</span>
                                                        to cart and get free shipping! </div>
                                                    <div class="klb-progress-bar">
                                                        <span class="progress" style="width: 14%"></span>
                                                    </div>
                                                </div>
                                                <div class="col2-set" id="customer_details">
                                                    <div class="col-1">
                                                        <div class="woocommerce-billing-fields">
                                                            {{-- <h3>Billing details</h3> --}}
                                                            <form id="form-edit-billing-address" method="post"
                                                                action="{{ route('myaccount.edit-billing') }}">
                                                                @csrf
                                                                <h3>Billing address</h3>
                                                                <div class="woocommerce-address-fields">

                                                                    <div class="woocommerce-address-fields__field-wrapper">
                                                                        <p class="form-row form-row-first validate-required"
                                                                            id="billing_first_name_field"
                                                                            data-priority="10">
                                                                            <label for="billing_first_name"
                                                                                class="">First name</label>
                                                                            <span class="woocommerce-input-wrapper">
                                                                                <input type="text" class="input-text "
                                                                                    name="first_name"
                                                                                    id="billing_first_name" placeholder=""
                                                                                    value="{{ $billing_address->first_name }}"
                                                                                    autocomplete="given-name">
                                                                                <div data-lastpass-icon-root="true"
                                                                                    style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                                                </div>
                                                                            </span>
                                                                        </p>
                                                                        <p class="form-row form-row-last validate-required"
                                                                            id="billing_last_name_field" data-priority="20">
                                                                            <label for="billing_last_name"
                                                                                class="">Last name</label>
                                                                            <span class="woocommerce-input-wrapper">
                                                                                <input type="text" class="input-text "
                                                                                    name="last_name" id="billing_last_name"
                                                                                    placeholder=""
                                                                                    value="{{ $billing_address->last_name }}"
                                                                                    autocomplete="family-name">
                                                                            </span>
                                                                        </p>
                                                                        <p class="form-row form-row-wide"
                                                                            id="billing_company_field" data-priority="30">
                                                                            <label for="billing_company"
                                                                                class="">Company name&nbsp;
                                                                                <span
                                                                                    class="optional">(optional)</span></label><span
                                                                                class="woocommerce-input-wrapper">
                                                                                <input type="text" class="input-text "
                                                                                    name="company" id="billing_company"
                                                                                    placeholder="" value=""
                                                                                    autocomplete="organization">
                                                                            </span>
                                                                        </p>
                                                                        <label for="country_code">Select Country</label>
                                                                        <select name="country_code" id="country_code">
                                                                            <option value="vn">VN</option>
                                                                            <option value="us">USA</option>
                                                                        </select>
                                                                        <p class="form-row address-field validate-required form-row-wide"
                                                                            id="billing_address_1_field"
                                                                            data-priority="50"><label
                                                                                for="billing_address_1"
                                                                                class="">Street address&nbsp;<abbr
                                                                                    class="required"
                                                                                    title="required">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="text" class="input-text "
                                                                                    name="street_address"
                                                                                    id="billing_address_1"
                                                                                    placeholder="House number and street name"
                                                                                    value="{{ $billing_address->street_address }}"
                                                                                    autocomplete="address-line1"
                                                                                    data-placeholder="House number and street name"></span>
                                                                        </p>

                                                                        <p class="form-row address-field validate-required form-row-wide"
                                                                            id="billing_city_field" data-priority="70"
                                                                            data-o_class="form-row form-row-wide address-field validate-required">
                                                                            <label for="billing_city" class="">Town
                                                                                / City&nbsp;<abbr class="required"
                                                                                    title="required">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="text" class="input-text "
                                                                                    name="town_city" id="billing_city"
                                                                                    placeholder=""
                                                                                    value="{{ $billing_address->town_city }}"
                                                                                    autocomplete="address-level2"></span>
                                                                        </p>

                                                                        <p class="form-row address-field validate-required validate-postcode form-row-wide"
                                                                            id="billing_postcode_field" data-priority="90"
                                                                            data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                                                                            <label for="billing_postcode"
                                                                                class="">ZIP Code&nbsp;<abbr
                                                                                    class="required"
                                                                                    title="required">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="text" class="input-text "
                                                                                    name="zip_code" id="billing_postcode"
                                                                                    placeholder=""
                                                                                    value="{{ $billing_address->zip_code }}"
                                                                                    autocomplete="postal-code"></span>
                                                                        </p>
                                                                        <p class="form-row form-row-wide validate-required validate-phone"
                                                                            id="billing_phone_field" data-priority="100">
                                                                            <label for="billing_phone"
                                                                                class="">Phone&nbsp;<abbr
                                                                                    class="required"
                                                                                    title="required">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="tel" class="input-text "
                                                                                    name="phone" id="billing_phone"
                                                                                    placeholder=""
                                                                                    value="{{ $billing_address->phone }}"
                                                                                    autocomplete="tel">
                                                                            </span>
                                                                        </p>
                                                                        <p class="form-row form-row-wide validate-required validate-email"
                                                                            id="billing_email_field" data-priority="110">
                                                                            <label for="billing_email"
                                                                                class="">Email address&nbsp;<abbr
                                                                                    class="required"
                                                                                    title="required">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="email" class="input-text "
                                                                                    name="email" id="billing_email"
                                                                                    placeholder=""
                                                                                    value="{{ $billing_address->email }}"
                                                                                    autocomplete="email username"></span>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>

                                                    <div class="col-2">
                                                        <div class="woocommerce-shipping-fields">

                                                            <h3 id="ship-to-different-address">
                                                                <label
                                                                    class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">

                                                                </label>
                                                            </h3>

                                                        </div>
                                                        <div class="woocommerce-additional-fields">
                                                            <div class="woocommerce-additional-fields__field-wrapper">
                                                                <p class="form-row notes" id="order_comments_field"
                                                                    data-priority=""><label for="order_comments"
                                                                        class="">Order notes&nbsp;<span
                                                                            class="optional">(optional)</span></label><span
                                                                        class="woocommerce-input-wrapper">
                                                                        <textarea name="order_notes" class="input-text " id="order_comments"
                                                                            placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                                                    </span></p>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-review-wrapper">

                                                    <h3 id="order_review_heading">Your order</h3>


                                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                                        <table class="shop_table woocommerce-checkout-review-order-table"
                                                            style="position: static; zoom: 1;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name">Product</th>
                                                                    <th class="product-total">Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($cart_session->products as $item)
                                                                    <tr class="cart_item">
                                                                        <td class="product-name">
                                                                            {{ $item['product_info']->title }}
                                                                            <strong
                                                                                class="product-quantity">×{{ $item['qty'] }}</strong>
                                                                        </td>
                                                                        <td class="product-total">
                                                                            <span
                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                        class="woocommerce-Price-currencySymbol"></span>{{ number_format($item['price']) }}
                                                                                    đ</bdi></span>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>

                                                                <tr class="cart-subtotal">
                                                                    <th>Subtotal</th>
                                                                    <td><span class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol"></span>{{ $cart_session->subTotalPrice }}</bdi></span>
                                                                    </td>
                                                                </tr>




                                                                <tr class="woocommerce-shipping-totals shipping">
                                                                    <th>Shipping</th>
                                                                    <td data-title="Shipping">
                                                                        <ul id="shipping_method"
                                                                            class="woocommerce-shipping-methods">
                                                                            <li>
                                                                                <input type="radio"
                                                                                    name="shipping_method[0]"
                                                                                    data-index="0"
                                                                                    id="shipping_method_0_flat_rate1"
                                                                                    value="flat_rate:1"
                                                                                    class="shipping_method"
                                                                                    checked="checked"><label
                                                                                    for="shipping_method_0_flat_rate1">Flat
                                                                                    rate: <span
                                                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                                                class="woocommerce-Price-currencySymbol">$</span>{{ number_format($cart_session->ship_cost) }}
                                                                                            đ</bdi></span></label>
                                                                            </li>

                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr class="order-total">
                                                                    <th>Total</th>
                                                                    <td><strong><span
                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                        class="woocommerce-Price-currencySymbol"></span>{{ number_format($cart_session->totalPrice) }}</bdi></span></strong>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>

                                                        <div id="payment" class="woocommerce-checkout-payment"
                                                            style="position: static; zoom: 1;">
                                                            <ul class="wc_payment_methods payment_methods methods">
                                                                <li class="wc_payment_method payment_method_bacs">
                                                                    <input id="payment_method_bacs" type="radio"
                                                                        class="input-radio" name="payment_method"
                                                                        value="bacs" checked="checked"
                                                                        data-order_button_text="">

                                                                    <label for="payment_method_bacs">
                                                                         VNPAY
                                                                    </label>
                                                                    <div class="payment_box payment_method_bacs"
                                                                        style="">
                                                                        <p>Make your payment directly into our bank account.
                                                                            Please use your Order ID as the payment
                                                                            reference. Your order will not be shipped until
                                                                            the funds have cleared in our account.</p>
                                                                    </div>
                                                                </li>
                                                                {{-- <li class="wc_payment_method payment_method_cheque">
                                                                    <input id="payment_method_cheque" type="radio"
                                                                        class="input-radio" name="payment_method"
                                                                        value="cheque" data-order_button_text="">

                                                                    <label for="payment_method_cheque">
                                                                        Check payments </label>
                                                                    <div class="payment_box payment_method_cheque"
                                                                        style="display: none;">
                                                                        <p>Please send a check to Store Name, Store Street,
                                                                            Store Town, Store State / County, Store
                                                                            Postcode.</p>
                                                                    </div>
                                                                </li>
                                                                <li class="wc_payment_method payment_method_cod">
                                                                    <input id="payment_method_cod" type="radio"
                                                                        class="input-radio" name="payment_method"
                                                                        value="cod" data-order_button_text="">

                                                                    <label for="payment_method_cod">
                                                                        Cash on delivery </label>
                                                                    <div class="payment_box payment_method_cod"
                                                                        style="display: none;">
                                                                        <p>Pay with cash upon delivery.</p>
                                                                    </div>
                                                                </li> --}}
                                                            </ul>
                                                            <div class="form-row place-order">
                                                                <noscript>
                                                                    Since your browser does not support JavaScript, or it is
                                                                    disabled, please ensure you click the <em>Update
                                                                        Totals</em> button before placing your order. You
                                                                    may be charged more than the amount stated above if you
                                                                    fail to do so. <br /><button type="submit"
                                                                        class="button alt"
                                                                        name="woocommerce_checkout_update_totals"
                                                                        value="Update totals">Update totals</button>
                                                                </noscript>

                                                                <div class="woocommerce-terms-and-conditions-wrapper">
                                                                    <div class="woocommerce-privacy-policy-text">
                                                                        <p>Your personal data will be used to process your
                                                                            order, support your experience throughout this
                                                                            website, and for other purposes described in our
                                                                            <a href="https://klbtheme.com/bacola/privacy-policy/"
                                                                                class="woocommerce-privacy-policy-link"
                                                                                target="_blank">privacy policy</a>.
                                                                        </p>
                                                                    </div>
                                                                    <div class="woocommerce-terms-and-conditions"
                                                                        style="display: none; max-height: 200px; overflow: auto;">
                                                                        <h3>Our Terms &amp; Conditions</h3>
                                                                        
                                                                    </div>
                                                                    <p class="form-row validate-required">
                                                                        <label
                                                                            class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                                            <input type="checkbox"
                                                                                class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                                                                                name="terms" id="terms">
                                                                            <span
                                                                                class="woocommerce-terms-and-conditions-checkbox-text">I
                                                                                have read and agree to the website <a
                                                                                    href="https://klbtheme.com/bacola/terms-and-conditions/"
                                                                                    class="woocommerce-terms-and-conditions-link"
                                                                                    target="_blank">terms and
                                                                                    conditions</a></span>&nbsp;<abbr
                                                                                class="required" title="required">*</abbr>
                                                                        </label>
                                                                    </p>
                                                                </div>
                                                                <input type="text" name="billing_address_id" value="{{ $billing_address->id }}" hidden>

                                                                <button type="submit" class="button alt"
                                                                    name="woocommerce_checkout_place_order"
                                                                    id="place_order" value="Place order"
                                                                    data-value="Place order">Place order
                                                                </button>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div><!-- homepage-content -->
        </div><!-- site-content -->
    </main>
@endsection
