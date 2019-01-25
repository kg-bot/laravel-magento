<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.02
 */

namespace KgBot\Models;


use KgBot\Utils\Model;

class Product extends Model
{
    public    $number;
    protected $entity     = 'products';
    protected $primaryKey = 'number';

    public function inventoryMatrix( $location_id = null, array $filter = null )
    {
        return $this->request->handleWithExceptions( function () use ( $location_id, $filter ) {

            $query = '';

            // We need to use location filter if user has provided any
            if ( !is_null( $location_id ) ) {

                $query .= '?location_id=' . $location_id;
            }

            if ( !is_null( $filter ) ) {

                foreach ( $filter as $parameter => $value ) {

                    if ( $query === '' ) {

                        $query .= '?' . $parameter . '=' . $value;

                    } else {

                        $query .= '&' . $parameter . '=' . $value;
                    }
                }
            }

            $response = $this->request->client->get( "{$this->entity}/{$this->{$this->primaryKey}}/variation-matrix" .
                                                     $query );

            $html = (string) $response->getBody();

            return $html;
        } );

    }

    public function variations( $variation_id = 1001 )
    {
        return $this->request->handleWithExceptions( function () use ( $variation_id ) {

            $response = $this->request->client->get( "variations/{$this->{$this->primaryKey}}/variation-matrix" );

            $html = (string) $response->getBody();

            return $html;
        } );
    }

    public function location()
    {
        return $this->request->handleWithExceptions( function () {

            $response = $this->request->client->get( "{$this->entity}/{$this->{$this->primaryKey}}/locations" );

            return collect( json_decode( (string) $response->getBody() )->product_locations );

        } );
    }

    /**
     * Show reporting ledger for desired product https://app.rackbeat.com/reporting/ledger/{product_number}
     * API docs: https://rackbeat.docs.apiary.io/#reference/inventory-reports/show
     */
    public function ledger()
    {
        return $this->request->handleWithExceptions( function () {

            $response =
                $this->request->client->get( "reports/ledger/{$this->{ $this->primaryKey } }" );

            return collect( json_decode( (string) $response->getBody() )->ledger_items );

        } );
    }
}