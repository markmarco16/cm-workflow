<?php

namespace app\modules\workflow\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\workflow\models\SwWorkflow;

/**
* SwWorkflowSearch represents the model behind the search form about `app\modules\workflow\models\SwWorkflow`.
*/
class SwWorkflowSearch extends SwWorkflow
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'initial_status_id'], 'safe'],
            [['created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
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
* @return ActiveDataProvider
*/
public function search($params)
{
$query = SwWorkflow::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'initial_status_id', $this->initial_status_id]);

return $dataProvider;
}
}