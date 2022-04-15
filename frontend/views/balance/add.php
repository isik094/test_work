<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AddBalance */

$this->title = 'Пополнить баланс';

?>
<div class="history-of-balance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="history-of-balance-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php // $form->field($model, 'organization_id')->textInput() ?>

        <?= $form->field($model, 'amount')->textInput() ?>

        <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>


        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>