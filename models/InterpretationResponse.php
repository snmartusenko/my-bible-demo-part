<?php

namespace app\models;

use app\common_abstractions\AbstractEntityResponse;

class InterpretationResponse extends AbstractEntityResponse
{
    public function buildResponse($object)
    {
        $response = [];

        $response['id'] = intval($object['Z_PK']);
        $response['content'] = $object['ZVALUE'];

        return $response;
    }

}