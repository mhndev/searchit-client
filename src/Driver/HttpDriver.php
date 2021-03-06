<?php
namespace mhndev\searchitClient\Driver;

use mhndev\searchitClient\Contract\iDriver;
use mhndev\searchitClient\Contract\iSearchableItem;
use mhndev\searchitClient\Contract\iSearchableType;
use mhndev\searchitClient\iHttpConnection;

/**
 * Class HttpDriver
 * @package mhndev\searchitClient\Driver
 */
class HttpDriver implements iDriver
{

    /**
     * @var iHttpConnection
     */
    protected $connection;

    /**
     * @var string
     */
    protected $host;


    /**
     * HttpDriver constructor.
     * @param iHttpConnection $connection
     * @param string $host
     */
    function __construct(iHttpConnection $connection, string $host)
    {
        $this->connection = $connection;
        $this->host = $host;
    }


    /**
     * @return string
     */
    function getHost()
    {
        return $this->host;
    }


    /**
     * If server is http it should be like following :
     *
     * server address : e.x. http://192.168.21.10:8080
     *
     * schema://host:port
     *
     * If gateway is a database and not server then gateway should be a repository class
     *
     * @return iHttpConnection
     */
    function getGateway()
    {
        return $this->connection;
    }


    /**
     * @param string $type_name
     * @param iterable $searchable_fields
     * @param bool $hasAutocomplete
     *
     * @return iSearchableType
     */
    function createSearchableType(
        string $type_name,
        iterable $searchable_fields,
        bool $hasAutocomplete = false
    )
    {
        $response = $this->getGateway()->request($this->getEndpoint(__FUNCTION__), 'POST', [
            'headers' => [
                'content-Type' => 'application/json'
            ],

            'body' => [
                'name' => $type_name,
                'searchable_fields' => $searchable_fields,
                'autocomplete' => $hasAutocomplete
            ]
        ]);

        # if $response is successful then we should return created searchable type entity object

        return $response;

    }


    /**
     * sample api response (JSON) :
     *
     *
     *  {
     *       "identifier": "search_user",
     *       "name": "user",
     *       "autocomplete": true,
     *       "searchable_fields": [
     *           {
     *               "name": "bio",
     *               "type": "text"
     *           },
     *           {
     *               "name": "id",
     *               "type": "long"
     *           },
     *           {
     *               "name": "name",
     *               "type": "text"
     *           },
     *           {
     *               "name": "username",
     *               "type": "text"
     *           }
     *       ],
     *       "_links": {
     *           "self": {
     *               "href": "/type/search_user"
     *           }
     *       }
     *   }
     *
     * @param $identifier
     * @return iSearchableType
     */
    function getSearchableTypeByIdentifier($identifier)
    {
        $response = $this->getGateway()->request(
            $this->getEndpoint(__FUNCTION__).'/'.$identifier,
            'GET',
            [
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]
        );

        return $response;
    }

    /**
     * sample api response (JSON)
     *
     * {
     *    "count": 2,
     *    "total": 2,
     *    "_links": {
     *        "self": {
     *        "href": "/type?page=2"
     *    },
     *    "first": {
     *        "href": "/type?page=1"
     *    },
     *    "prev": {
     *       * "href": "/type?page=1"
     *    },
     *    "next": {
     *        "href": "/type?page="
     *    },
     *    "last": {
     *        "href": "/type?page=2"
     *    }
     *    },
     *   "_embedded": {
     *    "searchable_types": [
     *    {
     *             "identifier": "search_user",
     *             "name": "user",
     *             "autocomplete": true,
     *             "searchable_fields": [
     *                {
     *                   "name": "bio",
     *                   "type": "text"
     *                },
     *                {
     *                   "name": "id",
     *                   "type": "long"
     *                },
     *                {
     *                   "name": "name",
     *                   "type": "text"
     *                },
     *                {
     *                   "name": "username",
     *                   "type": "text"
     *                }
     *            ]
     *     },
     *     {
     *          "identifier": "search_post",
     *          "name": "post",
     *          "autocomplete": true,
     *          "searchable_fields": [
     *              {
     *                  "name": "body",
     *                  "type": "text"
     *              },
     *              {
     *                  "name": "id",
     *                  "type": "long"
     *              },
     *              {
     *                  "name": "title",
     *                  "type": "text"
     *              }
     *          ]
     *      }
     *
     *    ]
     *    }
     *
     * }
     *
     *
     * @return array off iSearchableType
     */
    function listSearchableTypes()
    {
        $response = $this->getGateway()->request(
            $this->getEndpoint(__FUNCTION__),
            'GET',
            [
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]
        );

        return $response;
    }

