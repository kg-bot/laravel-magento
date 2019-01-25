<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 22.13
 */

namespace KgBot\Models;


use KgBot\Utils\Model;

class Location extends Model
{
    protected $entity     = 'locations';
    protected $primaryKey = 'number';
    protected $fillable   = [

        "name",
        "is_default",
        "number",
        "parent_id",
    ];
}