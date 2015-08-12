<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Companies management';
?>
<div class="site-index">
    <h2>Companies management</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Companies Name</th>
                <th>Description</th>
				<th>Image</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(count($listLine) > 0){
                    $count = 1;
                    foreach($listLine as $item){
                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $item->name ?></td>      
                         <td><?= $item->description ?></td>
						 <td><?= Html::img($item->image, ['class'=>'thumbnails']) ?></td>
                            <td>
                                <?=Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['companies/preview', 'id'=>$item->id] ) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-edit"></span>', ['companies/edit', 'id'=>$item->id]) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-remove"></span>',['companies/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                }
            ?>
            <tr>
                <td colspan="6">
                    <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Create new',['companies/create'], ['class' => 'btn btn-success pull-right']) ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
