<?php

namespace KgBot\Magento\Builders;


use KgBot\Magento\Exceptions\MagentoMethodNotImplementedException;
use KgBot\Magento\Models\CustomerAddress;

class CustomerAddressBuilder extends Builder
{
	protected $entity = 'customers/addresses';
	protected $model  = CustomerAddress::class;

	public function get( $filters = [] ) {
		throw new MagentoMethodNotImplementedException( 'This method is not available on this resource' );
	}

	public function create( $data ) {
		throw new MagentoMethodNotImplementedException( 'This method is not available on this resource' );
	}
}