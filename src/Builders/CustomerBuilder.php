<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.37
 */

namespace KgBot\Builders;


use KgBot\Models\Customer;

class CustomerBuilder extends Builder
{
    protected $entity = 'customers';
    protected $model  = Customer::class;
}