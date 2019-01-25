<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 16.48
 */

namespace KgBot\Models;


use KgBot\Utils\Model;

class Employee extends Model
{

    protected $entity     = 'employees';
    protected $primaryKey = 'number';
}