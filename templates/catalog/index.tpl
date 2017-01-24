{extends 'base.tpl'}

{block 'heading'}
    <h1>Каталог</h1>
{/block}

{block 'content'}
    <div class="catalog-page catalog-index-page">
        {var $pager = $.pager($categories, ['pageSize' => 1])}
        {set $objects = $pager->getData()}

        <ul class="large-block-grid-2">
            {foreach $objects as $object}
                <li>
                    <a href="{$object->getAbsoluteUrl()}">
                        {$object->name}
                    </a>
                </li>
            {/foreach}
        </ul>

        {raw $pager->render()}
    </div>
{/block}