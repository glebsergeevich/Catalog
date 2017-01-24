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

use Modules\Catalog\Models\Category;
use Phact\Controller\Controller;
use Phact\Main\Phact;

class CategoryController extends Controller
{
    public function index()
    {
        Phact::app()->breadcrumbs->add("Каталог", "catalog:index");

        $categories = Category::objects()->roots();
        echo $this->render('catalog/index.tpl', [
            'categories' => $categories
        ]);
    }

    public function view($slug)
    {
        $model = Category::objects()->filter(['slug' => $slug])->limit(1)->get();
        if (!$model) {
            $this->error(404);
        }

        Phact::app()->breadcrumbs->add("Каталог", "catalog:index");
        $ancestors = $model->objects()->ancestors(true)->all();
        foreach ($ancestors as $parent) {
            Phact::app()->breadcrumbs->add($parent);
        }
        $categories = $model->objects()->children();
        echo $this->render('catalog/category/view.tpl', [
            'model' => $model,
            'categories' => $categories,
            'products' => $model->products->getQuerySet(),
        ]);
    }
}