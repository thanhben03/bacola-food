<form action="https://klbtheme.com/bacola/wishlist/6fa0b0/" method="post" autocomplete="off" data-tinvwl_paged="1"
    data-tinvwl_per_page="10" data-tinvwl_sharekey="6fa0b0">
    <table class="tinvwl-table-manage-list">
        <thead>
            <tr>
                <th class="product-cb"><input type="checkbox" name="input-checkbox-all" class="global-cb"
                        title="Select all for bulk action">
                </th>
                <th class="product-remove"></th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name"><span class="tinvwl-full">Product Name</span><span
                        class="tinvwl-mobile">Product</span>
                </th>
                <th class="product-price">Unit Price</th>
                <th class="product-date">Date Added</th>
                <th class="product-stock">Stock Status</th>
                <th class="product-action">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($wishlists as $item)
                <tr class="wishlist_item">
                    <td class="product-cb">
                        <input type="checkbox" data-product_id="{{ $item->product->id }}" name="wishlist_pr[]" class="input-checkbox" value="{{ $item->id }}"
                            title="Select for bulk action">
                    </td>
                    <td class="product-remove">
                        <a href="#" class="remove-item-wishlist" data-product_id="{{ $item->product->id }}" name="tinvwl-remove" value="6075" title="Remove"><i
                                class="ftinvwl ftinvwl-times"></i>
                        </a>
                    </td>
                    <td class="product-thumbnail">
                        <a
                            href="https://klbtheme.com/bacola/product/all-natural-italian-style-chicken-meatballs/?tiwp=6075"><img
                                width="90" height="90"
                                src="{{ $item->product->img_url }}"
                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                decoding="async" loading="lazy"
                                srcset="{{ $item->product->img_url }} 90w, {{ $item->product->img_url }} 150w, {{ $item->product->img_url }} 450w, {{ $item->product->img_url }}g 600w, {{ $item->product->img_url }} 96w"
                                sizes="(max-width: 90px) 100vw, 90px"></a>
                    </td>
                    <td class="product-name">
                        <a
                            href="https://klbtheme.com/bacola/product/all-natural-italian-style-chicken-meatballs/?tiwp=6075">All
                            {{ $item->product->title }}</a>
                    </td>
                    <td class="product-price">
                        <del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><span
                                        class="woocommerce-Price-currencySymbol"></span>{{ $item->product->format_old_price }}</bdi></span></del>
                        <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                        class="woocommerce-Price-currencySymbol"></span>{{ $item->product->format_price }}</bdi></span></ins>
                    </td>
                    <td class="product-date">
                        <time class="entry-date" datetime="2023-06-19 16:18:22">{{ $item->created_at }}</time>
                    </td>
                    <td class="product-stock">
                        <p class="stock in-stock"><span><i class="ftinvwl ftinvwl-check"></i></span><span>In
                                Stock</span></p>
                    </td>
                    <td class="product-action">
                        <a href="#" class="button alt btn-add-one-to-cart" data-product_id="{{ $item->product->id }}" name="tinvwl-add-to-cart" title="Add to Cart">
                            <i class="ftinvwl ftinvwl-shopping-cart"></i><span class="tinvwl-txt">Add to Cart</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="100">
                    <div class="tinvwl-to-left look_in">
                        <div class="tinvwl-input-group tinvwl-no-full">
                            <input type="hidden" name="lists_per_page" value="10"
                                id="tinvwl_lists_per_page"><select name="product_actions" id="tinvwl_product_actions"
                                class="tinvwl-break-input-filed form-control">
                                <option value="" selected="selected">Actions</option>
                                <option value="add_to_cart_selected">
                                    Add to Cart</option>
                                <option value="remove_selected">Remove
                                </option>
                            </select>
                            <span class="tinvwl-input-group-btn">
                                <button type="button" class="button product-wishlist-btn-apply"
                                    name="tinvwl-action-product_apply" value="product_apply" title="Apply Action">Apply
                                    <span class="tinvwl-mobile">Action</span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="tinvwl-to-right look_in"><button type="submit" class="button"
                            name="tinvwl-action-product_selected" value="product_selected"
                            title="Add Selected to Cart">Add Selected
                            to Cart</button><button type="submit" class="button" name="tinvwl-action-product_all"
                            value="product_all" title="Add All to Cart">Add All to
                            Cart</button></div> <input type="hidden" id="wishlist_nonce" name="wishlist_nonce"
                        value="a70ba88690"><input type="hidden" name="_wp_http_referer"
                        value="/bacola/wishlist/6fa0b0/">
                </td>
            </tr>
        </tfoot>
    </table>
</form>
