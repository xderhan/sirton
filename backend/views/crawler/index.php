<?php
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Crawler';
//$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/pace.min.js');
$this->registerCssFile('@web/css/pace.css');
?>
<div class="crawler-form">
    <div class="row">
        <div class="col-lg-6">
            <h1>Content Crawler &amp; Scrapper</h1>
            <p>Please fill out the following fields to do crawling and scrapping:</p>
            <div class="well">
                <?php $form = ActiveForm::begin([
                    'options' => [
                        'data' => ['pjax' => true],
                        'class' => 'form-horizontal',
                    ],
                    'id' => 'crawler-form',
                    'action' => '/crawler/index',
                ]);
                ?>
                <fieldset>
                    <?= $form->field($model, 'link') ?>
                    <?= $form->field($model, 'params')->textArea(['rows' => '3']) ?>
                    <?= Html::submitButton('START SCRAPPING', ['class' => 'btn btn-primary btn-lg']) ?>
                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <?php Pjax::begin([
            'formSelector' => '#crawler-form',
            'id' => 'resultView'
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
