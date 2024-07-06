@extends('layouts.client.master')

@section('content')
    <main id="main" class="site-primary">
        <div class="site-content">
            <div class="homepage-content">
                <div class="shop-content my-account-page">
                    <div class="container">
                        <nav class="woocommerce-breadcrumb">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>My account</li>
                            </ul>
                        </nav>
                        <div class="woocommerce">
                            <div class="row content-wrapper sidebar-right">
                                <div class="col-12 col-md-12 col-lg-12 content-primary">
                                    <div class="my-account-wrapper">
                                        <!-- my-account-wrapper be closed in myaccount.php -->
                                        <div class="my-account-navigation">
                                            <div class="account-toggle-menu">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="2.3" y1="12" x2="21.8" y2="12">
                                                    </line>
                                                    <line x1="2.3" y1="6" x2="21.8" y2="6">
                                                    </line>
                                                    <line x1="2.3" y1="18" x2="21.8" y2="18">
                                                    </line>
                                                </svg>
                                                Navigation
                                            </div><!-- account-toggle-menu -->
                                            <nav class="woocommerce-MyAccount-navigation">
                                                <ul>
                                                    <li
                                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                                                        <a href="{{ route('myaccount.index') }}">Dashboard</a>
                                                    </li>
                                                    <li
                                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                                        <a href="{{ route('order.histories') }}">Orders</a>
                                                    </li>
                                                    {{-- <li
                                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                                                        <a href="/downloads/">Downloads</a>
                                                    </li> --}}
                                                    <li
                                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                                        <a href="{{ route('myaccount.edit-address') }}">Addresses</a>
                                                    </li>
                                                    <li
                                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                                        <a href="{{ route('myaccount.show-edit-account') }}">Account
                                                            details</a>
                                                    </li>
                                                    <li
                                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist">
                                                        <a href="/wishlist/">Wishlist</a>
                                                    </li>
                                                    {{-- <li
                                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--compare">
                                                        <a href="/compare/">Compare</a>
                                                    </li> --}}
                                                    {{-- <li
                                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                                        <a href="#" class="btn-lougout">Logout</a>
                                                    </li> --}}
                                                </ul>
                                            </nav>
                                        </div>

                                        <div class="woocommerce-MyAccount-content">
                                            @if (session()->has('msg'))
                                                <div class="alert alert-success">
                                                    <span>{{ session()->get('msg') }}</span>
                                                </div>
                                            @endif
                                            {{-- {{ print_r($errors) }} --}}
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <span>{{ $errors->first() }}</span>
                                                </div>
                                            @endif
                                            @if ($component == 'default')
                                                <div class="woocommerce-notices-wrapper"></div>
                                                <p>
                                                    Hello
                                                    <strong>{{ Auth::user()->email }}</strong>
                                                    (not <strong>{{ Auth::user()->email }}</strong>?

                                                    <a id="btn-logout" href="#">Logout</a>
                                                    @csrf
                                                    )
                                                </p>

                                                <p>
                                                    From your account dashboard you can view your <a
                                                        href="https://klbtheme.com/bacola/my-account/orders/">recent
                                                        orders</a>,
                                                    manage your <a
                                                        href="{{ route('myaccount.edit-address') }}">shipping
                                                        and
                                                        billing addresses</a>, and <a
                                                        href="{{ route('myaccount.show-edit-account') }}">edit
                                                        your
                                                        password and account details</a>.</p>
                                            @else
                                                @include('client.components.' . $component)
                                            @endif



                                        </div>

                                    </div> <!-- my-account-wrapper closed in navigation.php -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- homepage-content -->
        </div><!-- site-content -->
    </main>
@endsection

@push('js')
    <script type='text/javascript' src='/assets/js/jquery-3.7.0.min.js'></script>
    <script>
        let btnLogout = $("#btn-logout");
        $(btnLogout).click(function(e) {
            let form = document.createElement("form");
            form.setAttribute("method", "POST");
            form.setAttribute("action", "/logout");
            var csrfToken = document.createElement("input");
            // s.setAttribute("type", "text");
            let token = $("input[name='_token']");
            form.append(token);
            $(document.body).append(form);

            form.submit();
        });
    </script>
@endpush
