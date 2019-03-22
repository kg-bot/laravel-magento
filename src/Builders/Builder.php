<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 17.00
 */

namespace KgBot\Magento\Builders;

use KgBot\Magento\Utils\Model;
use KgBot\Magento\Utils\Request;


class Builder
{
    protected $entity;
    /** @var Model */
    protected $model;
    protected $request;

    public function __construct( Request $request )
    {
        $this->request = $request;
    }

    /**
     * @param array $filters
     *
     * @return \Illuminate\Support\Collection|Model[]
     */
    public function get( $filters = [] )
    {
        $urlFilters = $this->parseFilters( $filters );

        return $this->request->handleWithExceptions( function () use ( $urlFilters ) {

            $response     = $this->request->client->get( "{$this->entity}{$urlFilters}" );
            $responseData = json_decode( (string) $response->getBody() );
            $items        = $this->parseResponse( $responseData );

            return $items;
        } );
    }

    protected function parseFilters( $filters )
    {
        $urlFilters = '?searchCriteria';
        if ( count( $filters ) > 0 ) {

            $i = 0;

            foreach ( $filters as $filter ) {

                $urlFilters .= '[filter_groups][0][filters][0][field]=' . $filter[ 'field' ];
                $urlFilters .= '&searchCriteria';
                $urlFilters .= '[filter_groups][0][filters][0][value]=' . $filter[ 'value' ];
                $urlFilters .= '&searchCriteria';
                $urlFilters .= '[filter_groups][0][filters][0][condition_type]=' . $filter[ 'condition_type' ];

                $i++;
            }
        }

        return $urlFilters;
    }

    protected function parseResponse( $response )
    {
        $fetchedItems = collect( $response->items );
        $items        = collect( [] );

        foreach ( $fetchedItems as $index => $item ) {


            /** @var Model $model */
            $model = new $this->model( $this->request, $item );

            $items->push( $model );

        }

        return $items;
    }

    public function find( $id )
    {
        return $this->request->handleWithExceptions( function () use ( $id ) {

            $response     = $this->request->client->get( "{$this->entity}/{$id}" );
            $responseData = json_decode( (string) $response->getBody() );

            return new $this->model( $this->request, $responseData );
        } );
    }

    public function create( $data )
    {
        $data = [
            str_singular( $this->entity ) => $data,
        ];

        return $this->request->handleWithExceptions( function () use ( $data ) {

            $response = $this->request->client->post( "{$this->entity}", [
                'json' => $data,
            ] );

            $responseData = json_decode( (string) $response->getBody() );

            return new $this->model( $this->request, $responseData );
        } );
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function setEntity( $new_entity )
    {
        $this->entity = $new_entity;

        return $this->entity;
    }

    private function escapeFilter( $variable )
    {
        $escapedStrings    = [
            "$",
            '(',
            ')',
            '*',
            '[',
            ']',
            ',',
        ];
        $urlencodedStrings = [
            '+',
            ' ',
        ];
        foreach ( $escapedStrings as $escapedString ) {

            $variable = str_replace( $escapedString, '$' . $escapedString, $variable );
        }
        foreach ( $urlencodedStrings as $urlencodedString ) {

            $variable = str_replace( $urlencodedString, urlencode( $urlencodedString ), $variable );
        }

        return $variable;
    }

    private function switchComparison( $comparison )
    {
        switch ( $comparison ) {
            case '=':
            case '==':
                $newComparison = '$eq:';
                break;
            case '!=':
                $newComparison = '$ne:';
                break;
            case '>':
                $newComparison = '$gt:';
                break;
            case '>=':
                $newComparison = '$gte:';
                break;
            case '<':
                $newComparison = '$lt:';
                break;
            case '<=':
                $newComparison = '$lte:';
                break;
            case 'like':
                $newComparison = '$like:';
                break;
            case 'in':
                $newComparison = '$in:';
                break;
            case '!in':
                $newComparison = '$nin:';
                break;
            default:
                $newComparison = "${$comparison}:";
                break;
        }

        return $newComparison;
    }
}