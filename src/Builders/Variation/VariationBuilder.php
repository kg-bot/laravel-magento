<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.01
 */

namespace KgBot\Billy\Builders\Variation;


use KgBot\Billy\Builders\Builder;
use KgBot\Billy\Models\Variation\Variation;

class VariationBuilder extends Builder
{

    protected $entity = 'variations';
    protected $model  = Variation::class;
}