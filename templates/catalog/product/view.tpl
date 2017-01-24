{extends 'base.tpl'}

{block 'heading'}
    <h1>{$model->name}</h1>
{/block}

{block 'content'}
    <div class="catalog-page catalog-product-page">
        <div class="price">
            <strong>Цена:</strong>

            {$model->price|number_format:0:"":" "} руб
        </div>
        {if $model->description}
            <div class="description">
                <strong>Описание</strong>
                <article>
                    {$model->description}
                </article>
            </div>
        {/if}
    </div>
{/block}