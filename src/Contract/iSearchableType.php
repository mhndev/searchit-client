<?php
namespace mhndev\searchitClient\Contract;

/**
 * Interface iSearchableType
 * @package mhndev\searchitClient\Contract
 */
interface iSearchableType
{

    /**
     * searchable_type identifier
     *
     * you can do fetch (get single searchable_type) query by identifier
     * @return mixed
     */
    function getIdentifier();

    /**
     * searchable_type name
     * e.x. user or post
     *
     * @return string
     */
    function getName();


    /**
     * @return array
     */
    function getSearchableFields();


    /**
     * @return bool
     */
    function supportAutocomplete();


}
