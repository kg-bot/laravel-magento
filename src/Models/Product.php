<?php

namespace KgBot\Magento\Models;

use KgBot\Magento\Utils\Model;

class Product extends Model
{
    protected $entity     = 'products';
    protected $primaryKey = 'sku';

    public function updateStockItem( $data, $id = 1 )
    {
        $data = [
            'stockItem' => $data,
        ];

        return $this->request->handleWithExceptions( function () use ( $data, $id ) {

            $response =
                $this->request->client->put( "products/{$this->{urlencode($this->primaryKey)}}/stockItems/{$id}", [
                    'json' => $data,
                ] );

            return $response;
        } );
    }
}
