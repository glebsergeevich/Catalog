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
 * @date 28/09/16 12:03
 */

namespace Modules\Catalog\Models;

use Phact\Main\Phact;
use Phact\Orm\Fields\CharField;
use Phact\Orm\Fields\HasManyField;
use Phact\Orm\Fields\SlugField;
use Phact\Orm\Manager;
use Phact\Orm\TreeModel;

/**
 * Class Category
 * @package Modules\Catalog\Models
 *
 * @property String name
 * @property String slug
 * @property Manager products
 */
class Category extends TreeModel
{
    public static $nameAttribute = 'name';

    public static function getFields()
    {
        return array_merge(parent::getFields(), [
            'name' => [
                'class' => CharField::class,
                'label' => 'Наименование'
            ],
            'slug' => [
                'class' => SlugField::class,
                'label' => "Url"
            ],
            'products' => [
                'class' => HasManyField::class,
                'to' => 'category_id',
                'label' => 'Товары',
                'modelClass' => Product::class
            ]
        ]);
    }

    public function __toString()
    {
        return (string) $this->name;
    }

    public function getAbsoluteUrl()
    {
        return Phact::app()->router->url('catalog:category', [
            'slug' => $this->slug
        ]);
    }
}