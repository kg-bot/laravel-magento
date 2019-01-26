<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.01
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\ProductGroup;

class ProductGroupBuilder extends Builder
{

    protected $entity = 'product-groups';
    protected $model  = ProductGroup::class;
}