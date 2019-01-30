<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Country;

class CountryBuilder extends Builder
{
    protected $entity = 'countries';
    protected $model  = Country::class;
}