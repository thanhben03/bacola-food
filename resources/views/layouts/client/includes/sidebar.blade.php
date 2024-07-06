<div class="sidebar elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-80d9e2d"
    data-id="80d9e2d" data-element_type="column">
    <div class="elementor-widget-wrap elementor-element-populated">
        {{-- Banner 1 --}}
        <div class="elementor-element elementor-element-8dc5612 elementor-widget elementor-widget-bacola-banner-box"
            data-id="8dc5612" data-element_type="widget" data-widget_type="bacola-banner-box.default">
            <div class="elementor-widget-container">
                <div class="widget widget_text">
                    <div class="widget-body">
                        <div class="module-banner image align-left align-top full-text">
                            <div class="module-body">
                                <div class="banner-wrapper">
                                    <div class="banner-content">
                                        <div class="content-header">
                                            <div class="sub-text color-white">{{ $banners[0]->title }}</div>
                                        </div>
                                        <div class="content-main">
                                            <h4 class="entry-subtitle color-text small xlight">
                                                {{ $banners[0]->title_1 }}</h4>
                                            <h3 class="entry-title color-text">{{ $banners[0]->title_2 }}
                                            </h3>
                                        </div>
                                        <div class="content-footer column"><span
                                                class="price-text color-text">{{ $banners[0]->sub_title }}</span><span
                                                class="price color-price">{{ number_format($banners[0]->from_cost) }} Đ</span>
                                        </div>
                                    </div>
                                    <div class="banner-thumbnail"><img decoding="async" src="{{ $banners[0]->img_url }}"
                                            alt="banner"></div><a href="" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Banner 2 --}}
        <div class="elementor-element elementor-element-1494925 elementor-widget elementor-widget-bacola-banner-box"
            data-id="1494925" data-element_type="widget" data-widget_type="bacola-banner-box.default">
            <div class="elementor-widget-container">
                <div class="widget widget_text">
                    <div class="widget-body">
                        <div class="module-banner image align-left align-top full-text">
                            <div class="module-body">
                                <div class="banner-wrapper">
                                    <div class="banner-content">
                                        <div class="content-header">
                                            <div class="sub-text color-text-lighter">{{ $banners[1]->title }}</div>
                                        </div>
                                        <div class="content-main">
                                            <h4 class="entry-subtitle color-text small xlight">
                                                {{ $banners[1]->title_1 }}</h4>
                                            <h3 class="entry-title color-text bolder">{{ $banners[1]->title_2 }}</h3>
                                        </div>
                                        <div class="content-footer column"><span
                                                class="price-text color-text">{{ $banners[1]->sub_title }}</span><span
                                                class="price color-price">{{ number_format($banners[1]->from_cost) }} Đ</span>
                                        </div><a href="#" class="button button-secondary rounded xsmall">Shop
                                            Now</a>
                                    </div>
                                    <div class="banner-thumbnail"><img decoding="async"
                                            src="{{ $banners[1]->img_url }}" alt="banner"></div><a href="#"
                                        class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Download the bacola app --}}
        <div class="elementor-element elementor-element-4f4c835 elementor-widget elementor-widget-bacola-icon-list"
            data-id="4f4c835" data-element_type="widget" data-widget_type="bacola-icon-list.default">
            <div class="elementor-widget-container">
                <div class="widget widget_klb_iconboxes">
                    <div class="widget-body">
                        <div class="iconboxes-widget">
                            <div class="item">
                                <div class="icon"><i class="klbth-icon-download"></i></div>
                                <div class="text">Download the Bacola App to your Phone.
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon"><i class="klbth-icon-delivery-box-1"></i>
                                </div>
                                <div class="text">Order now so you dont miss the
                                    opportunities.</div>
                            </div>
                            <div class="item">
                                <div class="icon"><i class="klbth-icon-clock"></i></div>
                                <div class="text">Your order will arrive at your door in 15
                                    minutes.</div>
                            </div>
                        </div><!-- iconboxes -->
                    </div><!-- widget-body -->
                </div>
            </div>
        </div>

        {{-- Trending product --}}
        <div class="elementor-element elementor-element-b8af8d6 elementor-widget elementor-widget-bacola-product-list"
            data-id="b8af8d6" data-element_type="widget" data-widget_type="bacola-product-list.default">
            <div class="elementor-widget-container">
                <div class="widget widget_klb_products">
                    <h4 class="widget-title">Trending Products</h4>
                    <div class="widget-body">
                        <div class="products products-list">
                            @foreach ($trending_product as $item)
                                <div class="product product-type-simple">
                                    <div class="product-wrapper">
                                        <div class="thumbnail-wrapper">
                                            <a href="{{ route('product.view', $item['slug']) }}"
                                                title="USDA Choice Angus Beef Stew Meat">
                                                <img decoding="async" src="{{ $item['img_url'] }}" alt="USDA Choice Angus Beef Stew Meat"></a>
                                        </div>
                                        <div class="content-wrapper">
                                            <h3 class="product-title"><a href="{{ route('product.view', $item['slug']) }}">{{ $item['title'] }}</a></h3>
                                            <div class="product-meta"></div><span class="price"><del
                                                    aria-hidden="true"><span
                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                class="woocommerce-Price-currencySymbol"></span>{{ $item['old_price'] }}đ</bdi></span></del>
                                                <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                                class="woocommerce-Price-currencySymbol"></span>{{ $item['price'] }}đ</bdi></span></ins></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Customer comment --}}
        <div class="elementor-element elementor-element-23c1373 elementor-widget elementor-widget-bacola-testimonial"
            data-id="23c1373" data-element_type="widget" data-widget_type="bacola-testimonial.default">
            <div class="elementor-widget-container">
                <div class="widget widget_klb_customer">
                    <h4 class="widget-title">Customer Comment</h4>
                    <div class="widget-body">
                        <div class="customer-comment">
                            <h4 class="entry-title">The Best Marketplace</h4>
                            <div class="entry-message">Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut.</div>
                            <div class="customer">
                                <div class="avatar"><img decoding="async"
                                        src="https://klbtheme.com/bacola/wp-content/uploads/2021/04/avatar-3.jpg"
                                        alt="testimonial"></div>
                                <div class="detail">
                                    <h3 class="customer-name">Tina Mcdonnell</h3><span class="customer-mission">Sales
                                        Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
