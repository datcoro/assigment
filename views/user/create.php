<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'User Create';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h2>User Create</h2>
    <div class="table-responsive">
                    
        <?php if(isset($msg)){
            ?>
            <label><?=$msg?></label>
            <?php
        }
        ?>
        
        <?php $form = ActiveForm::begin(['id' => 'user-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($user, 'username') ?>
            <?= $form->field($user, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
