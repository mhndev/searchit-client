<?php
namespace mhndev\searchitClient\Object;

use mhndev\searchitClient\Contract\iSearchableType;

/**
 * Class SearchableType
 * @package mhndev\searchitClient\Object
 */
class SearchableType implements iSearchableType
{

    /**
     * searchable_type identifier
     *
     * you can do fetch (get single searchable_type) query by identifier
     * @return mixed
     */
    function getIdentifier()
    {
        // TODO: Implement getIdentifier() method.
    }

    /**
     * searchable_type name
     * e.x. user or post
     *
     * @return string
     */
    function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @return array
     */
    function getSearchableFields()
    {
        // TODO: Implement getSearchableFields() method.
    }

    /**
     * @return bool
     */
    function supportAutocomplete()
    {
        // TODO: Implement supportAutocomplete() method.
    }
}
