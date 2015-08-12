<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'User management';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h2>User management</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(count($lst) > 0){
                    $count = 1;
                    foreach($lst as $item){
                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $item->username ?></td>
                            <td>
                                <?=Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['user/preview', 'id'=>$item->id] ) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-edit"></span>', ['user/edit', 'id'=>$item->id]) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-remove"></span>',['user/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                }
            ?>

            </tbody>
        </table>
        <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Create new',['user/create'], ['class' => 'btn btn-success pull-right']) ?>
    </div>
</div>
