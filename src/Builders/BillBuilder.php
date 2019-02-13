<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Bill;

class BillBuilder extends Builder
{
    protected $entity = 'bills';
    protected $model  = Bill::class;
}