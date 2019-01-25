<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 22.13
 */

namespace KgBot\Models;


use KgBot\Utils\Model;

class PaymentTerm extends Model
{
    protected $entity     = 'payment-terms';
    protected $primaryKey = 'number';
}