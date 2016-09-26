<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class CrawlerForm extends Model
{
    public $link = 'http://news.google.com/';
    public $params = 'span.titletext';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link', 'params'], 'required'],
            ['link', 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'link' => 'Site URL',
            'params' => 'Scraping Parameters'
        ];
    }
}
