<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/20/19
 * Time: 6:05 PM
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class Activity extends Model
{
    /**
     * Название события
     *
     * @var string
     */
    public $title;

    /**
     * День начала события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $date_start;

    /**
     * Почта
     *
     * @var string
     */
    public $email;

    /**
     * День завершения события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $date_end;

    /**
     * ID автора, создавшего событие
     *
     * @var string
     */
    public $id_user;

    /**
     * Описание события
     *
     * @var string
     */
    public $description;

    /**
     * Повтор события
     *
     * @var bool
     */
    public $repeat;


    /**
     * Уведомление
     *
     * @var string
     */
    public $notice;

    /**
     * Блокировка
     *
     * @var bool
     */
    public $is_blocked;

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

        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            ['title', 'string', 'max' => 150],
            ['email', 'email'],
            [['description', 'notice'], 'string'],
            [['title', 'date_start', 'email'], 'required'],
            [['date_start', 'date_end'], 'date', 'format' => 'php:Y-m-d'],
            [['is_blocked', 'repeat'], 'boolean'],
            ['id_author', 'integer'],
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'checkExtensionByMimeType' => false, 'maxFiles' => 5]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'email' => 'Email',
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