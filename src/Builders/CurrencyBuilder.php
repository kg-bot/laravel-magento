<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Currency;

class CurrencyBuilder extends Builder
{
    protected $entity = 'currencies';
    protected $model  = Currency::class;
}