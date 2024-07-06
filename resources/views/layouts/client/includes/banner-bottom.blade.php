<section
    class="elementor-section elementor-inner-section elementor-element elementor-element-f9282c2 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="f9282c2" data-element_type="section">
    <div class="elementor-container elementor-column-gap-no">
        @foreach ($weekend_discounts as $item)
            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ee6fc62"
                data-id="ee6fc62" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-2da7cde elementor-widget elementor-widget-bacola-banner-box3"
                        data-id="2da7cde" data-element_type="widget" data-widget_type="bacola-banner-box3.default">
                        <div class="elementor-widget-container">
                            <div class="site-module module-banner image align-left align-center">
                                <div class="module-body">
                                    <div class="banner-wrapper">
                                        <div class="banner-content">
                                            <div class="content-header">
                                                <div class="discount-text color-success">
                                                    Weekend Discount {{ $item->rate_sale }}%</div>
                                            </div>
                                            <div class="content-main">
                                                <h3 class="entry-title color-text-light">{{ $item->title }}</h3>
                                                <div class="entry-text color-info-dark">{{ $item->sub_title }}</div>
                                            </div><a
                                                href="https://klbtheme.com/bacola/product/blue-diamond-almonds-lightly-salted/"
                                                class="button button-info-dark rounded xsmall">Shop
                                                Now</a>
                                        </div>
                                        <div class="banner-thumbnail"><img decoding="async"
                                                src="{{ $item->img_url }}"
                                                alt="banner"></div><a
                                            href="https://klbtheme.com/bacola/product/blue-diamond-almonds-lightly-salted/"
                                            class="overlay-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>
