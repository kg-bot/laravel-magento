<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.30
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Utils\Model;

class Currency extends Model
{
    protected $entity     = 'currencies';
    protected $primaryKey = 'id';
}
