<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

class Good extends ActiveRecord
{
    public static function tableName()
    {
        return 'good';
    }

    public function getAllGoods(){
        $goods = Yii::$app->cache->get('goods');
        if (!$goods) {
            $goods = Good::find()->asArray()->orderBy('category')->all();
            Yii::$app->cache->set('goods', $goods, 60);

        }
        return $goods;
    }

    public function getGoodsCategories($id) {
        $catGoods = Yii::$app->cache->get('catGoods'.$id);
        if(!$catGoods) {
             $catGoods = Good::find()->where(['category' => $id])->asArray()->all();
             Yii::$app->cache->set('catGoods'.$id, $catGoods , 10);
    }
    return $catGoods;
    }

    public function getSearchResults($search) {
        $searchResults = Good::find()->where(['like', 'name',$search])->asArray()->all();
        return $searchResults;
    }



}