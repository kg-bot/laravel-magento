<?php
/**
 * Created by PhpStorm.
 * User: kgbot
 * Date: 5/5/18
 * Time: 11:54 PM
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Utils\Model;

class CustomerGroup extends Model
{
    protected $entity     = 'customer-groups';
    protected $primaryKey = 'number';
}