<?php

namespace app\common_abstractions;

use app\common_interfaces\IEntityManager;
use app\common_interfaces\IRepo;

/**
 * Class AbstractEntityManager
 * @package app\common_abstractions
 */
abstract class AbstractEntityManager implements IEntityManager
{
    protected $model;
    protected $data;

    /**
     * AbstractEntityManager constructor.
     * @param IRepo $repo
     */
    public function __construct(IRepo $repo)
    {
        $this->model = $repo;
    }

    /**
     * @return IRepo
     */
    public function getEntity()
    {
        return $this->model;
    }

    /**
     * @param IRepo $repo
     */
    public function setEntity(IRepo $repo)
    {
        $this->model = $repo;
    }

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

    /**
     * @param $id
     * @return IRepo|bool
     */
    public function findEntityById($id)
    {
        if ($model = $this->model->findOne($id)) {

            $this->model = $model;
            return $this->model;
        };

        return false;
    }

}