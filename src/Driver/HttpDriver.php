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
     * HttpDriver constructor.
     * @param iHttpConnection $connection
     */
    function __construct(iHttpConnection $connection)
    {
        $this->connection = $connection;
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
     * @return mixed
     */
    function getGateway()
    {
        // TODO: Implement getGateway() method.
    }


    /**
     * @param string $type_name
     * @param iterable $searchable_fields
     * @param bool $hasAutocomplete
     * @param iterable $tags
     *
     * @return iSearchableType
     */
    function createSearchableType(
        string $type_name,
        iterable $searchable_fields,
        bool $hasAutocomplete = false,
        iterable $tags = []
    )
    {
        // TODO: Implement createSearchableType() method.
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
        // TODO: Implement getSearchableTypeByIdentifier() method.
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
        // TODO: Implement listSearchableTypes() method.
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
        // TODO: Implement insertSearchableItem() method.
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
        // TODO: Implement updateSearchableItem() method.
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
        // TODO: Implement search() method.
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
        // TODO: Implement searchPager() method.
    }

    /**
     * @param string $query
     * @param array $types
     * @return array
     */
    function autocomplete(string $query, array $types = [])
    {
        // TODO: Implement autocomplete() method.
    }


}
