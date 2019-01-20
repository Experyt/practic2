<?=\app\widgets\MenuWidget::widget() ?>
<?use yii\helpers\Url;?>
<?use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Главная страница';?>

<div class="container">
    <div class="row">
        <title><h2><?= Html::encode($this->title) ?></h2></title>
        <?
            foreach ($goods as $good) {
        ?>

        <div class="col-4">
            <div class="product">
                <div class="product-img">
                    <img src="/img/<?=$good['img'] ?>" alt="<?=$good['name'] ?>">
                </div>
                <div class="product-name"> <?=$good['name'] ?></div>
                <div class="product-descr">Состав: <?=$good['composition'] ?></div>
                <div class="product-price">Цена: <?=$good['price'] ?></div>
                <div class="product-buttons">
                    <a href="#" data-name="<?=$good['link_name']?>" class="product-button__add btn btn-success">Заказать</a>
                    <a href="<?=Url::to(['good/index', 'name'=>$good['link_name']]) ?>" type="button" class="product-button__more btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
        <? } ?>
    </div>
</div>