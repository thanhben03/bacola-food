<div class="woocommerce-notices-wrapper"></div>

<p>
    The following addresses will be used on the checkout page by default.</p>

<div class="u-columns woocommerce-Addresses col2-set addresses"
    style="
            width: 50%;
            display: flex;
            justify-content: space-between;
            ">
    <div class="u-column1 woocommerce-Address">
        <header class="woocommerce-Address-title title">
            <h3>Shipping Address</h3>
            <a href="{{ route('myaccount.show-edit-billing') }}" class="edit">Edit</a>
        </header>
        <address>
            {{ Auth::user()->string_ship_address }}
        </address>
    </div>


    <div class="u-column2 woocommerce-Address">
        <header class="woocommerce-Address-title title">
            <h3>Default Address</h3>
            <a href="{{ route('myaccount.show-default-address') }}" class="edit">Edit</a>
        </header>
        <address>
            {{ Auth::user()->string_default_address }}
        </address>
    </div>


</div>
