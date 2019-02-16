<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 16.53
 */

namespace KgBot\Magento\Utils;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use KgBot\Magento\Exceptions\MagentoClientException;
use KgBot\Magento\Exceptions\MagentoRequestException;

class Request
{
    /**
     * @var \GuzzleHttp\Client
     */
    public $client;

    /**
     * Request constructor.
     *
     * @param null  $token
     * @param array $options
     * @param array $headers
     */
    public function __construct( $token = null, $options = [], $headers = [] )
    {
        $token   = $token ?? config( 'laravel-magento.token' );
        $headers = array_merge( [

            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ], $headers );
        $options = array_merge( [

            'base_uri' => config( 'laravel-magento.base_uri' ),
            'headers'  => $headers,
        ], $options );

        $this->client = new Client( $options );
    }

    /**
     * @param $callback
     *
     * @return mixed
     * @throws \KgBot\Magento\Exceptions\MagentoClientException
     * @throws \KgBot\Magento\Exceptions\MagentoRequestException
     */
    public function handleWithExceptions( $callback )
    {
        try {
            return $callback();

        } catch ( ClientException $exception ) {

            $message = $exception->getMessage();
            $code    = $exception->getCode();

            if ( $exception->hasResponse() ) {

                $message = (string) $exception->getResponse()->getBody();
                $code    = $exception->getResponse()->getStatusCode();
            }

            throw new MagentoRequestException( $message, $code );

        } catch ( ServerException $exception ) {

            $message = $exception->getMessage();
            $code    = $exception->getCode();

            if ( $exception->hasResponse() ) {

                $message = (string) $exception->getResponse()->getBody();
                $code    = $exception->getResponse()->getStatusCode();
            }

            throw new MagentoRequestException( $message, $code );

        } catch ( \Exception $exception ) {

            $message = $exception->getMessage();
            $code    = $exception->getCode();

            throw new MagentoClientException( $message, $code );
        }
    }
}