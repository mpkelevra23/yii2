<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/20/19
 * Time: 6:05 PM
 */

namespace app\models;


use yii\web\UploadedFile;

class Activity extends ActivityBase
{
    /**
     * @var UploadedFile file attribute
     */
    public $files;

    public function beforeValidate()
    {
        if (!empty($this->date_start)) {
            $time = strtotime($this->date_start);
            $this->date_start = date('Y-m-d', $time);
        }

        if (empty($this->date_end)) {
            $this->date_end = $this->date_start;
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return array_merge([
            ['title', 'string', 'max' => 150],
            [['description', 'notice'], 'string'],
            [['title', 'date_start',], 'required'],
            [['date_start', 'date_end'], 'date', 'format' => 'php:Y-m-d'],
            [['is_blocked', 'repeat'], 'boolean'],
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'checkExtensionByMimeType' => false, 'maxFiles' => 5]
        ], parent::rules());
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата завершения',
            'id_user' => 'ID Автора',
            'description' => 'Описание события',
            'repeat' => 'Повтор',
            'notice' => 'Уведомление',
            'is_blocked' => 'Блокировка',
        ];
    }
}