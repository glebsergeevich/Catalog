<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @company HashStudio
 * @site http://hashstudio.ru
 * @date 10/11/16 09:13
 */

namespace Modules\Catalog\Controllers;

use Modules\Catalog\Models\Product;
use Phact\Controller\Controller;
use Phact\Main\Phact;

class ProductController extends Controller
{
    public function view($slug)
    {
        $model = Product::objects()->filter(['slug' => $slug])->limit(1)->get();
        if (!$model) {
            $this->error(404);
        }

        Phact::app()->breadcrumbs->add("Каталог", "catalog:index");
        $ancestors = $model->category->objects()->ancestors(true)->all();
        foreach ($ancestors as $parent) {
            Phact::app()->breadcrumbs->add($parent);
        }
        Phact::app()->breadcrumbs->add($model);

        echo $this->render('catalog/product/view.tpl', [
            'model' => $model
        ]);
    }
}