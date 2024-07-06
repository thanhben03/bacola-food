<form class="woocommerce-EditAccountForm edit-account" action="{{ route('account.update') }}" method="post">


    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
        <label for="account_first_name">Full name&nbsp;<span class="required">*</span></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" id="first_name"
            autocomplete="given-name" value="{{ $user->name }}">
    </p>

    <div class="clear"></div>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="email">Email address&nbsp;<span class="required">*</span></label>
        <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email"
            id="email" autocomplete="email" value="{{ $user->email }}">
    </p>
    <p>

        <button type="submit" class="woocommerce-Button button" value="Save changes">Save
            changes</button>
    </p>
</form>
<form action="{{ route('account.change-password') }}" method="POST">
    <fieldset>
        <legend>Password change</legend>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_current">Current password (leave blank to leave unchanged)</label>
            <span class="password-input"><input type="password"
                    class="woocommerce-Input woocommerce-Input--password input-text" name="password_current"
                    id="password_current" autocomplete="off"><span class="show-password-input"></span>
                <div data-lastpass-icon-root="true"
                    style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                </div>
            </span>
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_1">New password (leave blank to leave unchanged)</label>
            <span class="password-input"><input type="password"
                    class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1"
                    autocomplete="off"><span class="show-password-input"></span>
                <div data-lastpass-icon-root="true"
                    style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                </div>
            </span>
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_2">Confirm new password</label>
            <span class="password-input">
                <input type="password"
                    class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2"
                    autocomplete="off"><span class="show-password-input"></span>
                <div data-lastpass-icon-root="true"
                    style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                </div>
            </span>
        </p>
    </fieldset>
    <div class="clear"></div>


    <p>
        <button type="submit" class="woocommerce-Button button" name="save_details" value="Save changes">Save
            changes</button>
    </p>


</form>
