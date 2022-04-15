<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

/**
 * @brief Страница вывода организации, у которой будет увеличен или уменьшин баланс.
 * @var $organization;
 */
?>
<h1><?= $organization->name ?></h1>
<h5><?= $organization->description ?></h5>
<span><?= Html::a('Добавьте баланс организации', ['balance/add', 'id' => $organization->id], ['class' => 'add-link']) ?></span><br>
<span><?= Html::a('Уменьшить баланс организации', ['balance/decrease', 'id' => $organization->id], ['class' => 'add-link']) ?></span>
