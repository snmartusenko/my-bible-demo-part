<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ZBOOK".
 *
 * @property int $Z_PK
 * @property int $Z_ENT
 * @property int $Z_OPT
 * @property int $ZORDER
 * @property int $ZVERSION
 * @property int $ZCODE
 * @property int $ZINTERPRETATION
 * @property string $ZIDENTIFIER
 * @property string $ZVALUE
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ZBOOK';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Z_ENT', 'Z_OPT', 'ZORDER', 'ZVERSION', 'ZCODE', 'ZINTERPRETATION'], 'integer'],
            [['ZIDENTIFIER', 'ZVALUE'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Z_PK' => Yii::t('app', 'Z  Pk'),
            'Z_ENT' => Yii::t('app', 'Z  Ent'),
            'Z_OPT' => Yii::t('app', 'Z  Opt'),
            'ZORDER' => Yii::t('app', 'Zorder'),
            'ZVERSION' => Yii::t('app', 'Zversion'),
            'ZCODE' => Yii::t('app', 'Zcode'),
            'ZINTERPRETATION' => Yii::t('app', 'Zinterpretation'),
            'ZIDENTIFIER' => Yii::t('app', 'Zidentifier'),
            'ZVALUE' => Yii::t('app', 'Zvalue'),
        ];
    }
}
