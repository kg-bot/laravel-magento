<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 17.03
 */

namespace KgBot\Magento\Utils;


use Illuminate\Support\Str;
use ReflectionObject;
use ReflectionProperty;

class Model
{
	protected $entity;
	protected $primaryKey;
	protected $modelClass = self::class;
	protected $fillable   = [];

	/**
	 * @var Request
	 */
	protected $request;

	public function __construct( Request $request, $data = [] ) {
		$this->request = $request;
		$data          = (array) $data;

		foreach ( $data as $key => $value ) {

			$customSetterMethod = 'set' . ucfirst( Str::camel( $key ) ) . 'Attribute';

			if ( !method_exists( $this, $customSetterMethod ) ) {

				$this->setAttribute( $key, $value );

			} else {

				$this->setAttribute( $key, $this->{$customSetterMethod}( $value ) );
			}
		}
	}

	protected function setAttribute( $attribute, $value ) {
		$this->{$attribute} = $value;
	}

	public function __toString() {
		return json_encode( $this->toArray() );
	}

	public function toArray() {
		$data       = [];
		$class      = new ReflectionObject( $this );
		$properties = $class->getProperties( ReflectionProperty::IS_PUBLIC );

		/** @var ReflectionProperty $property */
		foreach ( $properties as $property ) {

			$data[ $property->getName() ] = $this->{$property->getName()};
		}

		return $data;
	}

	public function delete() {
		return $this->request->handleWithExceptions( function () {

			return $this->request->client->delete( "{$this->entity}/" . urlencode( $this->{$this->primaryKey} ) );
		} );
	}

	public function update( $data = [] ) {
		$data = [
			Str::singular( $this->entity ) => $data,
		];

		return $this->request->handleWithExceptions( function () use ( $data ) {

			$response = $this->request->client->put( "{$this->entity}/" . urlencode( $this->{$this->primaryKey} ), [
				'json' => $data,
			] );

			$responseData = json_decode( (string) $response->getBody() );

			return new $this->modelClass( $this->request, $responseData );
		} );
	}

	public function getEntity() {
		return $this->entity;
	}

	public function setEntity( $new_entity ) {
		$this->entity = $new_entity;
	}
}