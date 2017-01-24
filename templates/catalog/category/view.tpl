{extends 'base.tpl'}

{block 'heading'}
    <h1>{$model->name}</h1>
{/block}

{block 'content'}
    <div class="catalog-page catalog-category-page">
        <div class="sub-categories-block">
            {var $pager = $.pager($categories, ['pageSize' => 2])}
            {set $categories = $pager->getData()}

            <ul class="large-block-grid-2">
                {foreach $categories as $category}
                    <li>
                        <a href="{$category->getAbsoluteUrl()}">
                            {$category->name}
                        </a>
                    </li>
                {/foreach}
            </ul>

            {raw $pager->render()}
        </div>

        <div class="products-block">
            {var $pager = $.pager($products, ['pageSize' => 2])}
            {set $products = $pager->getData()}

            <ul class="large-block-grid-2">
                {foreach $products as $product}
                    <li>
                        <a href="{$product->getAbsoluteUrl()}">
                            {$product->name}
                        </a>
                    </li>
                {/foreach}
            </ul

            {raw $pager->render()}
        </div>
    </div>
{/block}