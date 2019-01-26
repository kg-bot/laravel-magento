<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.02
 */

namespace KgBot\Billy\Models\Variation;


use KgBot\Billy\Builders\Variation\TypeBuilder;
use KgBot\Billy\Utils\Model;

class Variation extends Model
{
    public    $number;
    protected $entity     = 'variations';
    protected $primaryKey = 'number';

    public function types()
    {
        $types      = new TypeBuilder( $this->request );
        $old_entity = $types->getEntity();
        $types->setEntity( str_replace( ':variation_number', $this->{$this->primaryKey}, $old_entity ) );

        return $types;
    }
}