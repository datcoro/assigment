<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'User Preview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

	<h2>User Preview</h2>
    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'line-form']); ?>
                <?= $form->field($model, 'id')->hiddenInput(['name'=>'id'])->label(false) ?>
                <?= $form->field($model, 'record_status')->textInput(['disabled'=>true])?>
                <?= $form->field($model, 'username')->textInput(['disabled'=>true]) ?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
