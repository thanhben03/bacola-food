@foreach ($orders as $item)
    <div class="klb-orders-style1">
        <table
            class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">

            <thead>
                <tr>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span
                            class="nobr">Order</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span
                            class="nobr">Date</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span
                            class="nobr">Status</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span
                            class="nobr">Total</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span
                            class="nobr">Actions</span></th>
                </tr>
            </thead>

            <tbody>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                        data-title="Order">
                        <a href="https://klbtheme.com/bacola/my-account/view-order/4431/">
                            #{{ $item->id }} </a>

                    </td>
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                        data-title="Date">
                        <time datetime="2023-06-04T07:34:14+00:00">{{ $item->created_at }}</time>

                    </td>
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                        data-title="Status">
                        On hold
                    </td>
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                        data-title="Total">
                        <span class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol"></span>{{ number_format($item->total_price) }}đ</span>
                        for {{ $item->item_count }} items
                    </td>
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                        data-title="Actions">
                        <a href="{{ route('order.view-history', $item->id) }}"
                            class="woocommerce-button button view">View</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="order-list">
            @foreach ($item->products as $product)
                <div class="order-item">
                    <div class="product-name">
                        <a href="{{ route('product.view', $product->id) }}">All
                            {{ $product->title }}</a> <strong class="product-quantity">×&nbsp;1</strong>
                    </div>
                    <div class="product-thumbnail">
                        <img src="{{ $product->img_url }}">
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endforeach
