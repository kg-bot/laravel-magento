<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.37
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Supplier;

class SupplierBuilder extends Builder
{
    protected $entity = 'contacts';
    protected $model  = Supplier::class;


    protected function parseResponse( $response )
    {
        $fetchedItems = collect( $response->{$this->entity} );
        $items        = collect( [] );

        foreach ( $fetchedItems as $index => $item ) {

            if ( $item->isSupplier ) {

                /** @var \KgBot\Billy\Utils\Model $model */
                $model = new $this->model( $this->request, $item );

                $items->push( $model );
            }

        }

        return $items;
    }
}