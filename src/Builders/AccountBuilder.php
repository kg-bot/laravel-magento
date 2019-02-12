<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Account;

class AccountBuilder extends Builder
{
    protected $entity = 'accounts';
    protected $model  = Account::class;
}