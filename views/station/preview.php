<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Station Preview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">


    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'line-form']); ?>
                <?= $form->field($model, 'name')->textInput(['disabled'=>true]) ?>
                <?= $form->field($model, 'description')->textarea(['disabled'=>true]) ?>
                
                <?= Html::img($model->image)?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
