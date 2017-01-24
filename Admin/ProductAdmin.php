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
 * @date 03/10/16 10:32
 */

namespace Modules\Catalog\Admin;

use Modules\Admin\Contrib\Admin;
use Modules\Catalog\Models\Product;

class ProductAdmin extends Admin
{
    public function getSearchColumns()
    {
        return ['name', 'slug'];
    }

    public function getModel()
    {
        return new Product();
    }

    public static function getName()
    {
        return 'Товары';
    }

    public static function getItemName()
    {
        return 'Товар';
    }
}