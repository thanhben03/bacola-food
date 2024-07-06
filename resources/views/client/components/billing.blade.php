

<form id="form-edit-billing-address" method="post" action="{{ route('myaccount.edit-billing') }}">
    @csrf
    <h3>Billing address</h3>
    <div class="woocommerce-address-fields">

        <div class="woocommerce-address-fields__field-wrapper">
            <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                <label for="billing_first_name" class="">First name</label>
                <span class="woocommerce-input-wrapper">
                    <input type="text" class="input-text " name="first_name" id="billing_first_name" placeholder=""
                        value="{{ $billing_address->first_name }}" autocomplete="given-name">
                    <div data-lastpass-icon-root="true"
                        style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                    </div>
                </span>
            </p>
            <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                <label for="billing_last_name" class="">Last name</label>
                <span class="woocommerce-input-wrapper">
                    <input type="text" class="input-text " name="last_name" id="billing_last_name" placeholder=""
                        value="{{ $billing_address->last_name }}" autocomplete="family-name">
                </span>
            </p>
            <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                <label for="billing_company" class="">Company name&nbsp;
                    <span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper">
                    <input type="text" class="input-text " name="company" id="billing_company" placeholder=""
                        value="" autocomplete="organization">
                </span>
            </p>
            {{-- <p class="form-row form-row-wide address-field update_totals_on_change validate-required"
                id="billing_country_field" data-priority="40">
                <label for="billing_country" class="">Country /
                    Region</label>
                <select name="country_code" id="billing_country"
                    class="country_to_state country_select select2-hidden-accessible">
                    <option value="">Select a country / region…</option>
                    <option value="vn">Vietnam</option>

                </select>

            </p> --}}
            <label for="country_code">Select Country</label>
            <select name="country_code" id="country_code">
                <option value="vn">VN</option>
                <option value="us">USA</option>
            </select>
            <p class="form-row address-field validate-required form-row-wide" id="billing_address_1_field"
                data-priority="50"><label for="billing_address_1" class="">Street address&nbsp;<abbr
                        class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input
                        type="text" class="input-text " name="street_address" id="billing_address_1"
                        placeholder="House number and street name" value="{{ $billing_address->street_address }}"
                        autocomplete="address-line1" data-placeholder="House number and street name"></span>
            </p>

            <p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70"
                data-o_class="form-row form-row-wide address-field validate-required">
                <label for="billing_city" class="">Town / City&nbsp;<abbr class="required"
                        title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text"
                        class="input-text " name="town_city" id="billing_city" placeholder=""
                        value="{{ $billing_address->town_city }}" autocomplete="address-level2"></span>
            </p>

            <p class="form-row address-field validate-required validate-postcode form-row-wide"
                id="billing_postcode_field" data-priority="90"
                data-o_class="form-row form-row-wide address-field validate-required validate-postcode"><label
                    for="billing_postcode" class="">ZIP Code&nbsp;<abbr class="required"
                        title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text"
                        class="input-text " name="zip_code" id="billing_postcode" placeholder="" value="{{ $billing_address->zip_code }}"
                        autocomplete="postal-code"></span></p>
            <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field"
                data-priority="100"><label for="billing_phone" class="">Phone&nbsp;<abbr class="required"
                        title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input
                        type="tel" class="input-text " name="phone" id="billing_phone" placeholder=""
                        value="{{ $billing_address->phone }}" autocomplete="tel">
                </span>
            </p>
            <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field"
                data-priority="110"><label for="billing_email" class="">Email address&nbsp;<abbr
                        class="required" title="required">*</abbr></label><span
                    class="woocommerce-input-wrapper"><input type="email" class="input-text " name="email"
                        id="billing_email" placeholder="" value="{{ $billing_address->email }}"
                        autocomplete="email username"></span>
            </p>
        </div>


        <p>
            <button type="submit" class="button" value="Save address">Save
                address</button>

        </p>
    </div>

</form>


@push('js')
    <script>
        // (function($) {
        //     let formEditBillingAddress = $("#form-edit-billing-address");
        //     formEditBillingAddress.submit(function(e) {
        //         e.preventDefault();
        //         let formData = $(this).serialize();
        //         $.ajax({
        //             type: "POST",
        //             url: $(this).attr('action'),
        //             data: JSON.stringify(formData),
        //             dataType: "json",
        //             success: function(response) {

        //             }
        //         });
        //     });
        // })(jQuery.noConflict())
    </script>
@endpush
