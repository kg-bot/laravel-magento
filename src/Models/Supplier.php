<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 16.48
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Utils\Model;

class Supplier extends Model
{
    public $number;
    public $company_name;

    protected $entity     = 'suppliers';
    protected $primaryKey = 'id';
    protected $fillable   = [

        "number",
        "company_name",
        "company_vat",
        "address_street",
        "address_street2",
        "address_city",
        "address_zipcode",
        "address_country",
        "contact_email",
        "contact_phone",
        "locale",
        "currency",
        "vat_zone",
        "payment_terms_id",
        "supplier_group_id",
    ];

    // @todo Change this method to use Builder also
    public function contactPersons()
    {
        return $this->request->handleWithExceptions( function () {

            $response     = $this->request->client->get( "contactPersons?contactId={$this->{$this->primaryKey}}" );
            $responseData = json_decode( (string) $response->getBody() );
            $fetchedItems = collect( $responseData );
            $items        = collect( [] );
            $pages        = $responseData->meta->paging->total;

            foreach ( $fetchedItems->values()->{'contactPersons'} as $index => $item ) {


                /** @var Model $model */
                $model = new ContactPerson( $this->request, $item );

                $items->push( $model );


            }

            return $items;
        } );
    }
}