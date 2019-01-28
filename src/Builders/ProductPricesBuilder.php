<?php
/**
 * Created by PhpStorm.
 * User: kgbot
 * Date: 1/28/19
 * Time: 8:20 AM
 */

namespace KgBot\Billy\Builders;


use KgBot\Billy\Models\ProductPrices;

class ProductPricesBuilder extends Builder
{
    protected $entity = 'productPrices';
    protected $model  = ProductPrices::class;

    protected function parseResponse( $response )
    {
        $fetchedItems = collect( $response->productPrices );
        $items        = collect();

        foreach ( $fetchedItems as $item ) {

            $items->push( new $this->model( $this->request, $item ) );
        }

        return $items;
    }
}