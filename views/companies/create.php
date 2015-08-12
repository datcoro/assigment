<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Companies Create';
$this->params['breadcrumbs'][] = $this->title;
$listData=ArrayHelper::map($listLine,'id','username');
    
?>
<?=Html::hiddenInput('dropdownSelectedId',$currentLine, ['elementId' => 'companies-user_id']) ?>
<div class="site-contact">
    <h2>Companies Create</h2>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'companies-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'user_id')->dropDownList($listData) ?>
            <?= $form->field($model, 'description')->textarea() ?>
            <?= $form->field($model, 'file')->fileInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>