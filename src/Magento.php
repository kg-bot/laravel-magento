<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.12
 */

namespace KgBot\Magento;

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
    public function __construct( $token = null, $options = [], $headers = [] )
    {
        $this->initRequest( $token, $options, $headers );
    }

    /**
     * @param       $token
     * @param array $options
     * @param array $headers
     */
    private function initRequest( $token, $options = [], $headers = [] )
    {
        $this->request = new Request( $token, $options, $headers );
    }

    /**
     * @return \KgBot\Magento\Builders\OrderBuilder
     */
    public function orders()
    {
        return new OrderBuilder( $this->request );
    }

    /**
     * @return \KgBot\Magento\Builders\CustomerBuilder
     */
    public function customers()
    {
        return new CustomerBuilder( $this->request );
    }

    /**
     * @return \KgBot\Magento\Builders\ProductBuilder
     */
    public function products()
    {
        return new ProductBuilder( $this->request );
    }

    /**
     * @return \KgBot\Magento\Builders\CustomerGroupBuilder
     */
    public function customer_groups()
    {

        return new CustomerGroupBuilder( $this->request );
    }
}