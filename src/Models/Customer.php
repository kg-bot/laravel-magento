<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 16.48
 */

namespace KgBot\Billy\Models;


use KgBot\Billy\Builders\ContactPersonBuilder;
use KgBot\Billy\Utils\Model;

class Customer extends Model
{

    protected $entity     = 'contacts';
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

    public function contactPersons()
    {
        return ( new ContactPersonBuilder( $this->request ) )->get( [
            [ 'contactId', '=', $this->{$this->primaryKey} ],
        ] );
    }
}