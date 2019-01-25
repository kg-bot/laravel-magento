<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 22.13
 */

namespace KgBot\Models;


use KgBot\Exceptions\BillyMethodNotImplementedException;
use KgBot\Utils\Model;
use KgBot\Utils\Request;

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