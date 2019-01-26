<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.12
 */

namespace KgBot\Billy;


use KgBot\Billy\Builders\CustomerBuilder;
use KgBot\Billy\Builders\CustomerGroupBuilder;
use KgBot\Billy\Builders\EmployeeBuilder;
use KgBot\Billy\Builders\InventoryAdjustmentBuilder;
use KgBot\Billy\Builders\InventoryMovementBuilder;
use KgBot\Billy\Builders\LocationBuilder;
use KgBot\Billy\Builders\LotBuilder;
use KgBot\Billy\Builders\OrderBuilder;
use KgBot\Billy\Builders\PaymentTermBuilder;
use KgBot\Billy\Builders\ProductBuilder;
use KgBot\Billy\Builders\ProductGroupBuilder;
use KgBot\Billy\Builders\ProductionOrderBuilder;
use KgBot\Billy\Builders\SupplierBuilder;
use KgBot\Billy\Builders\Variation\VariationBuilder;
use KgBot\Billy\Utils\Request;

class Billy
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

    private function initRequest( $token, $options = [], $headers = [] )
    {
        $this->request = new Request( $token, $options, $headers );
    }

    /**
     * @return \KgBot\Billy\Builders\SupplierBuilder
     */
    public function suppliers()
    {
        return new SupplierBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\LocationBuilder
     */
    public function locations()
    {
        return new LocationBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\ProductBuilder
     */
    public function products()
    {
        return new ProductBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\LotBuilder
     */
    public function lots()
    {
        return new LotBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\ProductGroupBuilder
     */
    public function productGroups()
    {
        return new ProductGroupBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\Variation\VariationBuilder
     */
    public function variations()
    {
        return new VariationBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\OrderBuilder
     */
    public function orders()
    {
        return new OrderBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\CustomerBuilder
     */
    public function customers()
    {
        return new CustomerBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\CustomerGroupBuilder
     */
    public function customerGroups()
    {
        return new CustomerGroupBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\InventoryMovementBuilder
     */
    public function inventory_movements()
    {
        return new InventoryMovementBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\InventoryAdjustmentBuilder
     */
    public function inventory_adjustments()
    {
        return new InventoryAdjustmentBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\EmployeeBuilder
     */
    public function employees()
    {
        return new EmployeeBuilder( $this->request );
    }

    /**
     * @return \KgBot\Billy\Builders\PaymentTermBuilder
     */
    public function paymentTerms( $organizationId )
    {
        return new PaymentTermBuilder( $this->request, $organizationId );
    }

    /**
     * @return \KgBot\Billy\Builders\ProductionOrderBuilder
     */
    public function production_orders()
    {
        return new ProductionOrderBuilder( $this->request );
    }
}