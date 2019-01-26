<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.01
 */

namespace KgBot\Builders;

use KgBot\Models\PaymentTerm;
use KgBot\Utils\Request;

class PaymentTermBuilder extends Builder
{

    protected $entity = 'organizations/%s';
    protected $model  = PaymentTerm::class;
    protected $organizationId;

    public function __construct( Request $request, $organizationId )
    {
        parent::__construct( $request );

        $this->entity = sprintf( $this->entity, $organizationId );
    }

    /**
     * @param array $filters
     *
     * @return \Illuminate\Support\Collection|\KgBot\Utils\Model[]
     */
    public function get( $filters = [] )
    {
        $urlFilters = $this->parseFilters( $filters );

        return $this->request->handleWithExceptions( function () use ( $urlFilters ) {

            $response      = $this->request->client->get( "{$this->entity}{$urlFilters}" );
            $responseData  = json_decode( (string) $response->getBody() );
            $fetchedItems  = collect( $responseData );
            $payment_terms = new $this->model( $fetchedItems
                ->values()->{str_singular( str_split( $this->entity, '/' )[ 0 ] )} );

            return $payment_terms;

        } );
    }
}