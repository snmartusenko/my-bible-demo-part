<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ZINTERPRETATION".
 *
 * @property int $Z_PK
 * @property int $Z_ENT
 * @property int $Z_OPT
 * @property int $ZORDER
 * @property int $ZVERSION
 * @property string $ZIDENTIFIER
 * @property string $ZVALUE
 */
class Interpretation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ZINTERPRETATION';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Z_ENT', 'Z_OPT', 'ZORDER', 'ZVERSION'], 'integer'],
            [['ZIDENTIFIER', 'ZVALUE'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Z_PK' => 'Z  Pk',
            'Z_ENT' => 'Z  Ent',
            'Z_OPT' => 'Z  Opt',
            'ZORDER' => 'Zorder',
            'ZVERSION' => 'Zversion',
            'ZIDENTIFIER' => 'Zidentifier',
            'ZVALUE' => 'Zvalue',
        ];
    }
}
