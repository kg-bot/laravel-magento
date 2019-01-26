<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.02
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Utils\Model;

class ProductGroup extends Model
{
    public    $number;
    protected $entity     = 'product-groups';
    protected $primaryKey = 'number';
}