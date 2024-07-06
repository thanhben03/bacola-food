@extends('layouts.client.master')

@section('content')
    <main id="main" class="site-primary">
        <div class="site-content">
            <div class="homepage-content">
                <div data-elementor-type="wp-page" data-elementor-id="50" class="elementor elementor-50">
                    {{-- section slider --}}
                    @include('layouts.client.includes.slider')

                    {{-- Main Home --}}
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-057d4fb elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="057d4fb" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                            {{-- sidebar --}}
                            @include('layouts.client.includes.sidebar')
                            {{-- Center --}}
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-9a40b7e"
                                data-id="9a40b7e" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    {{-- Best Seller --}}
                                    @include('client.components.best-seller')

                                    {{-- Banner middle --}}
                                    @include('client.components.banner-middle')

                                    {{-- Hot product for this week --}}
                                    @include('client.components.hot-product')

                                    {{-- Super discount for first purchase --}}
                                    @include('client.components.super-discount')

                                    {{-- New Product --}}
                                    @include('client.components.new-product')

                                    {{-- Section Banner Populate Bottom --}}
                                    @include('layouts.client.includes.banner-bottom')
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- Section Category Bottom --}}
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-11e6391 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="11e6391" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-aa8f598"
                                data-id="aa8f598" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-9a5c284 elementor-widget elementor-widget-bacola-product-categories"
                                        data-id="9a5c284" data-element_type="widget"
                                        data-widget_type="bacola-product-categories.default">
                                        <div class="elementor-widget-container">
                                            <div class="site-module module-category style-1">
                                                <div class="module-body">
                                                    <div class="categories">
                                                        @include('client.components.category-bottom')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div><!-- homepage-content -->
        </div><!-- site-content -->
    </main>
@endsection
@push('home-js')
    <script type='text/javascript' src='/assets/js/frontend.min.js' id='elementor-frontend-js'></script> 
    <script>jQuery.noConflict();</script>
   
@endpush
