@extends('layouts.client.master')
@section('content')
    <main id="main" class="site-primary single-product">
        <div class="site-content">
            <div class="homepage-content">

                <div class="shop-content single-content single-gray">
                    <div class="container">

                        <div class="klb-product-nav-wrapper">
                            <nav class="woocommerce-breadcrumb">
                                <ul>
                                    <li><a href="https://klbtheme.com/bacola">Home</a></li>
                                    <li><a
                                            href="{{ route('product.category', $product->category[0]->slug) }}">{{ $product->category[0]->title }}</a>
                                    </li>
                                    <li>{{ $product->title }}</li>
                                </ul>
                            </nav>

                        </div>

                        <div class="single-wrapper">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div id="product-424"
                                class="product type-product post-424 status-publish first instock product_cat-biscuits-snacks has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                                <div class="product-header">
                                    <h1 class="product_title entry-title">{{ $product->title }}</h1>
                                    <div class="product-meta top">

                                        <div class="product-brand">
                                            <table class="woocommerce-product-attributes shop_attributes">
                                                <tbody>
                                                    <tr
                                                        class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brands">
                                                        <th class="woocommerce-product-attributes-item__label">Brands</th>
                                                        <td class="woocommerce-product-attributes-item__value">
                                                            <p>{{ $product->brand }}</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="woocommerce-product-rating product-rating">
                                            <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                                <span style="width:80%">Rated <strong class="rating">4.00</strong> out of
                                                    5 based on <span class="rating">1</span> customer rating</span>
                                            </div>
                                            <div class="count-rating">
                                                <a href="#reviews" class="woocommerce-review-link" rel="nofollow"><span
                                                        class="count">1</span> review</a>
                                            </div>
                                        </div>


                                        <div class="sku-wrapper">
                                            <span>SKU:</span>
                                            <span class="sku">{{ $product->sku }}</span>
                                        </div>


                                    </div><!-- product-meta -->

                                </div>
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col col-12 col-lg-5 product-images">
                                            <div class="woocommerce-product-gallery  woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                                data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
                                                <div class="product-badges"><span
                                                        class="badge  onsale">{{ $product->discount }}%</span></div>
                                                <figure class="woocommerce-product-gallery__wrapper">
                                                    <div data-thumb="{{ $product->img_url }}"
                                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                                            href="{{ $product->img_url }}"><img
                                                                width="600" height="540"
                                                                src="{{ $product->img_url }}"
                                                                class="wp-post-image" alt="" decoding="async"
                                                                loading="lazy" title="product-image" data-caption=""
                                                                data-src="{{ $product->img_url }}"
                                                                data-large_image="{{ $product->img_url }}"
                                                                data-large_image_width="1024" data-large_image_height="921"
                                                                srcset="{{ $product->img_url }} 600w, {{ $product->img_url }} 60w, {{ $product->img_url }} 64w, {{ $product->img_url }} 300w, {{ $product->img_url }} 768w, {{ $product->img_url }} 1024w"
                                                                sizes="(max-width: 600px) 100vw, 600px" /></a></div>
                                                    <div data-thumb="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46-150x150.jpg"
                                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                                            href="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46.jpg"><img
                                                                width="600" height="540"
                                                                src="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46-600x540.jpg"
                                                                class="" alt="" decoding="async"
                                                                loading="lazy" title="product-image2" data-caption=""
                                                                data-src="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46.jpg"
                                                                data-large_image="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46.jpg"
                                                                data-large_image_width="1024" data-large_image_height="921"
                                                                srcset="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46-600x540.jpg 600w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46-60x54.jpg 60w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46-64x58.jpg 64w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46-300x270.jpg 300w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46-768x691.jpg 768w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image2-46.jpg 1024w"
                                                                sizes="(max-width: 600px) 100vw, 600px" /></a></div>
                                                    <div data-thumb="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34-150x150.jpg"
                                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                                            href="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34.jpg"><img
                                                                width="600" height="540"
                                                                src="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34-600x540.jpg"
                                                                class="" alt="" decoding="async"
                                                                loading="lazy" title="product-image3" data-caption=""
                                                                data-src="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34.jpg"
                                                                data-large_image="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34.jpg"
                                                                data-large_image_width="1024" data-large_image_height="921"
                                                                srcset="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34-600x540.jpg 600w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34-60x54.jpg 60w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34-64x58.jpg 64w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34-300x270.jpg 300w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34-768x691.jpg 768w, https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image3-34.jpg 1024w"
                                                                sizes="(max-width: 600px) 100vw, 600px" /></a></div>
                                                    <div class="klb-single-video"><a class="popup-youtube"
                                                            href="https://www.youtube.com/watch?v=nzonbqvE0Cg"><span>Watch
                                                                video</span></a></div>
                                                </figure>
                                            </div>
                                        </div>

                                        <div class="col col-12 col-lg-7 product-detail">


                                            <div class="column">
                                                <p class="price"><del><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol"></span>{{ $product->format_old_price }}</span></del>
                                                    <ins><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol"></span>{{ $product->format_price }}</span></ins>
                                                </p>
                                                <div class="product-meta">
                                                    <div class="stock product-available in-stock">
                                                        <span class="stock in-stock">In Stock</span>
                                                    </div>
                                                </div><!-- product-meta -->
                                                <div
                                                    class="woocommerce-product-details__short-description product-short-description">
                                                    <p>{{ $product->summary }}</p>
                                                </div>
                                                <div class="stock product-available in-stock">
                                                    <span class="stock in-stock">In Stock</span>
                                                </div>

                                                <form class="cart"
                                                    action="https://klbtheme.com/bacola/product/angies-boomchickapop-sweet-salty-kettle-corn/"
                                                    method="post" enctype='multipart/form-data'>

                                                    <div class="quantity">
                                                        <label class="screen-reader-text"
                                                            for="{{ $product->id }}">{{ $product->title }}</label>
                                                        <div class="quantity-button minus"><i
                                                                class="klbth-icon-minus"></i></div>
                                                        <input type="text" id="{{ $product->id }}"
                                                            class="input-text qty text" name="quantity" value="1"
                                                            title="Qty" size="4" min="1" max=""
                                                            step="1" placeholder="" inputmode="numeric"
                                                            data-product_id="{{ $product->id }}"
                                                            autocomplete="off" />
                                                        <div class="quantity-button plus"><i class="klbth-icon-plus"></i>
                                                        </div>
                                                    </div>

                                                    <button type="button" name="add-to-cart" 
                                                        data-product_id="{{ $product->id }}"
                                                        class="add_to_cart_button button alt wp-element-button">Add
                                                        to cart</button>

                                                </form>


                                                <button class="woosc-btn woosc-btn-424 " data-id="424"
                                                    data-product_name="Angie&#039;s Boomchickapop Sweet &amp; Salty Kettle Corn"
                                                    data-product_image="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image-60-150x150.jpg">Compare</button>
                                                <div class="product-actions">
                                                    <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart tinvwl-woocommerce_single_product_summary"
                                                        data-tinvwl_product_id="424">
                                                        <div class="tinv-wishlist-clear"></div><a role="button"
                                                            tabindex="0" name="add-to-wishlist"
                                                            aria-label="Add to Wishlist"
                                                            class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-shortcode"
                                                            data-tinv-wl-list="[]" data-tinv-wl-product="424"
                                                            data-tinv-wl-productvariation="0"
                                                            data-tinv-wl-productvariations="[]"
                                                            data-tinv-wl-producttype="simple"
                                                            data-tinv-wl-action="add"><span
                                                                class="tinvwl_add_to_wishlist-text">Add to
                                                                Wishlist</span></a>
                                                        <div class="tinv-wishlist-clear"></div>
                                                        <div class="tinvwl-tooltip">Add to Wishlist</div>
                                                    </div>
                                                    <button class="woosc-btn woosc-btn-424 " data-id="424"
                                                        data-product_name="Angie&#039;s Boomchickapop Sweet &amp; Salty Kettle Corn"
                                                        data-product_image="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image-60-150x150.jpg">Compare</button>
                                                </div>
                                                <div class="product-checklist">
                                                    <ul>
                                                        <li>Type: {{ $product->type }}</li>
                                                        <li>MFG: {{ $product->mfg }}</li>
                                                        <li>LIFE: {{ $product->life }} days</li>
                                                    </ul>
                                                </div>
                                                <div class="product_meta product-meta bottom">



                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">BE4CURT</span></span>


                                                    <span class="posted_in">Category: <a
                                                            href="https://klbtheme.com/bacola/product-category/biscuits-snacks/"
                                                            rel="tag">{{ $product->category[0]->title }}</a></span>


                                                </div>
                                                <div class="product-share">
                                                    <div class="social-share site-social style-1">
                                                        <ul class="social-container">
                                                            <li><a href="#" class="facebook"><i
                                                                        class="klbth-icon-facebook"></i></a></li>
                                                            <li><a href="#" class="twitter"><i
                                                                        class="klbth-icon-twitter"></i></a></li>
                                                            <li><a href="#" class="pinterest"><i
                                                                        class="klbth-icon-pinterest"></i></a></li>
                                                            <li><a href="#" class="linkedin"><i
                                                                        class="klbth-icon-linkedin"></i></a></li>
                                                            <li><a href="#" class="reddit"><i
                                                                        class="klbth-icon-reddit"></i></a></li>
                                                            <li><a href="#" class="whatsapp"><i
                                                                        class="klbth-icon-whatsapp"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="column product-icons">
                                                <div class="alert-message">Covid-19 Info: We keep delivering.</div>
                                                <div class="icon-messages">
                                                    <ul>
                                                        <li>
                                                            <div class="icon"><i
                                                                    class="klbth-icon-delivery-truck-2"></i></div>
                                                            <div class="message">Free Shipping apply to all orders over
                                                                $100</div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i class="klbth-icon-milk-box"></i></div>
                                                            <div class="message">Guranteed 100% Organic from natural
                                                                farmas</div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i class="klbth-icon-dollar"></i></div>
                                                            <div class="message">1 Day Returns if you change your mind
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="woocommerce-tabs wc-tabs-wrapper">
                                <ul class="tabs wc-tabs" role="tablist">
                                    <li class="description_tab" id="tab-title-description" role="tab"
                                        aria-controls="tab-description">
                                        <a href="#tab-description">
                                            Description </a>
                                    </li>
                                    <li class="additional_information_tab" id="tab-title-additional_information"
                                        role="tab" aria-controls="tab-additional_information">
                                        <a href="#tab-additional_information">
                                            Additional information </a>
                                    </li>
                                    <li class="reviews_tab" id="tab-title-reviews" role="tab"
                                        aria-controls="tab-reviews">
                                        <a href="#tab-reviews">
                                            Reviews (1) </a>
                                    </li>
                                </ul>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                                    id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">

                                    <h2>Description</h2>

                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab"
                                    id="tab-additional_information" role="tabpanel"
                                    aria-labelledby="tab-title-additional_information">

                                    <h2>Additional information</h2>

                                    <table class="woocommerce-product-attributes shop_attributes">
                                        <tr
                                            class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brands">
                                            <th class="woocommerce-product-attributes-item__label">Brands</th>
                                            <td class="woocommerce-product-attributes-item__value">
                                                <p>Frito Lay, Oreo, Welch&#039;s</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab"
                                    id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                                    <div id="reviews" class="woocommerce-Reviews">
                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">
                                                1 review for <span>Angie&#8217;s Boomchickapop Sweet &#038; Salty Kettle
                                                    Corn</span> </h2>

                                            <ol class="commentlist">
                                                <li class="review byuser comment-author-bacola bypostauthor even thread-even depth-1"
                                                    id="li-comment-65">

                                                    <div id="comment-65" class="comment_container">

                                                        <img alt=''
                                                            src='https://secure.gravatar.com/avatar/3384f98a21c5dce2051e8f5a20928b05?s=60&#038;d=mm&#038;r=g'
                                                            srcset='https://secure.gravatar.com/avatar/3384f98a21c5dce2051e8f5a20928b05?s=120&#038;d=mm&#038;r=g 2x'
                                                            class='avatar avatar-60 photo' height='60' width='60'
                                                            loading='lazy' decoding='async' />
                                                        <div class="comment-text">

                                                            <div class="star-rating" role="img"
                                                                aria-label="Rated 4 out of 5"><span
                                                                    style="width:80%">Rated <strong
                                                                        class="rating">4</strong> out of 5</span></div>
                                                            <p class="meta">
                                                                <strong class="woocommerce-review__author">admin
                                                                </strong>
                                                                <span class="woocommerce-review__dash">&ndash;</span>
                                                                <time class="woocommerce-review__published-date"
                                                                    datetime="2021-05-01T10:09:28+00:00">May 1,
                                                                    2021</time>
                                                            </p>

                                                            <div class="description">
                                                                <p>Sed perspiciatis unde omnis iste natus error sit
                                                                    voluptatem accusantium doloremque laudantium.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li><!-- #comment-## -->
                                            </ol>

                                        </div>

                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <span id="reply-title" class="comment-reply-title">Add a review
                                                        <small><a rel="nofollow" id="cancel-comment-reply-link"
                                                                href="/bacola/product/angies-boomchickapop-sweet-salty-kettle-corn/#respond"
                                                                style="display:none;">Cancel reply</a></small></span>
                                                    <form action="https://klbtheme.com/bacola/wp-comments-post.php"
                                                        method="post" id="commentform" class="comment-form">
                                                        <div class="comment-form-rating"><label for="rating">Your
                                                                rating&nbsp;<span class="required">*</span></label><select
                                                                name="rating" id="rating" required>
                                                                <option value="">Rate&hellip;</option>
                                                                <option value="5">Perfect</option>
                                                                <option value="4">Good</option>
                                                                <option value="3">Average</option>
                                                                <option value="2">Not that bad</option>
                                                                <option value="1">Very poor</option>
                                                            </select></div>
                                                        <p class="comment-form-comment"><label for="comment">Your
                                                                review&nbsp;<span class="required">*</span></label>
                                                            <textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
                                                        </p>
                                                        <p class="form-submit"><input name="submit" type="submit"
                                                                id="submit" class="submit" value="Submit" /> <input
                                                                type='hidden' name='comment_post_ID' value='424'
                                                                id='comment_post_ID' />
                                                            <input type='hidden' name='comment_parent'
                                                                id='comment_parent' value='0' />
                                                        </p>
                                                    </form>
                                                </div><!-- #respond -->
                                            </div>
                                        </div>

                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>


                            <section class="klb-module related products" id="related-products">

                                <div class="klb-title module-header">
                                    <h4 class="entry-title">Related products</h4>
                                </div>


                                <div class="products column-4 mobile-column-2 align-inherit">
                                    @foreach ($related_products as $item)
                                        <div
                                            class="product type-product post-270 status-publish first instock product_cat-biscuits-snacks has-post-thumbnail shipping-taxable purchasable product-type-simple">

                                            <div class="product-wrapper product-type-1">
                                                <div class="thumbnail-wrapper"><a
                                                        href="https://klbtheme.com/bacola/product/rold-gold-tiny-twists-pretzels/"><img
                                                            src="{{ $item->product->img_url }}"
                                                            alt="Rold Gold Tiny Twists Pretzels"></a>
                                                    <div class="product-buttons"><a href="270"
                                                            class="detail-bnt quick-view-button"><svg
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path
                                                                    d="M128 32V0H16C7.163 0 0 7.163 0 16v112h32V54.56L180.64 203.2l22.56-22.56L54.56 32H128zM496 0H384v32h73.44L308.8 180.64l22.56 22.56L480 54.56V128h32V16c0-8.837-7.163-16-16-16zM480 457.44L331.36 308.8l-22.56 22.56L457.44 480H384v32h112c8.837 0 16-7.163 16-16V384h-32v73.44zM180.64 308.64L32 457.44V384H0v112c0 8.837 7.163 16 16 16h112v-32H54.56L203.2 331.36l-22.56-22.72z" />
                                                            </svg></a>
                                                        <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart tinvwl-woocommerce_before_shop_loop_item"
                                                            data-tinvwl_product_id="270">
                                                            <div class="tinv-wishlist-clear"></div><a role="button"
                                                                tabindex="0" name="add-to-wishlist"
                                                                aria-label="Add to Wishlist"
                                                                class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-shortcode"
                                                                data-tinv-wl-list="[]" data-tinv-wl-product="270"
                                                                data-tinv-wl-productvariation="0"
                                                                data-tinv-wl-productvariations="[]"
                                                                data-tinv-wl-producttype="simple"
                                                                data-tinv-wl-action="add"><span
                                                                    class="tinvwl_add_to_wishlist-text">Add to
                                                                    Wishlist</span></a>
                                                            <div class="tinv-wishlist-clear"></div>
                                                            <div class="tinvwl-tooltip">Add to Wishlist</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-wrapper">
                                                    <h3 class="product-title">
                                                        <a href="https://klbtheme.com/bacola/product/rold-gold-tiny-twists-pretzels/"
                                                            title="Rold Gold Tiny Twists Pretzels">{{ $item->product->title }}</a>
                                                    </h3>
                                                    <div class="product-meta">
                                                        <div class="product-available in-stock">In Stock</div>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div class="star-rating" role="img"
                                                            aria-label="Rated 4.00 out of 5"><span style="width:80%">Rated
                                                                <strong class="rating">4.00</strong> out of 5</span></div>
                                                        <div class="count-rating">1 <span
                                                                class="rating-text">Ratings</span>
                                                        </div>
                                                    </div><span class="price"><span
                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol">
                                                                </span>{{ $item->product->format_price }}</bdi></span></span>
                                                    <div class="product-fade-block">
                                                        <div class="product-button-group cart-with-quantity ">
                                                            <div class="quantity ajax-quantity">
                                                                <div class="quantity-button minus"><i
                                                                        class="klbth-icon-minus"></i></div><input
                                                                    type="text" class="input-text qty text"
                                                                    name="quantity" step="1" min="0"
                                                                    max="" value="1" title="Menge"
                                                                    size="4" inputmode="numeric">
                                                                <div class="quantity-button plus"><i
                                                                        class="klbth-icon-plus"></i></div>
                                                            </div><!-- quantity --><a href="?add-to-cart=270"
                                                                data-quantity="1"
                                                                class="button-primary xsmall rounded wide button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                data-product_id="270" data-product_sku="95UTHM"
                                                                aria-label="Add &ldquo;Rold Gold Tiny Twists Pretzels&rdquo; to your cart"
                                                                rel="nofollow">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content-fade border-info"></div><button
                                                class="woosc-btn woosc-btn-270 " data-id="270"
                                                data-product_name="Rold Gold Tiny Twists Pretzels"
                                                data-product_image="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image-18-150x150.jpg">Compare</button>
                                            <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-after-add-to-cart tinvwl-loop-button-wrapper tinvwl-woocommerce_after_shop_loop_item"
                                                data-tinvwl_product_id="270">
                                                <div class="tinv-wishlist-clear"></div><a role="button" tabindex="0"
                                                    name="add-to-wishlist" aria-label="Add to Wishlist"
                                                    class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-after tinvwl-loop"
                                                    data-tinv-wl-list="[]" data-tinv-wl-product="270"
                                                    data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[]"
                                                    data-tinv-wl-producttype="simple" data-tinv-wl-action="add"><span
                                                        class="tinvwl_add_to_wishlist-text">Add to Wishlist</span></a>
                                                <div class="tinv-wishlist-clear"></div>
                                                <div class="tinvwl-tooltip">Add to Wishlist</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </section>


                            <div class="single-sticky-titles">
                                <div class="container"></div>
                            </div>


                        </div>
                    </div>
                </div>

                <section class="klb-module site-module recently-viewed">
                    <div class="container">
                        <div class="klb-title module-header">
                            <h4 class="entry-title">Recently Viewed Products</h4>
                        </div>
                        <div class="products column-4 mobile-column-2 align-inherit">
                            @foreach ($randomProducts as $item)
                                <div
                                    class="product type-product post-424 status-publish first instock product_cat-biscuits-snacks has-post-thumbnail sale shipping-taxable purchasable product-type-simple">

                                    <div class="product-wrapper product-type-1">
                                        <div class="thumbnail-wrapper">
                                            <div class="product-badges"><span
                                                    class="badge  onsale">{{ $item->discount }}%</span></div><a
                                                href="https://klbtheme.com/bacola/product/angies-boomchickapop-sweet-salty-kettle-corn/"><img
                                                    src="{{ $item->img_url }}" alt="{{ $item->title }}"></a>
                                            <div class="product-buttons"><a href="424"
                                                    class="detail-bnt quick-view-button"><svg
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M128 32V0H16C7.163 0 0 7.163 0 16v112h32V54.56L180.64 203.2l22.56-22.56L54.56 32H128zM496 0H384v32h73.44L308.8 180.64l22.56 22.56L480 54.56V128h32V16c0-8.837-7.163-16-16-16zM480 457.44L331.36 308.8l-22.56 22.56L457.44 480H384v32h112c8.837 0 16-7.163 16-16V384h-32v73.44zM180.64 308.64L32 457.44V384H0v112c0 8.837 7.163 16 16 16h112v-32H54.56L203.2 331.36l-22.56-22.72z" />
                                                    </svg></a>
                                                <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart tinvwl-woocommerce_before_shop_loop_item"
                                                    data-tinvwl_product_id="424">
                                                    <div class="tinv-wishlist-clear"></div><a role="button"
                                                        tabindex="0" name="add-to-wishlist"
                                                        aria-label="Add to Wishlist"
                                                        class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-shortcode"
                                                        data-tinv-wl-list="[]" data-tinv-wl-product="424"
                                                        data-tinv-wl-productvariation="0"
                                                        data-tinv-wl-productvariations="[]"
                                                        data-tinv-wl-producttype="simple" data-tinv-wl-action="add"><span
                                                            class="tinvwl_add_to_wishlist-text">Add to Wishlist</span></a>
                                                    <div class="tinv-wishlist-clear"></div>
                                                    <div class="tinvwl-tooltip">Add to Wishlist</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-wrapper">
                                            <h3 class="product-title"><a
                                                    href="https://klbtheme.com/bacola/product/angies-boomchickapop-sweet-salty-kettle-corn/"
                                                    title="{{ $item->title }}">{{ $item->title }}</a></h3>
                                            <div class="product-meta">
                                                <div class="product-available in-stock">In Stock</div>
                                            </div>
                                            <div class="product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                                    <span style="width:80%">Rated <strong class="rating">4.00</strong> out
                                                        of
                                                        5</span>
                                                </div>
                                                <div class="count-rating">1 <span class="rating-text">Ratings</span></div>
                                            </div><span class="price"><del aria-hidden="true"><span
                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                class="woocommerce-Price-currencySymbol"></span>{{ $item->format_old_price }}</bdi></span></del>
                                                <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                                class="woocommerce-Price-currencySymbol"></span>{{ $item->format_price }}</bdi></span></ins></span>
                                            <div class="product-fade-block">
                                                <div class="product-button-group cart-with-quantity ">
                                                    <div class="quantity ajax-quantity">
                                                        <div class="quantity-button minus"><i
                                                                class="klbth-icon-minus"></i>
                                                        </div><input type="text" class="input-text qty text"
                                                            name="quantity" step="1" min="0" max=""
                                                            value="1" title="Menge" size="4"
                                                            inputmode="numeric">
                                                        <div class="quantity-button plus"><i class="klbth-icon-plus"></i>
                                                        </div>
                                                    </div><!-- quantity --><a href="?add-to-cart=424" data-quantity="1"
                                                        class="button-primary xsmall rounded wide button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="424" data-product_sku="BE4CURT"
                                                        aria-label="Add &ldquo;Angie&#039;s Boomchickapop Sweet &amp; Salty Kettle Corn&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content-fade border-info"></div><button
                                        class="woosc-btn woosc-btn-424 " data-id="424"
                                        data-product_name="Angie&#039;s Boomchickapop Sweet &amp; Salty Kettle Corn"
                                        data-product_image="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image-60-150x150.jpg">Compare</button>
                                    <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-after-add-to-cart tinvwl-loop-button-wrapper tinvwl-woocommerce_after_shop_loop_item"
                                        data-tinvwl_product_id="424">
                                        <div class="tinv-wishlist-clear"></div><a role="button" tabindex="0"
                                            name="add-to-wishlist" aria-label="Add to Wishlist"
                                            class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-after tinvwl-loop"
                                            data-tinv-wl-list="[]" data-tinv-wl-product="424"
                                            data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[]"
                                            data-tinv-wl-producttype="simple" data-tinv-wl-action="add"><span
                                                class="tinvwl_add_to_wishlist-text">Add to Wishlist</span></a>
                                        <div class="tinv-wishlist-clear"></div>
                                        <div class="tinvwl-tooltip">Add to Wishlist</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>
            </div><!-- homepage-content -->
        </div><!-- site-content -->
    </main><!-- site-primary -->
@endsection