    /**
     * @param string $target_type
     * @param mixed $target_id
     * @param iSearchableItem $item
     * @param iterable $tags
     *
     * @return iSearchableItem
     */
    function insertSearchableItem(
        string $target_type,
        $target_id,
        iSearchableItem $item,
        iterable $tags = []
    )
    {
        $body = [
            'target' => $target_type,
            'target_id' => $target_id,
            'entity' => $item->getEntityArray()
        ];

        if(!empty($tags)){
            $body['tags'] = $tags;
        }

        $response = $this->getGateway()->request(
            $this->getEndpoint(__FUNCTION__),
            'POST',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
                'body' => $body
            ]
        );

        return $response;
    }

    /**
     * @param string $target_type
     * @param $target_id
     * @param iSearchableItem $item
     * @param iterable $tags
     *
     * @return iSearchableItem
     */
    function updateSearchableItem(
        string $target_type,
        $target_id,
        iSearchableItem $item,
        iterable $tags
    )
    {

        $body = [
            'target' => $target_type,
            'target_id' => $target_id,
            'entity' => $item->getEntityArray()
        ];

        if(!empty($tags)){
            $body['tags'] = $tags;
        }

        $response = $this->getGateway()->request(
            $this->getEndpoint(__FUNCTION__),
            'PUT',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
                'body' => $body
            ]
        );

        return $response;
    }

    /**
     * @param array $target_types
     * @param $query
     * @param int $limit
     * @param int $offset
     * @return array
     */
    function search(array $target_types, $query, $limit = 10, $offset = 0)
    {
        $page = (int)($offset / $limit) + 1;
        $per_page = $limit;

        $endpoint = $this->getEndpoint(__FUNCTION__).http_build_query([
            'page' => $page,
            'per_page' => $per_page
        ]);

        $response = $this->getGateway()->request(
            $endpoint,
            'GET',
            [
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]
        );

        return $response;
    }

    /**
     * @param array $target_types
     * @param $query
     * @param int $page
     * @param int $per_page
     * @return array
     */
    function searchPager(array $target_types, $query, $page = 1, $per_page = 10)
    {
        $endpoint = $this->getEndpoint(__FUNCTION__).http_build_query([
            'page' => $page,
            'per_page' => $per_page
        ]);

        $response = $this->getGateway()->request(
            $endpoint,
            'GET',
            [
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]
        );

        return $response;
    }

    /**
     * @param string $query
     * @param array $types
     * @return array
     */
    function autocomplete(string $query, array $types = [])
    {
        $endpoint = $this->getEndpoint(__FUNCTION__).
            '?'.
            http_build_query(['q' => $query, 'types' => $types])
        ;

        $response = $this->getGateway()->request(
            $endpoint,
            'GET',
            [   'headers' => [ 'Accept' => 'application/json'] ]
        );

        return $response;
    }


    /**
     * @param $function
     * @return string
     */
    function getEndpoint($function)
    {
        $endpoint = rtrim($this->getHost(),'/');

        switch ($function){
            case 'createSearchableType':
                $endpoint .= '/type';
            break;

            case 'getSearchableTypeByIdentifier':
                $endpoint  = '/type';
            break;

            case 'listSearchableTypes':
                $endpoint .= '/type';
            break;

            case 'insertSearchableItem':
                $endpoint = '/item';
            break;

            case 'updateSearchableItem':
                $endpoint = '/item';
            break;

            case 'search':
                $endpoint = '/search';
            break;

            case 'searchPager':
                $endpoint = '/search';
            break;
        }

        return $endpoint;
    }


}
