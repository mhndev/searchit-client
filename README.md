## Searchit Client (SDK)

#### Work in progress
###### Don't use it in production (is not production ready)

#### Sample usage :

```php


namespace mhndev\searchitClient
{

    use GuzzleHttp\Client;

    /**
     * Class HttpGuzzle
     * @package mhndev\searchitClient
     */
    class HttpGuzzle implements iHttpConnection
    {

        /**
         * @var Client
         */
        protected $guzzleClient;

        /**
         * HttpGuzzle constructor.
         * @param Client $guzzleClient
         */
        function __construct(Client $guzzleClient)
        {
            $this->guzzleClient = $guzzleClient;
        }

        /**
         * @param string $uri
         * @param string $method
         * @param array $options
         * @return mixed
         */
        function request(string $uri, $method = 'GET', array $options)
        {
            return $this->guzzleClient->request($method, $uri, $options);
        }
    }
}



namespace
{

    use GuzzleHttp\Client as GuzzleClient;
    use mhndev\searchitClient\Client;
    use mhndev\searchitClient\Driver\HttpDriver;
    use mhndev\searchitClient\HttpGuzzle;

    $httpConnection = new HttpGuzzle(new GuzzleClient());

    $httpDriver = new HttpDriver($httpConnection);

    $searchitClient = (new Client())->setDriver($httpDriver);

    $list = $searchitClient->listSearchableTypes();


    var_dump($list);die();
}


```
