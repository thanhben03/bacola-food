@extends('layouts.client.master')
@push('css')
    <link rel="stylesheet" href="/assets/css/692f6204f34633a6f38ed8a80489dcb2.css">
@endpush
@section('content')
    <input type="text" hidden value="{{ $category }}" id="current-category">
    <input type="text" hidden value="{{ $subcategory }}" id="current-subcategory">
    <div class="loading">
        <img src="/assets/img/loading.gif" alt="">
    </div>
    <main id="main" class="site-primary">
        <div class="site-content">
            <div class="homepage-content">
                <div class="container">

                    <nav class="woocommerce-breadcrumb">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Shop</li>
                        </ul>
                    </nav>


                    <div class="row content-wrapper sidebar-left">
                        <div class="col-12 col-md-12 col-lg-9 content-primary">

                            <div class="shop-banner">
                                <div class="module-banner image align-center align-middle">
                                    <div class="module-body">
                                        <div class="banner-wrapper">
                                            <div class="banner-content">
                                                <div class="content-main">
                                                    <h4 class="entry-subtitle color-text xlight">Organic Meals Prepared</h4>
                                                    <h3 class="entry-title color-text large">Delivered to <strong
                                                            class="color-success">your Home</strong></h3>
                                                    <div class="entry-text color-info-dark">Fully prepared &amp; delivered
                                                        nationwide.</div>
                                                </div>
                                            </div>
                                            <div class="banner-thumbnail">
                                                <img src="https://klbtheme.com/bacola/wp-content/uploads/2021/08/bacola-banner-18.jpg"
                                                    alt="Organic Meals Prepared">
                                            </div>
                                            <a href="" class="overlay-link"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="before-shop-loop">
                                <div class="shop-view-selector">

                                    <a href="/bacola/shop/?orderby=popularity&amp;shop_view=list_view" class="shop-view">
                                        <i class="klbth-icon-list-grid"></i>
                                    </a>
                                    <a href="/bacola/shop/?orderby=popularity&amp;column=2&amp;shop_view=grid_view"
                                        class="shop-view">
                                        <i class="klbth-icon-2-grid"></i>
                                    </a>
                                    <a href="/bacola/shop/?orderby=popularity&amp;column=3&amp;shop_view=grid_view"
                                        class="shop-view">
                                        <i class="klbth-icon-3-grid"></i>
                                    </a>
                                    <a href="/bacola/shop/?orderby=popularity&amp;column=4&amp;shop_view=grid_view"
                                        class="shop-view active">
                                        <i class="klbth-icon-4-grid"></i>
                                    </a>

                                </div>

                                <div class="mobile-filter">
                                    <a href="#" class="filter-toggle">
                                        <i class="klbth-icon-filter"></i>
                                        <span>Filter Products</span>
                                    </a>
                                </div>

                                <!-- For get orderby from loop -->
                                <div class="d-flex">
                                    <span class="orderby-label hide-desktop">Sort by</span>
                                    <select name="orderby" class="form-select-orderby">
                                        <option value="default">Select sort</option>
                                        {{-- <option value="popularity" data-select2-id="3">Sort by
                                            popularity</option>
                                        <option value="rating">Sort by average rating</option> --}}
                                        <option selected value="date">Sort by latest</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                    {{-- <input type="hidden" name="paged" value="1"> --}}
                                </div>


                                <!-- For perpage option-->
                                <form class="products-per-page product-filter" method="get">
                                    <span class="perpage-label">Show: </span>
                                    <select name="show" class="perpage filterSelect " data-class="select-filter-perpage"
                                        data-select2-id="4" tabindex="-1">
                                        {{-- <option selected value="#">Show: </option> --}}
                                        <option id="show-6" value="6">6</option>
                                        <option id="show-12" value="12">12</option>
                                        <option id="show-24" value="24">24</option>
                                        <option id="show-48" value="48">48</option>
                                    </select>
                                </form>
                            </div>
                            <ul class="remove-filter">

                            </ul>


                            <div class="wrap-products products column-4 mobile-column-2 align-inherit">

                                @foreach ($products as $product)
                                    <div
                                        class="product type-product post-430 status-publish first instock product_cat-meats-seafood product_tag-chicken product_tag-natural product_tag-organic has-post-thumbnail sale shipping-taxable purchasable product-type-simple">

                                        <div class="product-wrapper product-type-1">
                                            <div class="thumbnail-wrapper">
                                                <div class="product-badges"><span
                                                        class="badge style-1 onsale">23%</span><span class="badge style-1"
                                                        style="background-color: #71778e;">recommended</span></div><a
                                                    href="{{ route('product.view', $product->slug) }}"><img
                                                        src="{{ $product->img_url }}"
                                                        alt="All Natural Italian-Style Chicken Meatballs"></a>
                                                <div class="product-buttons"><a href="430"
                                                        class="detail-bnt quick-view-button"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M128 32V0H16C7.163 0 0 7.163 0 16v112h32V54.56L180.64 203.2l22.56-22.56L54.56 32H128zM496 0H384v32h73.44L308.8 180.64l22.56 22.56L480 54.56V128h32V16c0-8.837-7.163-16-16-16zM480 457.44L331.36 308.8l-22.56 22.56L457.44 480H384v32h112c8.837 0 16-7.163 16-16V384h-32v73.44zM180.64 308.64L32 457.44V384H0v112c0 8.837 7.163 16 16 16h112v-32H54.56L203.2 331.36l-22.56-22.72z">
                                                            </path>
                                                        </svg></a>
                                                    <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart tinvwl-woocommerce_before_shop_loop_item"
                                                        data-tinvwl_product_id="430">
                                                        <div class="tinv-wishlist-clear"></div><a role="button"
                                                            tabindex="0" name="add-to-wishlist"
                                                            aria-label="Add to Wishlist"
                                                            class="tinvwl_add_to_wishlist_button tinvwl-icon-heart tinvwl-position-shortcode"><span
                                                                class="tinvwl_add_to_wishlist-text">Add to
                                                                Wishlist</span></a>
                                                        <div class="tinv-wishlist-clear"></div>
                                                        <div class="tinvwl-tooltip">Add to Wishlist</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content-wrapper">
                                                <h3 class="product-title"><a
                                                        href="{{ route('product.view', $product->slug) }}"
                                                        title="All Natural Italian-Style Chicken Meatballs">{{ $product->title }}</a>
                                                </h3>
                                                <div class="product-meta">
                                                    <div class="product-available in-stock">In Stock</div>
                                                </div>
                                                <div class="product-rating">
                                                    <div class="star-rating" role="img"
                                                        aria-label="Rated 4.00 out of 5">
                                                        <span style="width:80%">Rated <strong class="rating">4.00</strong>
                                                            out
                                                            of 5</span>
                                                    </div>
                                                    <div class="count-rating">1 <span class="rating-text">Ratings</span>
                                                    </div>
                                                </div><span class="price"><del aria-hidden="true"><span
                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol"></span>{{ $product->format_old_price }}</bdi></span></del>
                                                    <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol"></span>{{ $product->format_price }}</bdi></span></ins></span>
                                                <div class="product-fade-block">
                                                    @if ($cart_session == null || !array_key_exists($product['id'], session()->get('cart')->products))
                                                        <div class="product-button-group cart-with-quantity ">
                                                            <div class="quantity ajax-quantity">
                                                                <div class="quantity-button minus"><i
                                                                        class="klbth-icon-minus"></i>
                                                                </div>
                                                                <input type="text" class="input-text qty text"
                                                                    name="quantity" step="1" min="0"
                                                                    max="" data-product_id="{{ $product['id'] }}"
                                                                    value="1" title="Menge" size="4"
                                                                    inputmode="numeric">
                                                                <div class="quantity-button plus"><i
                                                                        class="klbth-icon-plus"></i>
                                                                </div>
                                                            </div><!-- quantity -->
                                                            <p data-quantity="1"
                                                                class="button-primary xsmall rounded wide button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                data-product_id="{{ $product['id'] }}"
                                                                aria-label="Add &ldquo;Angie&#039;s Boomchickapop Sweet &amp; Salty Kettle Corn&rdquo; to your cart"
                                                                rel="nofollow">Add to cart
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="product-button-group cart-with-quantity product-in-cart">
                                                            <div class="quantity ajax-quantity">
                                                                <div class="quantity-button minus"><i
                                                                        class="klbth-icon-minus"></i>
                                                                </div>
                                                                <input type="text" class="input-text qty text"
                                                                    name="quantity" step="1" min="0"
                                                                    max="" data-product_id="{{ $product['id'] }}"
                                                                    value="{{ $cart_session->products[$product['id']]['qty'] }}"
                                                                    title="Menge" size="4" inputmode="numeric">
                                                                <div class="quantity-button plus"><i
                                                                        class="klbth-icon-plus"></i>
                                                                </div>
                                                            </div><!-- quantity -->

                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content-fade border-info" style="margin-bottom: -49px;"></div>
                                        <button class="woosc-btn woosc-btn-430 " data-id="430"
                                            data-product_name="All Natural Italian-Style Chicken Meatballs"
                                            data-product_image="https://klbtheme.com/bacola/wp-content/uploads/2021/04/product-image-62-150x150.jpg">Compare</button>
                                        <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-after-add-to-cart tinvwl-loop-button-wrapper tinvwl-woocommerce_after_shop_loop_item"
                                            data-tinvwl_product_id="430">
                                            <div class="tinv-wishlist-clear"></div><a role="button" tabindex="0"
                                                name="add-to-wishlist" aria-label="Add to Wishlist"
                                                class="tinvwl_add_to_wishlist_button tinvwl-icon-heart tinvwl-position-after tinvwl-loop"><span
                                                    class="tinvwl_add_to_wishlist-text">Add to Wishlist</span></a>
                                            <div class="tinv-wishlist-clear"></div>
                                            <div class="tinvwl-tooltip">Add to Wishlist</div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <nav class="woocommerce-pagination">
                                {{ $products->links() }}


                            </nav>

                        </div>
                        <div id="sidebar" class="col-12 col-md-3 col-lg-3 content-secondary site-sidebar">
                            <div class="site-scroll ps">
                                <div class="sidebar-inner">

                                    <div class="sidebar-mobile-header">
                                        <h3 class="entry-title">Filter Products</h3>

                                        <div class="close-sidebar">
                                            <i class="klbth-icon-x"></i>
                                        </div>
                                    </div>

                                    <div class="widget widget_klb_product_categories">
                                        <h4 class="widget-title">Product Categories</h4>
                                        <div class="widget-body site-checkbox-lists ">
                                            <div class="site-scroll ps">
                                                <ul>
                                                    @foreach ($categories as $category)
                                                        <li>

                                                            <a class=""
                                                                href="{{ route('product.category', $category->slug) }}"
                                                                aria-expanded="false" style="font-size: 13px"
                                                                aria-controls="item-children{{ $category->id }}">
                                                                {{ $category->title }}
                                                            </a>
                                                            @if (count($category->subcategory) >= 1)
                                                                <span class="subDropdown plus" data-toggle="collapse"
                                                                    href="#item-children{{ $category->id }}"
                                                                    role="button" aria-expanded="false"
                                                                    aria-controls="item-children{{ $category->id }}"></span>
                                                                <div style="width: 100%" class="collapse multi-collapse"
                                                                    id="item-children{{ $category->id }}">
                                                                    {{-- <div class="card card-body"> --}}
                                                                    <ul class="children"
                                                                        style="display: block; margin-left:  0">
                                                                        @foreach ($category->subcategory as $subcategory)
                                                                            <li><a href="{{ route('product.category', [$category->slug, $subcategory->slug]) }}"><input
                                                                                        name="product_cat[]"
                                                                                        value="45" id="Coffee"
                                                                                        type="checkbox"><label
                                                                                        style="font-size: 11px">
                                                                                        <span></span>{{ $subcategory->title }}</label>
                                                                                </a>
                                                                            </li>
                                                                        @endforeach

                                                                    </ul>
                                                                    {{-- </div> --}}

                                                                </div>
                                                            @endif

                                                        </li>
                                                    @endforeach
                                                </ul>




                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget woocommerce widget_price_filter">
                                        <h4 class="widget-title">Filter by price</h4>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="formControlRange">Choose Price</label>
                                                <input type="range" min="0" max="{{ $maxPrice }}"
                                                    value="{{ $priceSelect }}" class="form-control-range range-slider"
                                                    style="width: 180%;" step="{{ $step }}" id="myRange">
                                            </div>
                                            <div class="col-md-6 " style="font-size: 13px; height: 20px;">
                                                <span id="demo">0</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
                                        <h4 class="widget-title">Brands</h4>
                                        <ul class="woocommerce-widget-layered-nav-list">
                                            @foreach ($brands as $brand)
                                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                                                    <div class="type-button"><span class="button-box"></span>
                                                        <a rel="nofollow" href="?brand={{ $brand['brand'] }}"
                                                            class="filter-brand">{{ $brand['brand'] }}</a>
                                                        <input type="text" value="{{ $brand['brand'] }}"
                                                            name="" hidden id="">
                                                        <span class="count">({{ $brand['count'] }})</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="widget widget_media_image"><img width="1280" height="1750"
                                            src="https://klbtheme.com/bacola/wp-content/uploads/2021/05/sidebar-banner.gif"
                                            class="image wp-image-1184  attachment-full size-full" alt=""
                                            decoding="async" loading="lazy" style="max-width: 100%; height: auto;">
                                    </div>
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
    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
            output.innerHTML = this.value;
        }

        // filter by price
    </script>
    <script>
        (function($) {

            let url = window.location.href;
            let urlObj = new URL(window.location.href); //Tao url object de lay valua cua params query
            const partsUrl = url.split('?'); //tach domain va query string

            // tach tung param cua query string dua vao mang
            const arrParamsUrl = partsUrl.length > 1 ? [partsUrl[0], ...partsUrl[1].split('&')] : null;

            $(document).ready(function() {
                handleFilterByBrand();
                handleOrderBy();
                handleCheckBoxBrand();
                handlePageLink();
                // resetShowSelectLocalStorage();
                // console.log($(".page-link"));
            });


            // Filter by price
            $(".form-control-range.range-slider").mouseup(function() {

                let clicked = $(this);
                $(".loading").css('display', 'block')

                if (arrParamsUrl == null) {
                    setTimeout(() => {
                        // let url = handleUrlFilter(clicked.next(), 'brand');
                        window.location.href += `?maxprice=${clicked.val()}`;
                        console.log(url);
                    }, 1000);
                    return;
                }
                handleFilterByShowAndPrice('maxprice', clicked.val());
            });

            // Filter by show
            $(".perpage.filterSelect ").change(function() {

                let clicked = $(this);
                $(".loading").css('display', 'block')

                if (arrParamsUrl == null) {
                    console.log(clicked.val());
                    setTimeout(() => {
                        window.location.href += `?show=${clicked.val()}`;
                    }, 1000);
                    return;
                }

                handleFilterByShowAndPrice('show', clicked.val());


            });

            $(document).on('click', '.filter-brand', function(e) {
                e.preventDefault();
                let clicked = $(this);
                $(".loading").css('display', 'block')

                setTimeout(() => {
                    // let url = handleUrlFilter(clicked.next(), 'brand');
                    window.location.href = clicked.attr('href');
                    // console.log(url);
                }, 1000);
            })

            function handleClearAllFilter() {
                let category = $("#current-category").val();
                let subcategory = $("#current-subcategory").val();
                if (subcategory) {
                    $(".remove-filter").append(`<li><a href="./${subcategory}"
                class="remove-filter-element clear-all">Clear filters</a></li>`);
                } else {
                    $(".remove-filter").append(`<li><a href="./${category}"
                class="remove-filter-element clear-all">Clear filters</a></li>`);
                }

            }

            function handleOrderBy() {
                $(".form-select-orderby").change(function(e) {
                    console.log($(this).val());
                    let clicked = $(this);
                    $(".loading").css('display', 'block')
                    let temp_arrParamsUrl = arrParamsUrl != null ? [...arrParamsUrl] : null;
                    if (temp_arrParamsUrl == null) {
                        setTimeout(() => {
                            // let url = handleUrlFilter(clicked.next(), 'brand');
                            window.location.href += `?orderby=${clicked.val()}`;
                            // console.log(url);
                        }, 1000);
                        return;
                    }


                    let posOrderBy = temp_arrParamsUrl.findIndex(item => item.indexOf('orderby') !== -1);

                    // push param maxprice khi url chua co param nay
                    if (posOrderBy == -1) {
                        temp_arrParamsUrl.push('orderby=' + clicked.val());
                    }

                    // chinh sua maxprice bang gia tri vua tim duoc
                    temp_arrParamsUrl[posOrderBy] = 'orderby=' + clicked.val();

                    // Tao url moi
                    let url = `${temp_arrParamsUrl[0]}?${temp_arrParamsUrl.slice(1).filter(Boolean).join('&')}`;
                    setTimeout(() => {
                        console.log(partsUrl);
                        window.location.href = url;
                    }, 1000);
                });
            }

            function handleFilterByBrand() {
                if (partsUrl.length > 1) {
                    handleClearAllFilter();
                    $.each($(".filter-brand"), function(index, ele) {
                        if (urlObj.searchParams.get('brand') != null) {
                            let arrParam = urlObj.searchParams.get('brand').split(',');
                            let position = arrParam.indexOf(ele.innerText);
                            let tempArr = [...arrParamsUrl];
                            // const indexOfTempArr = arrParamsUrl.findIndex(item => item.indexOf('brand') !== -1)
                            const indexOfTempArr = findPosTypeInArr(arrParamsUrl, 'brand');

                            if (position != -1) {
                                arrParam.splice(position, 1);
                                tempArr[indexOfTempArr] = (arrParam.length >= 1 ? 'brand=' : '') + arrParam
                                    .join(
                                        ',');
                                let newUrl = tempArr[0] + '?' + tempArr.slice(1).filter(Boolean).join('&');
                                ele.setAttribute('href', newUrl);

                            } else {
                                // tim vị trí của chuỗi brand để cộng thêm value mới vào
                                const index = arrParamsUrl.findIndex(item => item.indexOf('brand') !== -1)
                                tempArr[index] += `,${ele.innerText}`;

                                let newUrl = `${tempArr[0]}?${tempArr.slice(1).filter(Boolean).join('&')}`;
                                ele.setAttribute('href', newUrl);
                            }
                        } else {

                            let newUrl = arrParamsUrl[0] + '?' + arrParamsUrl.slice(1).filter(Boolean).join(
                                    '&') +
                                `&brand=${ele.innerText}`;
                            ele.setAttribute('href', newUrl);

                        }
                    });



                }
            }

            function findPosTypeInArr(arrParamsUrl, type) {
                if (arrParamsUrl == null) return -1;
                let pos = arrParamsUrl.findIndex(item => item.indexOf(type) !== -1);
                return pos;
            }

            function handleCheckBoxBrand() {
                if (arrParamsUrl == null) {
                    return;
                }
                let posBrand = findPosTypeInArr(arrParamsUrl, 'brand');
                if (posBrand == -1) {
                    return;
                }
                let arrBrand = arrParamsUrl[posBrand].substring(6).split(',');

                $.each($(".filter-brand"), function(index, brandElement) {
                    console.log(brandElement);
                    if (arrBrand.includes(brandElement.innerText)) {
                        $(this).prev().css('backgroundColor', '#233a95');
                        $(this).prev().addClass('chosen');
                    }
                });

            }

            function handlePageLink() {
                // let currentLink = clicked.attr('href').split('?')[1].split('=')[1];
                if (arrParamsUrl != null && arrParamsUrl.length > 1) {
                    let posPageLink = findPosTypeInArr(arrParamsUrl, 'page');
                    let temp_arrParamsUrl = [...arrParamsUrl];

                    $.each($(".page-link"), function(index, ele) {
                        let clicked = $(this);
                        let exists_href = clicked.attr('href');
                        let temp_arrParamsUrl = [...arrParamsUrl];
                        let isPageNumber = clicked.text() >= 1;

                        if (exists_href && isPageNumber) {
                            if (posPageLink != -1) {
                                temp_arrParamsUrl[posPageLink] = 'page=' + clicked.text();
                            } else {
                                temp_arrParamsUrl.push('page=' + clicked.text());
                            }
                            let newUrl =
                                `${temp_arrParamsUrl[0]}?${temp_arrParamsUrl.slice(1).filter(Boolean).join('&')}`;
                            // console.log(newUrl);

                            clicked.attr('href', newUrl);
                        }
                    });

                    handleNextAndPrevLinkButton(posPageLink);

                }

                function createUrlFilter(arrParams) {
                    let newUrl = `${arrParams[0]}?${arrParams.slice(1).filter(Boolean).join('&')}`;
                    return newUrl;
                }

                function handleNextAndPrevLinkButton(posPageLink) {
                    let temp_arrParamsUrl = [...arrParamsUrl];
                    let currentPage = Number($(".page-item.active").text());
                    let nextPage = currentPage + 1;
                    let prevPage = currentPage - 1;

                    if (posPageLink != -1) {
                        // Khi da co chuoi ?page= trong query string
                        temp_arrParamsUrl[posPageLink] = 'page=' + nextPage;
                        let newUrl = createUrlFilter(temp_arrParamsUrl);
                        $(".pagination li:last-child a").attr('href', newUrl);

                        temp_arrParamsUrl[posPageLink] = 'page=' + prevPage;
                        newUrl = createUrlFilter(temp_arrParamsUrl);
                        $(".pagination li:first-child a").attr('href', newUrl);


                    } else {

                        // đưa chuỗi ?page= vào cuối mảng
                        temp_arrParamsUrl.push('page=' + nextPage);
                        let newUrl = createUrlFilter(temp_arrParamsUrl);
                        $(".pagination li:last-child a").attr('href', newUrl);

                        temp_arrParamsUrl.push('page=' + prevPage);
                        newUrl = createUrlFilter(temp_arrParamsUrl);
                        $(".pagination li:first-child a").attr('href', newUrl);

                    }



                }
            }

            function handleFilterByShowAndPrice(filterType, value) {
                let temp_arrParamsUrl = arrParamsUrl ? [...arrParamsUrl] : [];

                // tìm vị trí 'maxprice' trong mảng arrParamUrl
                let posShowPage = findPosTypeInArr(temp_arrParamsUrl, filterType);

                // push param maxprice khi url chua co param nay
                if (posShowPage == -1) {
                    temp_arrParamsUrl.push(`${filterType}=` + value);
                }

                // chinh sua maxprice bang gia tri vua tim duoc
                temp_arrParamsUrl[posShowPage] = `${filterType}=` + value;

                // Tao url moi
                let url = `${temp_arrParamsUrl[0]}?${temp_arrParamsUrl.slice(1).filter(Boolean).join('&')}`;

                // lưu giá trị vừa chọn vào localstorage
                window.localStorage.setItem('showSelect', value);
                setTimeout(() => {
                    window.location.href = url;
                }, 1000);
            }

            function handleSelectShow() {
                let currentOptionSelected = $(".perpage.filterSelect option:selected");
                let valueSelected = findValueByUrl('show');
                // let valueSelected = window.localStorage.getItem('showSelect');
                currentOptionSelected.removeAttr("selected");
                $("#show-" + valueSelected).attr('selected', true)

            }

            function resetShowSelectLocalStorage() {
                let firstOptionShow = $(".filterSelect option:first");
                // console.log(arrParamsUrl);
                if (arrParamsUrl == null) {
                    console.log('reset');
                    let currentOptionSelected = $(".perpage.filterSelect option:selected");
                    currentOptionSelected.removeAttr("selected");

                    firstOptionShow.attr('selected', true);
                    window.localStorage.setItem('showSelect', firstOptionShow.val());
                }
            }

            function findValueByUrl(type) {
                let pos = findPosTypeInArr(arrParamsUrl, type);
                let firstOptionShow = $(".filterSelect option:first");
                if (pos == -1) return firstOptionShow.val();
                let newArr = arrParamsUrl[pos].split('=')[1];
                return newArr;
            }
            handleSelectShow();

        })(jQuery.noConflict())
    </script>
@endpush
