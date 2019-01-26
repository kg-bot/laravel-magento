<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.37
 */

namespace KgBot\Builders;


use KgBot\Models\Supplier;

class SupplierBuilder extends Builder
{
    protected $entity = 'contacts';
    protected $model  = Supplier::class;

    /**
     * @param array $filters
     *
     * @return \Illuminate\Support\Collection|\KgBot\Utils\Model[]
     */
    public function get( $filters = [] )
    {
        $urlFilters = $this->parseFilters( $filters );

        return $this->request->handleWithExceptions( function () use ( $urlFilters ) {

            $response     = $this->request->client->get( "{$this->entity}{$urlFilters}" );
            $responseData = json_decode( (string) $response->getBody() );
            $fetchedItems = collect( $responseData );
            $items        = collect( [] );
            $pages        = $responseData->values()->meta->paging->total;

            foreach ( $fetchedItems->values()->{$this->entity} as $index => $item ) {

                if ( $item->isSupplier ) {

                    /** @var \KgBot\Utils\Model $model */
                    $model = new $this->model( $this->request, $item );

                    $items->push( $model );
                }


            }

            return $items;
        } );
    }
}