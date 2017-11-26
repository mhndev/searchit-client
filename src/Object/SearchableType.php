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
     * @var mixed
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $searchable_fields;

    /**
     * @var bool
     */
    protected $support_autocomplete;

    /**
     * searchable_type identifier
     *
     * you can do fetch (get single searchable_type) query by identifier
     * @return mixed
     */
    function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * searchable_type name
     * e.x. user or post
     *
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    function getSearchableFields()
    {
        return $this->searchable_fields;
    }

    /**
     * @return bool
     */
    function supportAutocomplete()
    {
        return $this->support_autocomplete;
    }
}
