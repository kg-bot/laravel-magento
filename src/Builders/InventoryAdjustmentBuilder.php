<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Builders;


use KgBot\Models\InventoryAdjustment;

class InventoryAdjustmentBuilder extends Builder
{
    protected $entity = 'inventory-adjustments';
    protected $model  = InventoryAdjustment::class;
}