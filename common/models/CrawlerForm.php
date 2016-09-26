<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class CrawlerForm extends Model
{
    public $link;
    public $params;

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
            'params' => 'Scrapping Parameters'
        ];
    }
}
