<?php

namespace app\models;

use app\common_abstractions\AbstractEntityResponse;

class VerseResponse extends AbstractEntityResponse
{
    public function buildResponse($object)
    {
        $response = [];

        $response['id'] = intval($object['Z_PK']);
        $response['book'] = intval($object['ZBOOK']);
        $response['chapter'] = intval($object['ZCHAPTER']);
        $response['number'] = intval($object['ZNUMBER']);
        $response['content'] = $object['ZVALUE'];

        return $response;
    }

}