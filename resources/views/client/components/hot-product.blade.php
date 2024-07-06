<div class="elementor-element elementor-element-c9a2835 elementor-widget elementor-widget-bacola-deal-carousel"
    data-id="c9a2835" data-element_type="widget" data-widget_type="bacola-deal-carousel.default">
    <div class="elementor-widget-container">
        <div class="site-module module-hot-product">
            <div class="module-header">
                <div class="column">
                    <h4 class="entry-title">HOT PRODUCT FOR <span>THIS WEEK</span>
                    </h4>
                    <div class="entry-description">Dont miss this opportunity at a
                        special discount just for this week.</div>
                </div>
                <div class="column"><a href="{{ route('home') }}/shop/?display=hot-product"
                        class="button button-info-default xsmall rounded">View All
                        <i class="klbth-icon-right-arrow"></i></a></div>
                <!-- column -->
            </div><!-- module-header -->
            <div class="module-body">
                <div class="hot-product products">
                    <div class="product">
                        <div class="hot-sale">{{ $hot_product->discount }}%</div>
                        <div class="product-wrapper">
                            <div class="thumbnail-wrapper"><a
                                    href="https://klbtheme.com/bacola/product/chobani-complete-vanilla-greek-yogurt/"
                                    title="Chobani Complete Vanilla Greek Yogurt"><img decoding="async"
                                        src="{{ $hot_product->img_url }}"
                                        alt="Chobani Complete Vanilla Greek Yogurt"></a>
                            </div>
                        <div class="content-wrapper">
                                <div class="hot-product-header"><span class="price"><del aria-hidden="true"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol"></span>{{ number_format($hot_product->old_price) }}đ</bdi></span></del>
                                        <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol"></span>{{ number_format($hot_product->price) }}đ</bdi></span></ins></span>
                                </div>
                                <h3 class="product-title"><a
                                        href="https://klbtheme.com/bacola/product/chobani-complete-vanilla-greek-yogurt/">{{ $hot_product->title }}</a></h3>
                                <div class="product-meta">
                                    <div class="product-unit"> 1 kg</div>
                                    <div class="product-available in-stock">In Stock
                                    </div>
                                </div><!-- product-meta -->
                                <div class="product-progress"><span class="progress" style="width: 94%;"></span></div>
                                <!-- product-progress -->
                                <div class="product-expired">
                                    <div class="countdown" data-date="{{ $hot_product->end_day }}">
                                        <div class="count-item days"></div>
                                        <span>:</span>
                                        <div class="count-item hours"></div>
                                        <span>:</span>
                                        <div class="count-item minutes"></div>
                                        <span>:</span>
                                        <div class="count-item second"></div>
                                    </div><!-- countdown -->
                                    <div class="expired-text">Remains until the end
                                        of the offer</div>
                                    
                                </div><!-- product-expired -->
                            </div><!-- content-wrapper -->
                        </div><!-- product-wrapper --><a
                            href="https://klbtheme.com/bacola/product/chobani-complete-vanilla-greek-yogurt/"
                            title="Chobani Complete Vanilla Greek Yogurt" class="overlay-link"></a>
                    </div><!-- product -->
                </div>
                
            </div>
        </div>
    </div>
</div>
