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

class CreateForm extends  Model
{
    public $name;
    public $client_id;
    public $file;
    public $file_url;

    public function rules()
    {
        return [
            [['name', 'client_id', 'file'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['client_id'], 'number'],
        ];
    }

    /**
     * @return Verse|null
     */
    public function create()
    {
        /** @var Verse $model */
        $model = new Verse();

        if($model->load([$model->formName() => $this->attributes]) && $model->save()){
            return $model;
        }

        if($model->getErrors()){
            $this->addErrors($model->getErrors());
        }

        return null;
    }
}