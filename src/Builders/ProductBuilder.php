<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.01
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Product;

class ProductBuilder extends Builder
{

    protected $entity = 'products';
    protected $model  = Product::class;
}