<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.37
 */

namespace KgBot\Builders;


use KgBot\Models\Supplier;

class SupplierBuilder extends Builder
{
    protected $entity = 'contacts';
    protected $model  = Supplier::class;
}