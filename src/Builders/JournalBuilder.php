<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.32
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Journal;

class JournalBuilder extends Builder
{
    protected $entity = 'daybooks';
    protected $model  = Journal::class;
}