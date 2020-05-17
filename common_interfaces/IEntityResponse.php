<?php

namespace app\common_interfaces;

/**
 * Interface IEntityResponse
 * @package app\common_interfaces
 */
interface IEntityResponse
{
    public function buildResponse($object);

    public function getResponse();

}