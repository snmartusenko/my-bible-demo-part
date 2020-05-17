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

class UpdateForm extends Model
{
    public $id;
    public $name;
    public $file_url;

    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'number'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @return Verse|null
     */
    public function update()
    {
        if (!$this->validate()) {
            return null;
        }

        $model = Verse::findOne(['Z_PK' => $this->id]);

        if ($model) {
            if ($model->load([$model->formName() => $this->attributes]) && $model->save()) {
                return $model;
            }

            if ($model->getErrors()) {
                $this->addErrors($model->getErrors());
            }

        } else {
            $this->addError('model', 'model not found');
        }

        return null;
    }
}