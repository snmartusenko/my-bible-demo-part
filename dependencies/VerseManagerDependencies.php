<?php

namespace app\dependencies;

use app\common_interfaces\IRepo;
use app\managers\VerseManager;
use app\models\Verse;

class VerseManagerDependencies
{
    public function build()
    {
        return \Yii::createObject(VerseManager::class, [
            \Yii::createObject(Verse::class)
        ]);
    }
}