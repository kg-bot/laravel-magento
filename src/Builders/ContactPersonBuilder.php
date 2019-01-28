<?php
/**
 * Created by PhpStorm.
 * User: kgbot
 * Date: 1/28/19
 * Time: 8:20 AM
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\ContactPerson;

class ContactPersonBuilder extends Builder
{
    protected $entity = 'contactPersons';
    protected $model  = ContactPerson::class;

    protected function parseResponse( $response )
    {
        $fetchedItems = collect( $response->contactPersons );
        $items        = collect();

        foreach ( $fetchedItems as $item ) {

            $items->push( new $this->model( $this->request, $item ) );
        }

        return $items;
    }
}