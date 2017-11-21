<?php
namespace mhndev\searchitClient\Object;

use mhndev\searchitClient\Contract\iSearchableItem;

/**
 * Class SearchableItem
 * @package mhndev\searchitClient\Object
 */
class SearchableItem implements iSearchableItem
{

    /**
     * searchable_item identifier
     *
     * you should use this identifier while you're inserting searchable items
     *
     * @return mixed
     */
    function getIdentifier()
    {
        // TODO: Implement getIdentifier() method.
    }

    /**
     * get searchable_type name related to this searchable_item
     * e.x. user or post
     *
     * @return string
     */
    function getType()
    {
        // TODO: Implement getType() method.
    }

    /**
     * entity array
     * e.x.
     *
     *    "entity": {
     *        "id" : 12,
     *        "name":"Majid Abdolhosseini",
     *        "username" :"mhndev"
     *        "bio" :"web developer"
     *     },
     * @return array
     */
    function getEntityArray()
    {
        // TODO: Implement getEntityArray() method.
    }

    /**
     * If this searchable item relates to a searchable type which support autocomplete (tags)
     * this field return tags which this item has
     *
     * for search as you type (autocomplete) you should add any tag which you want this item tags
     * to be suggested
     *
     * consider this is a prefix match (this is not true for search (JUST FOR AUTOCOMPLETE ))
     * so for example if you want to both return result for [ ma , maj, ab, abd ]
     * you should add following tags for your entity
     * [majid, abdolhosseini]
     *
     *
     * @return array
     */
    function getTags()
    {
        // TODO: Implement getTags() method.
    }
}
