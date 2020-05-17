<?php

namespace app\common_interfaces;

/**
 * Interface IEntityManager
 * @package app\common_interfaces
 */
interface IEntityManager
{
    public function findEntityById($id);

    public function getEntity();

    public function setEntity(IRepo $repo);

    public function save();

}
