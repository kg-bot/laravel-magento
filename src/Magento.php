<?php

namespace KgBot\Magento;

use KgBot\Magento\Builders\CustomerAddressBuilder;
use KgBot\Magento\Builders\CustomerBuilder;
use KgBot\Magento\Builders\CustomerGroupBuilder;
use KgBot\Magento\Builders\OrderBuilder;
use KgBot\Magento\Builders\ProductBuilder;
use KgBot\Magento\Utils\Request;

class Magento
{
	/**
	 * @var $request Request
	 */
	protected $request;

	/**
	 * Rackbeat constructor.
	 *
	 * @param null  $token   API token
	 * @param array $options Custom Guzzle options
	 * @param array $headers Custom Guzzle headers
	 */
	public function __construct( $token = null, $options = [], $headers = [] ) {
		$this->initRequest( $token, $options, $headers );
	}

	/**
	 * @param       $token
	 * @param array $options
	 * @param array $headers
	 */
	private function initRequest( $token, $options = [], $headers = [] ): void {
		$this->request = new Request( $token, $options, $headers );
	}

	/**
	 * @return OrderBuilder
	 */
	public function orders(): OrderBuilder {
		return new OrderBuilder( $this->request );
	}

	/**
	 * @return CustomerBuilder
	 */
	public function customers(): CustomerBuilder {
		return new CustomerBuilder( $this->request );
	}

	/**
	 * @return CustomerAddressBuilder
	 */
	public function customer_addresses(): CustomerAddressBuilder {
		return new CustomerAddressBuilder( $this->request );
	}

	/**
	 * @return ProductBuilder
	 */
	public function products(): ProductBuilder {
		return new ProductBuilder( $this->request );
	}

	/**
	 * @return CustomerGroupBuilder
	 */
	public function customer_groups(): CustomerGroupBuilder {

		return new CustomerGroupBuilder( $this->request );
	}
}