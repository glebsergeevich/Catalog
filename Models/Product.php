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

use Modules\Cart\Interfaces\CartItem;
use Phact\Main\Phact;
use Phact\Orm\Fields\CharField;
use Phact\Orm\Fields\IntField;
use Phact\Orm\Fields\SlugField;
use Phact\Orm\Fields\TextField;
use Phact\Orm\Fields\TreeForeignField;
use Phact\Orm\Model;

/**
 * Class Product
 * @package Modules\Text\Models
 *
 * @property String name
 * @property String slug
 * @property Category category
 * @property Int price
 * @property String description
 */
class Product extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::class,
                'label' => 'Наименование'
            ],
            'slug' => [
                'class' => SlugField::class,
                'label' => "Url"
            ],
            'category' => [
                'class' => TreeForeignField::class,
                'label' => 'Категория',
                'modelClass' => Category::class,
            ],
            'price' => [
                'class' => IntField::class,
                'label' => 'Цена',
                'null' => true
            ],
            'description' => [
                'class' => TextField::class,
                'label' => 'Описание',
                'null' => true
            ]
        ];
    }

    public function __toString()
    {
        return (string) $this->name;
    }

    public function getAbsoluteUrl()
    {
        return Phact::app()->router->url('catalog:product', [
            'slug' => $this->slug
        ]);
    }

    /**
     * Single item price
     * @param $quantity
     * @param $data
     * @return mixed
     */
    public function getCartPrice($quantity, $data)
    {
        return $this->price;
    }
}