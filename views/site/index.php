<?php

/** @var yii\web\View $this */
use yii\helpers\Html;

/** @var $products*/
?>
<div class="site-index">
<h1>Заголовок</h1>
        <?php foreach ($products as $product): ?>
            <li>
                <?= Html::encode($product['name']) ?>
                <?= Html::encode($product['price']) ?>
            </li>
        <?php endforeach; ?>

</div>
