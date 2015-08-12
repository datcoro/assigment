<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Companies Preview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <h2>Companies Preview</h2>
    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'line-form']); ?>
                <?= $form->field($model, 'id')->hiddenInput(['name'=>'id'])->label(false) ?>
                <?= $form->field($model, 'record_status')->hiddenInput(['name'=>'id'])->label(false) ?>
                <?= $form->field($model, 'name')->textInput(['disabled'=>true]) ?>
                <?= $form->field($model, 'description')->textarea(['disabled'=>true]) ?>
               
                <?= Html::img($model->image)?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
