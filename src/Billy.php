<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.12
 */

namespace KgBot;


use KgBot\Builders\CustomerBuilder;
use KgBot\Builders\CustomerGroupBuilder;
use KgBot\Builders\EmployeeBuilder;
use KgBot\Builders\InventoryAdjustmentBuilder;
use KgBot\Builders\InventoryMovementBuilder;
use KgBot\Builders\LocationBuilder;
use KgBot\Builders\LotBuilder;
use KgBot\Builders\OrderBuilder;
use KgBot\Builders\PaymentTermBuilder;
use KgBot\Builders\ProductBuilder;
use KgBot\Builders\ProductGroupBuilder;
use KgBot\Builders\ProductionOrderBuilder;
use KgBot\Builders\SupplierBuilder;
use KgBot\Builders\Variation\VariationBuilder;
use KgBot\Utils\Request;

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
     * @return \KgBot\Builders\SupplierBuilder
     */
    public function suppliers()
    {
        return new SupplierBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\LocationBuilder
     */
    public function locations()
    {
        return new LocationBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\ProductBuilder
     */
    public function products()
    {
        return new ProductBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\LotBuilder
     */
    public function lots()
    {
        return new LotBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\ProductGroupBuilder
     */
    public function productGroups()
    {
        return new ProductGroupBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\Variation\VariationBuilder
     */
    public function variations()
    {
        return new VariationBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\OrderBuilder
     */
    public function orders()
    {
        return new OrderBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\CustomerBuilder
     */
    public function customers()
    {
        return new CustomerBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\CustomerGroupBuilder
     */
    public function customerGroups()
    {
        return new CustomerGroupBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\InventoryMovementBuilder
     */
    public function inventory_movements()
    {
        return new InventoryMovementBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\InventoryAdjustmentBuilder
     */
    public function inventory_adjustments()
    {
        return new InventoryAdjustmentBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\EmployeeBuilder
     */
    public function employees()
    {
        return new EmployeeBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\PaymentTermBuilder
     */
    public function paymentTerms()
    {
        return new PaymentTermBuilder( $this->request );
    }

    /**
     * @return \KgBot\Builders\ProductionOrderBuilder
     */
    public function production_orders()
    {
        return new ProductionOrderBuilder( $this->request );
    }
}