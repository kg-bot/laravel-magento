<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Builders;


use KgBot\Models\ProductionOrder;

class ProductionOrderBuilder extends Builder
{
    protected $entity = 'production-orders';
    protected $model  = ProductionOrder::class;
}