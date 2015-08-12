<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Line';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h2>Line management</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Line Name</th>
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
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
                            <td><?= $item->start_time ?></td>
                            <td><?= $item->end_time ?></td>
                            <td><?= Html::img($item->image, ['class'=>'img']) ?></td>
                            <td>
                                <?=Html::a('Xem',['line/preview', 'id'=>$item->id] ) ?> |
                                <?=Html::a('Sửa', ['line/edit', 'id'=>$item->id]) ?> |
                                <?=Html::a('Xóa',['line/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                }
            ?>
            <tr>
                <td colspan="7">
                    <?=Html::a('Tạo Thêm',['line/create'], ['class' => 'btn btn-success pull-right']) ?>
                </td>
            </tr>
            </tbody>
        </table>
        
    </div>
</div>
