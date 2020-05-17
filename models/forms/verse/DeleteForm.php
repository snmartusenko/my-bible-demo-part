<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 13.04.2018
 * Time: 17:32
 */

namespace app\models\forms\verse;

use app\models\Verse;
use yii\base\Model;

class DeleteForm extends  Model
{
    public $id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id'], 'required'],
        ];
    }

    /**
     * @return bool|null
     */
    public function delete(){

        if (!$this->validate()) {
            return null;
        }

        $model = Verse::findOne(['Z_PK' => $this->id]);

        if (!$model){
            $this->addError('id' , 'Verse is not found');
            return null;
        }

        if ($model->delete()) {
            return true;
        }

        if ($model->getErrors()) {
            $this->addErrors($model->getErrors());
        }

        return null;
    }
}