<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 1.4.18.
 * Time: 00.02
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Builders\ProductPricesBuilder;
use KgBot\Billy\Utils\Model;

class Product extends Model
{
    protected $entity     = 'products';
    protected $primaryKey = 'id';

    public function prices()
    {
        return ( new ProductPricesBuilder( $this->request ) )->get( [

            [ 'productId', '=', $this->{$this->primaryKey} ],
        ] );
    }
}