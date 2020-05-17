<?php

namespace app\common_abstractions;

use app\common_interfaces\IEntityResponse;

abstract class AbstractEntityResponse implements IEntityResponse
{
    protected $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


    public function getResponse()
    {
        if (is_array($this->data)) {

            $collect = [];
            foreach ($this->data as $object) {
               $collect[] = $this->buildResponse($object);
            }
            return $collect;
        }

        return $this->buildResponse($this->getData());
    }


}