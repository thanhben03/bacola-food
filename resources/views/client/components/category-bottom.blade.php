{{-- <div class="first">
    <div class="category">
        <div class="category-image"><a href="https://klbtheme.com/bacola/product-category/beverages/"><img decoding="async"
                    src="https://klbtheme.com/bacola/wp-content/uploads/2021/05/baverages-1.jpg" alt="Beverages"></a>
        </div>
        <div class="category-detail">
            <h3 class="entry-category"><a href="https://klbtheme.com/bacola/product-category/beverages/">Beverages</a>
            </h3>
            <div class="category-count">11 Items</div>
        </div>
    </div>
</div> --}}
<div class="categories-wrapper">
    @for ($i = 0; $i < count($categories); $i++)
        <div class="category">
            <div class="category-image"><a href="{{ route('product.category', $categories[$i]->slug) }}"><img
                        decoding="async"
                        src="{{ $categories[$i]->img_url }}"
                        alt="{{ $categories[$i]->title }}"></a></div>
            <div class="category-detail">
                <h3 class="entry-category"><a
                        href="{{ route('product.category', $categories[$i]->slug) }}">{{ $categories[$i]->title }}</a></h3>
                <div class="category-count">{{ $categories[$i]->products_count }} Items</div>
            </div>
        </div>
    @endfor
</div>
