<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/20/19
 * Time: 6:05 PM
 */

namespace app\models;


use yii\base\Model;

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
    public $id_author;

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

    public function rules()
    {
        return [
            ['title', 'string', 'max' => 150],
            [['description', 'notice'], 'string'],
            [['title', 'date_start'], 'required'],
            [['date_start', 'date_end'], 'string'], //не могу сделать валидацию в формате date
            [['is_blocked', 'repeat'], 'boolean'],
            ['id_author', 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата завершения',
            'id_author' => 'ID Автора',
            'description' => 'Описание события',
            'repeat' => 'Повтор',
            'notice' => 'Уведомление',
            'is_blocked' => 'Блокировка',
        ];
    }
}