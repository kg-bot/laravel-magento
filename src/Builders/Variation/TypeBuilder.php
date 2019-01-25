<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.01
 */

namespace KgBot\Builders\Variation;

use KgBot\Builders\Builder;
use KgBot\Models\Variation\Type as TypeModel;

class TypeBuilder extends Builder
{

    protected $entity = 'variations/:variation_number/types';
    protected $model  = TypeModel::class;
}