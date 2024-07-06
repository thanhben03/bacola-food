<div class="elementor-element elementor-element-f9afb9a elementor-widget elementor-widget-bacola-product-grid"
    data-id="f9afb9a" data-element_type="widget" data-widget_type="bacola-product-grid.default">
    <div class="elementor-widget-container">
        <div class="site-module module-products">
            <div class="module-header">
                <div class="column">
                    <h4 class="entry-title">NEW PRODUCTS</h4>
                    <div class="entry-description">New products with updated stocks.
                    </div>
                </div><!-- column -->
                <div class="column"><a href="{{ route('home') }}/shop"
                        class="button button-info-default xsmall rounded">View All
                        <i class="klbth-icon-right-arrow"></i></a></div>
                <!-- column -->
            </div><!-- module-header -->
            <div class="module-body">
                <div class="products column-4 mobile-column-2">
                    @foreach ($new_products as $item)
                        <div
                            class="product type-product post-424 status-publish last instock product_cat-biscuits-snacks has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                            <div class="product-wrapper product-type-1">
                                <div class="thumbnail-wrapper">
                                    <div class="product-badges"><span
                                            class="badge  onsale">{{ $item->discount }}%</span></div><a
                                        href="{{ route('product.view', $item->slug) }}"><img decoding="async"
                                            src="{{ $item->img_url }}"
                                            alt="Angie&#8217;s Boomchickapop Sweet &#038; Salty Kettle Corn"></a>
                                    <div class="product-buttons"><a href="424"
                                            class="detail-bnt quick-view-button"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M128 32V0H16C7.163 0 0 7.163 0 16v112h32V54.56L180.64 203.2l22.56-22.56L54.56 32H128zM496 0H384v32h73.44L308.8 180.64l22.56 22.56L480 54.56V128h32V16c0-8.837-7.163-16-16-16zM480 457.44L331.36 308.8l-22.56 22.56L457.44 480H384v32h112c8.837 0 16-7.163 16-16V384h-32v73.44zM180.64 308.64L32 457.44V384H0v112c0 8.837 7.163 16 16 16h112v-32H54.56L203.2 331.36l-22.56-22.72z" />
                                            </svg></a>
                                        <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart tinvwl-the_content"
                                            data-tinvwl_product_id="424">
                                            <div class="tinv-wishlist-clear"></div>
                                            <a role="button" tabindex="0"
                                                name="add-to-wishlist" aria-label="Add to Wishlist"
                                                class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  
                                                tinvwl-position-shortcode"
                                                data-product_id="{{ $item->id }}"
                                                >
                                               <span
                                                    class="tinvwl_add_to_wishlist-text">Add
                                                    to Wishlist</span></a>
                                            <div class="tinv-wishlist-clear"></div>
                                            <div class="tinvwl-tooltip">Add to Wishlist
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-wrapper">
                                    <h3 class="product-title"><a
                                            href="https://klbtheme.com/bacola/product/angies-boomchickapop-sweet-salty-kettle-corn/"
                                            title="Angie&#8217;s Boomchickapop Sweet &#038; Salty Kettle Corn">{{ $item->title }}</a>
                                    </h3>
                                    <div class="product-meta">
                                        <div class="product-available in-stock">In Stock
                                        </div>
                                    </div>
                                    <div class="product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5"><span
                                                style="width:80%">Rated <strong class="rating">4.00</strong> out of
                                                5</span></div>
                                        <div class="count-rating">1 <span class="rating-text">Ratings</span></div>
                                    </div><span class="price"><del aria-hidden="true"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol"></span>{{ $item->format_old_price }}</bdi></span></del>
                                        <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol"></span>{{ $item->format_price }}</bdi></span></ins></span>
                                    <div class="product-fade-block">
                                        @if ($cart_session == null || !array_key_exists($item['id'], session()->get('cart')->products))
                                            <div class="product-button-group cart-with-quantity ">
                                                <div class="quantity ajax-quantity">
                                                    <div class="quantity-button minus"><i class="klbth-icon-minus"></i>
                                                    </div><input type="text" class="input-text qty text"
                                                        name="quantity" step="1" min="0" max=""
                                                        data-product_id="{{ $item['id'] }}" value="1"
                                                        title="Menge" size="4" inputmode="numeric">
                                                    <div class="quantity-button plus"><i class="klbth-icon-plus"></i>
                                                    </div>
                                                </div><!-- quantity -->
                                                <p data-quantity="1"
                                                    class="button-primary xsmall rounded wide button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                    data-product_id="{{ $item['id'] }}"
                                                    aria-label="Add &ldquo;Angie&#039;s Boomchickapop Sweet &amp; Salty Kettle Corn&rdquo; to your cart"
                                                    rel="nofollow">Add to cart
                                                </p>
                                            </div>
                                        @else
                                        {{-- {{ print_r($cart_session->products[$item->id]['qty']) }} --}}
                                            <div class="product-button-group cart-with-quantity product-in-cart">
                                                <div class="quantity ajax-quantity">
                                                    <div class="quantity-button minus"><i class="klbth-icon-minus"></i>
                                                    </div><input type="text" class="input-text qty text"
                                                        name="quantity" step="1" min="0" max="11111"
                                                        data-product_id="{{ $item->id }}"
                                                        value="{{ $cart_session->products[$item->id]['qty'] }}" title="Menge" size="4"
                                                        inputmode="numeric">
                                                    <div class="quantity-button plus"><i class="klbth-icon-plus"></i>
                                                    </div>
                                                </div><!-- quantity -->

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-fade border-info"></div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
