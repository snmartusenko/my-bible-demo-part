<?php

namespace app\models;

use app\common_interfaces\IRepo;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "ZVERSE".
 *
 * @property int $Z_PK
 * @property int $Z_ENT
 * @property int $Z_OPT
 * @property int $ZCHAPTER
 * @property int $ZNUMBER
 * @property int $ZBOOK
 * @property int $ZKEYWORDS
 * @property string $ZIDENTIFIER
 * @property string $ZVALUE
 */
class Verse extends ActiveRecord implements IRepo
{
    public $id;
    public $chapter;
    public $number;
    public $book;
    public $content;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ZVERSE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book', 'chapter', 'number', 'content'], 'required'],
            [['Z_ENT', 'Z_OPT', 'ZCHAPTER', 'ZNUMBER', 'ZBOOK', 'ZKEYWORDS'], 'integer'],
            [['ZIDENTIFIER', 'ZVALUE'], 'string'],
            [['id', 'book', 'chapter', 'number'], 'integer'],
            [['content'], 'string'],
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
            'ZCHAPTER' => Yii::t('app', 'Zchapter'),
            'ZNUMBER' => Yii::t('app', 'Znumber'),
            'ZBOOK' => Yii::t('app', 'Zbook'),
            'ZKEYWORDS' => Yii::t('app', 'Zkeywords'),
            'ZIDENTIFIER' => Yii::t('app', 'Zidentifier'),
            'ZVALUE' => Yii::t('app', 'Zvalue'),
        ];
    }
}
