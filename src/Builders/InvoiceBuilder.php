<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Invoice;

class InvoiceBuilder extends Builder
{
    protected $entity = 'invoices';
    protected $model  = Invoice::class;
}