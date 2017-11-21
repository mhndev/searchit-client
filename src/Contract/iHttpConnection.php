<?php
namespace mhndev\searchitClient;

/**
 * Interface iHttpConnection
 * @package mhndev\searchitClient
 */
interface iHttpConnection
{

    /**
     * @param string $uri
     * @param string $method
     * @param array $options
     * @return mixed
     */
    function request(string $uri, $method = 'GET', array $options);

}
