<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveQuery;

/**
 * VerseSearch represents the model behind the search form of `app\models\Verse`.
 */
class VerseSearch extends Verse
{
    /** @var int $interpretation */
    public $interpretation;

    /** @var int $book */
    public $book;

    /** @var int $chapter */
    public $chapter;

    /** @var int $number */
    public $number;

    /** @var string $content */
    public $content;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        /*return [
            [['Z_PK', 'Z_ENT', 'Z_OPT', 'ZCHAPTER', 'ZNUMBER', 'ZBOOK', 'ZKEYWORDS'], 'integer'],
            [['ZIDENTIFIER', 'ZVALUE'], 'safe'],
        ];*/
        return [
            [['interpretation', 'book', 'chapter', 'number'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveQuery
     */
    public function search($params)
    {
        $query = Verse::find();

        // add conditions that should always apply here

        /*$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);*/

        $this->load([$this->formName() => $params]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return null;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'Z_PK' => $this->Z_PK,
            'Z_ENT' => $this->Z_ENT,
            'Z_OPT' => $this->Z_OPT,
            'ZCHAPTER' => $this->ZCHAPTER,
            'ZNUMBER' => $this->ZNUMBER,
            'ZBOOK' => $this->ZBOOK,
            'ZKEYWORDS' => $this->ZKEYWORDS,
        ]);*/

        if ($this->interpretation){
            $query->leftJoin(Book::tableName(), 'ZBOOK.Z_PK = ZVERSE.ZBOOK');
            $query->andWhere([Book::tableName() .'.'. 'ZINTERPRETATION' => $this->interpretation]);
        }

        if ($this->book){
            $query->andWhere([Verse::tableName() .'.'. 'ZBOOK' => $this->book]);
        }

        if ($this->chapter){
            $query->andWhere([Verse::tableName() .'.'. 'ZCHAPTER' => $this->chapter]);
        }

        if ($this->number){
            $query->andWhere([Verse::tableName() .'.'. 'ZNUMBER' => $this->number]);
        }

        if ($this->content) {
            $query->andWhere(['like', Verse::tableName() .'.'. 'ZVALUE', $this->content]);
        }

//        return $dataProvider;
        return $query;
    }
}
