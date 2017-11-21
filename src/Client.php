<?php
namespace mhndev\searchitClient;

use mhndev\searchitClient\Contract\iClient;
use mhndev\searchitClient\Contract\iDriver;
use mhndev\searchitClient\Contract\iSearchableItem;
use mhndev\searchitClient\Contract\iSearchableType;

/**
 * Class Client
 * @package mhndev\searchitClient
 */
class Client implements iClient
{


    /**
     * @var iDriver
     */
    protected $driver;


    /**
     * @return iDriver
     */
    function getDriver()
    {
        return $this->driver;
    }


    /**
     * @param iDriver $driver
     * @return $this
     */
    function setDriver(iDriver $driver)
    {
        $this->driver = $driver;

        return $this;
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
        return $this->getDriver()->createSearchableType(
            $type_name,
            $searchable_fields,
            $hasAutocomplete,
            $tags
        );
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
        return $this->getDriver()->getSearchableTypeByIdentifier($identifier);
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
        return $this->getDriver()->listSearchableTypes();
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
        return $this->getDriver()->insertSearchableItem($target_type, $target_id, $item, $tags);
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
        return $this->updateSearchableItem($target_type, $target_id, $item, $tags);
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
        return $this->getDriver()->search($target_types, $query, $limit, $offset);
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
        return $this->getDriver()->searchPager($target_types, $query, $page, $per_page);
    }

    /**
     * @param string $query
     * @param array $types
     * @return array
     */
    function autocomplete(string $query, array $types = [])
    {
        return $this->getDriver()->autocomplete($query, $types);
    }
}
