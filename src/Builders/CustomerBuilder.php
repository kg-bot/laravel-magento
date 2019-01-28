<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.37
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\Customer;

class CustomerBuilder extends Builder
{
    protected $entity = 'contacts';
    protected $model  = Customer::class;


    protected function parseResponse( $response )
    {
        $fetchedItems = collect( $response->{$this->entity} );
        $items        = collect( [] );

        foreach ( $fetchedItems as $index => $item ) {

            if ( $item->isCustomer ) {

                /** @var \KgBot\Billy\Utils\Model $model */
                $model = new $this->model( $this->request, $item );

                $items->push( $model );
            }

        }

        return $items;
    }
}