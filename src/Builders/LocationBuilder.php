<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 22.16
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Location;

class LocationBuilder extends Builder
{
    protected $entity = 'locations';
    protected $model  = Location::class;
}