<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 22.13
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Exceptions\BillyMethodNotImplementedException;
use KgBot\Billy\Utils\Model;
use KgBot\Billy\Utils\Request;

class PaymentTerm extends Model
{
    protected $entity = null;

    /**
     * PaymentTerm constructor.
     *
     * @param array|object $data
     */
    public function __construct( Request $request, $data = [] )
    {
        $data = [

            'mode' => $data->paymentTermsMode,
            'days' => $data->paymentTermsDays,
        ];

        parent::__construct( $request, $data );
    }

    public function delete()
    {
        throw new BillyMethodNotImplementedException( 'This method is not implemented on this resource.' );
    }

    public function update( $data = [] )
    {

        throw new BillyMethodNotImplementedException( 'This method is not implemented on this resource.' );
    }
}