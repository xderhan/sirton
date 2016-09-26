<?php

/* @var $this yii\web\View */

$this->title = 'Scraping Result';
?>
<div class="col-lg-6">
    <h1>Result</h1>
    <p>The scraping result</p>
    <div class="well">
        <?php foreach($data as $k => $v): ?>
            <div class="panel panel-success">
                <div class="panel-heading"><?= $k; ?>
                    <span class="badge"><?= count($v); ?></span>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php $v->each(function($node){
                            echo '<li class="list-group-item">';
                            echo $node->text();
                            echo '</li>';
                        }); ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
