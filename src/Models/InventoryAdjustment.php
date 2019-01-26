<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.30
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Utils\Model;

class InventoryAdjustment extends Model
{
    protected $entity     = 'inventory-adjustments';
    protected $primaryKey = 'id';
}