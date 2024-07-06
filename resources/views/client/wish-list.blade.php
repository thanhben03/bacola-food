@extends('layouts.client.master')
@section('content')
    <main id="main" class="site-primary">
        <div class="site-content">
            <div class="homepage-content">
                <div data-elementor-type="wp-page" data-elementor-id="633" class="elementor elementor-633">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-1922087b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="1922087b" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2658ff39"
                                data-id="2658ff39" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-214b7e48 elementor-widget elementor-widget-shortcode"
                                        data-id="214b7e48" data-element_type="widget" data-widget_type="shortcode.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-shortcode">
                                                <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                                                    <div class="tinv-header">
                                                        <h2>Default wishlist</h2>
                                                    </div>
                                                    @if ($wishlists != null)
                                                        @include('client.components.exists-wishlist')
                                                    @else
                                                        @include('client.components.empty-wishlist')
                                                    @endif

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
