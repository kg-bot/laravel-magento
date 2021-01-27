<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.30
 */

namespace KgBot\Magento\Models;


use KgBot\Magento\Utils\Model;

class Customer extends Model
{
	protected $entity     = 'customers';
	protected $primaryKey = 'id';

	public function getBillingAddress() {
		return $this->request->handleWithExceptions( function () {

			$address      = $this->request->client->get( "{$this->entity}/{$this->{$this->primaryKey}}/billingAddress" );
			$responseData = json_decode( (string) $address->getBody() );

			if ( ! empty( $responseData ) ) {
				return new CustomerAddress( $this->request, $responseData );
			}

			return null;
		} );
	}

	public function getShippingAddress() {
		return $this->request->handleWithExceptions( function () {

			$address      = $this->request->client->get( "{$this->entity}/{$this->{$this->primaryKey}}/shippingAddress" );
			$responseData = json_decode( (string) $address->getBody() );

			if ( ! empty( $responseData ) ) {
				return new CustomerAddress( $this->request, $responseData );
			}

			return null;
		} );
	}
}
