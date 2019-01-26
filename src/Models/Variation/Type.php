<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.02
 */

namespace KgBot\Billy\Models\Variation;


use KgBot\Billy\Builders\Variation\TypeOptionBuilder;
use KgBot\Billy\Utils\Model;
use KgBot\Billy\Utils\Request;

class Type extends Model
{
    public    $id;
    protected $entity          = 'variations/:variation_number/types';
    protected $primaryKey      = 'id';
    protected $typeOptionModel = TypeOption::class;

    public function __construct( Request $request, $data = [] )
    {
        parent::__construct( $request, $data );

        $this->entity = str_replace( ':variation_number', $this->variation_id, $this->entity );
    }

    public function options()
    {
        $options    = new TypeOptionBuilder( $this->request );
        $old_entity = $options->getEntity();
        $new_entity = $options->setEntity( str_replace( ':variation_number', $this->variation_id, $old_entity ) );
        $options->setEntity( str_replace( ':type_number', $this->{$this->primaryKey}, $new_entity ) );

        return $options;
    }
}