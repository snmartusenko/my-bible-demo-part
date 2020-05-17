<?php

namespace app\models;

use app\common_abstractions\AbstractEntityResponse;

class BookResponse extends AbstractEntityResponse
{
    public function buildResponse($object)
    {
        $response = [];

        $response['id'] = intval($object['Z_PK']);
        $response['order'] = intval($object['ZORDER']);
//        $response['version'] = intval($object['ZVERSION']);
        $response['code'] = intval($object['ZCODE']);
        $response['interpretation'] = intval($object['ZINTERPRETATION']);
        $response['identifier'] = intval($object['ZIDENTIFIER']);
        $response['content'] = $object['ZVALUE'];

        return $response;
    }

}