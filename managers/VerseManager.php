<?php

namespace app\managers;

use app\common_abstractions\AbstractEntityManager;
use app\common_interfaces\IEntityManager;
use app\models\Verse;

/**
 * Class VerseManager
 * @package app\managers\
 */
class VerseManager extends AbstractEntityManager
{
    public function save()
    {
        /** @var Verse $model */
        $model = $this->model;

        if ($model->load($this->getData(), '') && $model->validate())
        {
            $this->loadFields();
            if ($model->save()){
                return $model;
            }
        }

        return false;
    }

    private function loadFields()
    {
        /** @var Verse $model */
        $model = $this->model;

        $model->ZBOOK = $model->book;
        $model->ZCHAPTER = $model->chapter;
        $model->ZNUMBER = $model->number;
        $model->ZVALUE = $model->content;
    }


}