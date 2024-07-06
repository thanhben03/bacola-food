@extends('layouts.client.master')

@section('content')
    <main id="main" class="site-primary">
        <div class="site-content">
            <div class="homepage-content">
                <div class="shop-content my-account-page">
                    <div class="container">
                        <nav class="woocommerce-breadcrumb">
                            <ul>
                                <li><a href="https://klbtheme.com/bacola">Home</a></li>
                                <li>My account</li>
                            </ul>
                        </nav>
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="site-login">
                                <div class="site-login-container">
                                    <div class="site-login-overflow">
                                        <ul class="login-page-tab">
                                            <li><a href="#" class="active">Login</a></li>

                                            <li><a href="#">Register</a></li>
                                        </ul>
                                        @if (session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                        <div id="customer_login" class="login-form-container">
                                            <div class="login-form">
                                                <form class="woocommerce-form woocommerce-form-login login" method="post" action="{{ route('login') }}">


                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="email">email address&nbsp;<span
                                                                class="required">*</span></label>
                                                        <input type="text"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            name="email" id="email" autocomplete="email"
                                                            value="">
                                                    <div data-lastpass-icon-root="true"
                                                        style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                    </div>
                                                    </p>
                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="password">Password&nbsp;<span
                                                                class="required">*</span></label>
                                                        <span class="password-input"><input
                                                                class="woocommerce-Input woocommerce-Input--text input-text"
                                                                type="password" name="password" id="password"
                                                                autocomplete="current-password"><span
                                                                class="show-password-input"></span>
                                                            <div data-lastpass-icon-root="true"
                                                                style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                            </div>
                                                        </span>
                                                    </p>


                                                    <p class="form-row">
                                                        <label
                                                            class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                                            <input
                                                                class="woocommerce-form__input woocommerce-form__input-checkbox"
                                                                name="rememberme" type="checkbox" id="rememberme"
                                                                value="forever"> <span>Remember me</span>
                                                        </label>
                                                        <button type="submit"
                                                            class="woocommerce-button button woocommerce-form-login__submit wp-element-button"
                                                            name="login" value="Log in">Log in</button>
                                                    </p>
                                                    <p class="woocommerce-LostPassword lost_password">
                                                        <a href="https://klbtheme.com/bacola/my-account/lost-password/">Lost
                                                            your password?</a>
                                                    </p>


                                                </form>
                                            </div>
                                            <div class="register-form">
                                                <form method="POST" action="{{ route('register') }}"
                                                    class="woocommerce-form woocommerce-form-register register">
                                                    @csrf
                                                    @if ($errors->any())
                                                        @foreach ($errors->all() as $item)
                                                            <h4>{{ $item }}</h4>
                                                        @endforeach
                                                    @endif

                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_email">Email address&nbsp;<span
                                                                class="required">*</span></label>
                                                        <input type="email"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            name="email" id="reg_email" autocomplete="email"
                                                            value="">
                                                    <div data-lastpass-icon-root="true"
                                                        style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                    </div>
                                                    </p>

                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_name">Full Name<span
                                                                class="required">*</span></label>
                                                        <input type="text"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            name="name" id="reg_name" autocomplete="email"
                                                            value="">
                                                    <div data-lastpass-icon-root="true"
                                                        style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                    </div>
                                                    </p>

                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_password">Password&nbsp;<span
                                                                class="required">*</span></label>
                                                        <span class="password-input"><input type="password"
                                                                class="woocommerce-Input woocommerce-Input--text input-text"
                                                                name="password" id="reg_password"
                                                                autocomplete="new-password"><span
                                                                class="show-password-input"></span>
                                                            <div data-lastpass-icon-root="true"
                                                                style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                            </div>
                                                        </span>
                                                    </p>
                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_password">Password Confirmation&nbsp;<span
                                                                class="required">*</span></label>
                                                        <span class="password-input"><input type="password"
                                                                class="woocommerce-Input woocommerce-Input--text input-text"
                                                                name="password_confirmation" id="reg_password"
                                                                autocomplete="new-password"><span
                                                                class="show-password-input"></span>
                                                            <div data-lastpass-icon-root="true"
                                                                style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                            </div>
                                                        </span>
                                                    </p>


                                                    <div class="woocommerce-privacy-policy-text">
                                                        <p>Your personal data will be used to support your experience
                                                            throughout this website, to manage access to your account, and
                                                            for other purposes described in our <a
                                                                href="https://klbtheme.com/bacola/privacy-policy/"
                                                                class="woocommerce-privacy-policy-link"
                                                                target="_blank">privacy policy</a>.</p>
                                                    </div>
                                                    <p class="woocommerce-form-row form-row">
                                                        <button type="submit"
                                                            class="woocommerce-Button woocommerce-button button wp-element-button woocommerce-form-register__submit"
                                                            value="Register">Register</button>
                                                    </p>


                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- site-login-overflow -->
                                </div><!-- site-login-container -->
                            </div><!-- site-login -->

                        </div>
                    </div>
                </div>
            </div><!-- homepage-content -->
        </div><!-- site-content -->
    </main>
@endsection
