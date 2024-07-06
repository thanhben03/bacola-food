<section
    class="elementor-section elementor-top-section elementor-element elementor-element-a406213 elementor-section-height-min-height elementor-section-items-stretch elementor-section-boxed elementor-section-height-default"
    data-id="a406213" data-element_type="section">
    <div class="elementor-container elementor-column-gap-extended">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b471779 elementor-hidden-tablet elementor-hidden-phone"
            data-id="b471779" data-element_type="column">
            <div class="elementor-widget-wrap">
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-c4ab63a"
            data-id="c4ab63a" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-2d45915 elementor-widget elementor-widget-bacola-home-slider"
                    data-id="2d45915" data-element_type="widget" data-widget_type="bacola-home-slider.default">
                    <div class="elementor-widget-container">
                        <div class="site-module module-slider  equal-height">
                            <div class="module-body">
                                <div class="slider-wrapper"><svg class="preloader" width="65px" height="65px"
                                        viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                                        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round"
                                            cx="33" cy="33" r="30"></circle>
                                    </svg>
                                    {{-- slider --}}
                                    <div class="site-slider" data-slideshow="1" data-slidespeed="1200" data-autoplay=""
                                        data-autospeed="" data-dots="true" data-arrows="false">
                                        @foreach ($sliders as $item)
                                            <div>
                                                <div class="slider-item">
                                                    <div class="content-wrapper">
                                                        <div class="content-header">
                                                            <div class="content-description">Exclusive
                                                                Offer</div>
                                                            <div class="content-discount">-{{ $item->rate_sale }}% Off</div>
                                                        </div>
                                                        <div class="content-main">
                                                            <h3 class="entry-title">{{ $item->title_slider }}</h3>
                                                            <div class="content-text">{{ $item->subtitle_slider }}</div>
                                                        </div>
                                                        <div class="content-footer"><span class="price-text">from
                                                            </span><span class="price">{{ number_format($item->from_cost) }} Đ</span></div>
                                                        <a href="{{ route('product.view', $item->product->slug) }}"
                                                            class="button button-secondary rounded">Shop
                                                            Now <i class="klbth-icon-right-arrow"></i></a>
                                                    </div>
                                                    <div class="image-wrapper"><img decoding="async"
                                                            src="{{ $item->img_url }}"
                                                            alt="bacola">
                                                    </div><a
                                                        href="{{ route('product.view', $item->product->slug) }}"
                                                        class="overlay-link"></a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
