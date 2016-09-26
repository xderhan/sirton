<?php
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Scraper';
//$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/pace.min.js');
$this->registerCssFile('@web/css/pace.css');
?>
<div class="crawler-form">
    <div class="row">
        <div class="col-lg-6">
            <h1>Content Scraper</h1>
            <p>Please fill out the following fields to do scraping:</p>
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
                    <?= $form->field($model, 'params')->textArea(['rows' => '3'])
                        ->hint('Separate each item parameters with new line.') ?>
                    <?= Html::submitButton('START SCRAPING', ['class' => 'btn btn-primary btn-lg']) ?>
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
