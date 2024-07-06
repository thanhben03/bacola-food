<div class="all-categories locked">
    <a href="#" data-toggle="collapse" data-target="#all-categories">
        <i class="klbth-icon-menu-thin"></i>
        <span class="text">ALL CATEGORIES</span>

        <div class="description">TOTAL 63 PRODUCTS</div>
    </a>

    <div class="dropdown-categories collapse show" id="all-categories">
        <ul id="menu-sidebar-menu" class="menu-list">
            @foreach ($categories as $category)
                <li
                    class="category-parent @if (count($category->subcategory) > 0) parent @endif  menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children">
                    <a href="{{ route('product.category', $category->slug) }}"><i
                            class="klbth-icon-apple-juice"></i>{{ $category->title }}</a>
                    @if (count($category->subcategory) > 0)
                        <ul class="sub-menu">
                            @foreach ($category->subcategory as $item)
                                <li
                                    class="category-parent menu-item menu-item-type-taxonomy menu-item-object-product_cat">
                                    <a
                                        href="{{ route('product.category', [$category->slug, $item->slug]) }}">{{ $item->title }}</a>
                                </li>
                            @endforeach

                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

</div>
