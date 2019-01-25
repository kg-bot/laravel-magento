<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 19.4.18.
 * Time: 01.30
 */

namespace KgBot\Models;


use KgBot\Utils\Model;

class ProductionOrder extends Model
{
    protected $entity     = 'production-orders';
    protected $primaryKey = 'number';

    public function getPDF()
    {
        return $this->request->handleWithExceptions( function () {
            return $this->request->client->get( "{$this->entity}/{$this->{$this->primaryKey}}.pdf" )->getBody()
                                         ->getContents();
        } );
    }
}
