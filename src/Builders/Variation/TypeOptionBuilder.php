<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.01
 */

namespace KgBot\Billy\Builders\Variation;

use KgBot\Billy\Builders\Builder;
use KgBot\Billy\Models\Variation\TypeOption;

class TypeOptionBuilder extends Builder
{

    protected $entity = 'variations/:variation_number/types/:type_number/options';
    protected $model  = TypeOption::class;
}