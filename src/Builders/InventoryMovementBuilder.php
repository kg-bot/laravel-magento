<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\InventoryMovement;

class InventoryMovementBuilder extends Builder
{
    protected $entity = 'inventory-movements';
    protected $model  = InventoryMovement::class;
}