<?php
namespace dvizh\review\widgets;

use yii\helpers\Html;
use yii\helpers\Url;
use dvizh\review\models\Review;
use Yii;

class ReviewList extends \yii\base\Widget
{
	public $itemId = null;
	public $limit = 200;

	public function init()
	{
		\dvizh\review\assets\Asset::register($this->getView());
	}

	public function run()
	{
        $list = Review::find()->limit($this->limit)->where(['item_id' => $this->itemId, 'active' => 'yes'])->all();
        
		return $this->render('reviews',[
			'list' => $list,
		]);
	}
}