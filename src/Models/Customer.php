<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 16.48
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Utils\Model;

class Customer extends Model
{

    protected $entity     = 'customers';
    protected $primaryKey = 'number';
}