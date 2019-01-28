<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.01
 */

namespace KgBot\Billy\Builders;

use KgBot\Billy\Models\PaymentTerm;
use KgBot\Billy\Utils\Request;

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

    protected function parseResponse( $response )
    {
        $payment_terms = new $this->model( $this->request,
            $response->{str_singular( explode( '/', $this->entity )[ 0 ] )} );

        return $payment_terms;
    }
}