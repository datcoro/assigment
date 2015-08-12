<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
$this->title = 'User Update';
$this->params['breadcrumbs'][] = $this->title;
//$listData=ArrayHelper::map($showRole,'id','name');
?>
<div class="site-index">
    <h2>User Update</h2>
    <div class="table-responsive">
        <?php $form = ActiveForm::begin(['id' => 'edit-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($edit, 'id')->hiddenInput()->label(false) ?>
            <?= $form->field($edit, 'username') ?>
            <?= $form->field($edit, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
