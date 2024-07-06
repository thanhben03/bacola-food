<p>
    Order #<mark class="order-number">{{ $order->id }}</mark> was placed on <mark
        class="order-date">{{ $order->created_at }}</mark> and is
    currently <mark class="order-status">On hold</mark>.</p>


<section class="woocommerce-order-details">

    <h2 class="woocommerce-order-details__title">Order details</h2>

    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

        <thead>
            <tr>
                <th class="woocommerce-table__product-name product-name">Product</th>
                <th class="woocommerce-table__product-table product-total">Total</th>
            </tr>
        </thead>

        <tbody>
            @for($i= 0; $i < count($order->products); $i++)
                <tr class="woocommerce-table__line-item order_item">

                    <td class="woocommerce-table__product-name product-name">
                        <a href="https://klbtheme.com/bacola/product/all-natural-italian-style-chicken-meatballs/">{{ $order->products[$i]->title }}</a> <strong
                            class="product-quantity">×&nbsp;{{ $order->item[$i]->qty }}</strong>
                    </td>

                    <td class="woocommerce-table__product-total product-total">
                        <span class="woocommerce-Price-amount amount"><bdi><span
                                    class="woocommerce-Price-currencySymbol"></span>{{ number_format($order->item[$i]->sub_total) }}đ</bdi></span>
                    </td>

                </tr>
            @endfor

        </tbody>

        <tfoot>

            <tr>
                <th scope="row">Shipping:</th>
                <td><span class="woocommerce-Price-amount amount"><span
                            class="woocommerce-Price-currencySymbol"></span>{{ number_format($order->shipping_cost) }}đ</span>&nbsp;</td>
            </tr>
            <tr>
                <th scope="row">Payment method:</th>
                <td>{{ $order->payment_method }}</td>
            </tr>
            <tr>
                <th scope="row">Total:</th>
                <td><span class="woocommerce-Price-amount amount"><span
                            class="woocommerce-Price-currencySymbol"></span>{{ number_format($order->total_price) }}đ</span></td>
            </tr>
        </tfoot>
    </table>

</section>
