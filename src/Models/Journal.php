<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.30
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Utils\Model;

class Journal extends Model
{
    protected $entity     = 'daybooks';
    protected $primaryKey = 'id';
}
