// function addToCart(clicked) {
//     // e.preventDefault();
//     let product_id = clicked.getAttribute('data-product_id');
//     axios.get(`/cart/add/${product_id}`)
//         .then((result) => {
//             $(".loader-image").remove();
//             toastr.success(result.data.message, 'success!')
//         }).catch((err) => {
//             console.log(err);
//         });
//     // console.log(product_id);
// }


(function ($) {
    $(document).on('click', '.quantity-button.plus', function (event) {
        // let token = $("input[name='_token']");
        var clicked = $(this);
        console.log(clicked);
        let product_id = clicked.prev().attr('data-product_id');
        $.ajax({
            type: "GET",
            url: "/cart/update/" + product_id + "/add",
            dataType: "json",
            beforeSend: function () {
                clicked.css('pointer-events', 'none');
                clicked.append(
                    '<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>'
                )
            },
            success: function (response) {
                console.log(response);
                updateSubTotal(response.data)
                updateMiniCart(product_id, response.data.currentCart.product_info.price, response.data.currentCart.qty, response.data.subTotalPrice);
                // console.log('testt');
                $(".loader-image").remove();
                clicked.css('pointer-events', 'all')
                toastr.success(response.data.message, 'success!')
                // setTimeout(() => {
                //     window.location.reload();
                // }, 2000);
            },
            error: function (err) {
                toastr.error(err.responseJSON.message, 'error!');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        });
    });

    $(document).on('click', '.quantity-button.minus', function (event) {
        var clicked = $(this);
        let product_id = clicked.next().attr('data-product_id');
        console.log(clicked);
        $.ajax({
            type: "GET",
            url: "/cart/update/" + product_id + "/minus",
            dataType: "json",
            beforeSend: function () {
                clicked.css('pointer-events', 'none');
                clicked.append(
                    '<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>'
                )
            },
            success: function (response) {
                updateSubTotal(response.data)
                toastr.success(response.data.message, 'success!');
                $(".loader-image").remove();
                clicked.css('pointer-events', 'all')
                // $(".progress").css('width', )
                setTimeout(() => {
                    window.location.reload();
                }, 1300);
            },
            error: function (err) {
                toastr.error(err.responseJSON.message, 'error!');
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });
    });

    // handle button remove item incart
    $(document).on('click', '.remove-item', function (event) {
        var clicked = $(this);
        console.log(clicked);
        let product_id = clicked.attr('data-product_id');
        // console.log(clicked.attr('data-product_id')); return;
        handleRemoveItem(product_id, clicked);

    });

    $(document).on('click', '.remove-item-wishlist', function (event) {
        var clicked = $(this);
        console.log(clicked);
        let product_id = clicked.attr('data-product_id');
        // console.log(clicked.attr('data-product_id')); return;
        handleRemoveItemInWishlist(product_id, clicked);

    });

    $(document).on('click', '.tinvwl_add_to_wishlist_button', function (e) {
        e.preventDefault();
        let clicked = $(this);
        let product_id = clicked.attr('data-product_id');

        $.ajax({
            type: "GET",
            url: "/wishlist/add/" + product_id,
            dataType: "json",
            success: function (response) {
                toastr.success(response.message);
            }
        });
    })

    function formatPrice(data) {
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });

        return formatter.format(data);
    }

    // Trang Cart
    function updateSubTotal(data) {
        console.log(data);

        let ft_subtotal_all = formatPrice(data.subTotalPrice); //format subtoal cua all san pham
        let ft_totalPrice_all = formatPrice(data.totalPrice); //format totalprice cua tat ca san pham

        let ft_subtotal_one_product = formatPrice(data.currentCart.price); //format subtoal cua all san pham
        // let ft_totalPrice_one_product = formatter.format(data.totalPrice); //format totalprice cua tat ca san pha

        let subTotalOneProduct = $(`.subtotal-${data.currentCart.product_info.id}`) //subtotal cua tung san pham
        let subTotalAllCart = $('.sub-total-cart');//subtotal cua all san pham
        let totalAllCart = $('.total-price'); //totalprice cua all san pham

        subTotalOneProduct.text(ft_subtotal_one_product);
        subTotalAllCart.text(ft_subtotal_all);
        totalAllCart.text(ft_totalPrice_all);
    }

    function updateMiniCart(idProduct, newPrice, qty, subTotalPrice) {
        console.log(idProduct, newPrice);
        let currentProduct = $(".subTotalPrice-mini-cart-" + idProduct);
        newPrice = formatPrice(newPrice);
        subTotalPrice = formatPrice(subTotalPrice);
        // currentProduct.text(newPrice);

        let html = `
        <span class="quantity">${qty} ×
                <span class="subTotalPrice-mini-cart-7 woocommerce-Price-amount amount">
                    ${newPrice}
                </span>
        </span>
        `
        currentProduct.empty();
        currentProduct.append(html);
        $(".subtotal-mini-cart").text(subTotalPrice)
    }

    // Remove item in cart
    function handleRemoveItem(product_id, clicked) {
        $.ajax({
            type: "GET",
            url: "/cart/remove-item/" + product_id,
            dataType: "json",
            beforeSend: function () {
                clicked.css('pointer-events', 'none');
                clicked.append(
                    '<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>'
                )
            },
            success: function (response) {
                console.log(response);
                $(".loader-image").remove();
                clicked.css('pointer-events', 'all')
                toastr.success(response.message, 'success!')
                setTimeout(() => {
                    window.location.reload();
                }, 1300);
            },
            error: function (err) {
                toastr.error(err.responseJSON.message, 'error!');
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });
    }
    // remove item in wishlist
    function handleRemoveItemInWishlist(product_id, clicked) {
        $.ajax({
            type: "GET",
            url: "/wishlist/delete-one/" + product_id,
            dataType: "json",
            beforeSend: function () {
                clicked.css('pointer-events', 'none');
                clicked.append(
                    '<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>'
                )
            },
            success: function (response) {
                console.log(response);
                $(".loader-image").remove();
                clicked.css('pointer-events', 'all')
                toastr.success(response.message, 'success!')
                setTimeout(() => {
                    window.location.reload();
                }, 1300);
            },
            error: function (err) {
                toastr.error(err.responseJSON.message, 'error!');
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });
    }

    // add cart
    $(document).on('click', '.add_to_cart_button', function () {
        let product_id = this.getAttribute('data-product_id');
        axios.get(`/cart/add/${product_id}`)
            .then((result) => {
                console.log(result);
                handleAddToMiniCart(result.data.data)
                $(".loader-image").remove();
                toastr.success(result.data.message, 'success!')
            }).catch((err) => {
                toastr.error('Vui lòng đăng nhập để sử dụng tính năng !');
                // setTimeout(() => {
                //     window.location.reload();
                // }, 1200);
            });
    })

    // Mini cart
    let countCartElement = $(".cart-count-icon");
    let counCartValue = countCartElement.text();
    function handleAddToMiniCart(product) {

        // $(".fl-mini-cart-content").empty();
        let html = `

                <div class="product woocommerce-mini-cart-item mini_cart_item">
                    <div class="product-wrapper">
                        <div class="thumbnail-wrapper">
                            <a
                                href="https://klbtheme.com/bacola/product/all-natural-italian-style-chicken-meatballs/">
                                <img width="90" height="90"
                                    src="${product.product_info.img_url}"
                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                    alt=""
                                    srcset="${product.product_info.img_url} 90w, ${product.product_info.img_url} 150w, ${product.product_info.img_url} 450w, ${product.product_info.img_url} 600w, ${product.product_info.img_url} 96w">
                            </a>
                        </div><!-- humbnail-wrapper -->
                        <div class="content-wrapper">

                            <h3 class="product-title">
                                <a
                                    href="https://klbtheme.com/bacola/product/all-natural-italian-style-chicken-meatballs/">
                                    ${product.product_info.title}
                                </a>
                            </h3>
                            <div class="entry-price subTotalPrice-mini-cart-${product.product_info.id} ">
                                <span class="quantity">${product.qty} ×
                                    <span class="woocommerce-Price-amount amount">
                                        ${product.product_info.format_price}
                                    </span>
                            </div><!-- entry-price -->

                            <a href="#"
                                class="remove remove-item remove_from_cart_button"
                                aria-label="Remove All Natural Italian-Style Chicken Meatballs from cart"
                                data-product_id="${product.product_info.id}"
                                data-cart_item_key="f74909ace68e51891440e4da0b65a70c"
                                data-product_sku="ZU49VOR"><i
                                    class="klbth-icon-cancel"></i></a>
                        </div><!-- content-wrapper -->
                    </div><!-- product-wrapper -->
                </div>
            <!-- product -->`
        $(".cart-empty").remove();
        $(".mini-cart-wrap").append(html);
        // updateMiniCart(product.product_info.id, product.price,);
        // subtotalMiniCart.text(product.subTotalPrice + product.product_info.price);
        countCartElement.text(++counCartValue);
    }


    // handle check all
    let productCheckBoxList = $(".input-checkbox");
    let checkAll = $(".global-cb");
    $(document).on('change', '.input-checkbox', function () {
        let isCheckAll = $("input[name='wishlist_pr[]']:checked").length === productCheckBoxList.length;

        checkAll.prop('checked', isCheckAll)


    })
    $(".global-cb").change(function (e) {
        handleCheclAll();
    });
    function handleCheclAll() {
        let isCheckAll = checkAll.prop('checked');
        productCheckBoxList.prop('checked', isCheckAll);
        console.log(isCheckAll);
    }


    // handle action wishlist
    $(".product-wishlist-btn-apply").click(function (e) {
        e.preventDefault();
        let clicked = $(this);
        let product_checked = $("input[name='wishlist_pr[]']:checked")
        let selectedIds = [];
        let productIds = [];
        let action = $("#tinvwl_product_actions");
        $.each(product_checked, function (index, ele) {
            selectedIds.push(ele.value);
            productIds.push(ele.getAttribute('data-product_id'));

        });
        $.ajax({
            type: "POST",
            url: "/wishlist/applyAction",
            data: {
                action: action.val(),
                selectedIds: selectedIds,
                productIds
            },
            dataType: "json",
            beforeSend: function () {
                clicked.css('pointer-events', 'none');
                clicked.append(
                    '<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>'
                )
            },
            success: function (response) {
                $(".loader-image").remove();
                clicked.css('pointer-events', 'all')
                toastr.success(response.message, 'success!')
                setTimeout(() => {
                    window.location.reload();
                }, 1300);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $(".btn-add-one-to-cart").click(function (e) {
        let clicked = $(this);
        let product_id = clicked.attr('data-product_id');

        $.ajax({
            type: "GET",
            url: "/wishlist/add-to-product/" + product_id,
            dataType: "json",
            beforeSend: function () {
                clicked.css('pointer-events', 'none');
                clicked.append(
                    '<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>'
                )
            },
            success: function (response) {
                $(".loader-image").remove();
                clicked.css('pointer-events', 'all')
                toastr.success(response.message, 'success!')
                setTimeout(() => {
                    window.location.reload();
                }, 1300);
            },
            error: function (err) {
                toastr.error(err.message, 'error1');
            }
        });
    })

    // search product
    $("#searchform").submit(function (e) {
        // e.preventDefault();
        // let s = 
    });

})(jQuery.noConflict());
