<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Magento\Builders;


use KgBot\Magento\Models\Product;

class ProductBuilder extends Builder
{
    protected $entity = 'products';
    protected $model  = Product::class;
}