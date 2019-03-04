<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/27/19
 * Time: 7:05 PM
 */

namespace app\components;


use yii\base\Component;
use yii\db\Query;
use yii\log\Logger;

class DaoComponent extends Component
{
    /**
     * @return \yii\db\Connection
     */
    public function getDb()
    {
        return \Yii::$app->db;
    }

    public function getAllUsers()
    {
        $sql = 'SELECT * FROM `users`';

        return $this->getDb()->createCommand($sql)->queryAll();
    }

    public function getActivityUser(int $id)
    {
        $sql = 'SELECT * FROM `activity` WHERE user_id =:user_id';
        return $this->getDb()->createCommand($sql, [':user_id' => $id])->queryAll();
    }

    public function getFirstActivity()
    {
        $sql = 'SELECT * FROM activity';
        return $this->getDb()->createCommand($sql)->queryOne();
    }

    public function countNoticeActivity()
    {
        $sql = 'SELECT count(id) FROM activity WHERE notice=1';
        return $this->getDb()->createCommand($sql)->queryScalar();
    }

    public function getAllActivityUser(int $id_user)
    {
        $query = new Query();

        return $query->select(['title', 'date_start', 'email'])
            ->from('activity a')
            ->innerJoin('users u', 'a.user_id=u.id')
            ->andWhere(['a.user_id' => $id_user])
            ->andWhere('date_created<=:date', [':date' => date('Y-m-d H:i:s')])
            ->orderBy(['a.id' => SORT_DESC])
            ->limit(10)
            ->all();
    }

    public function getActivityReader()
    {
        $sql = 'SELECT * FROM `users`';

        return $this->getDb()->createCommand($sql)->query();
    }

    public function insertTest()
    {
        $trans = $this->getDb()->beginTransaction();
        try {
            $this->getDb()->createCommand()->insert('activity', [
                'user_id' => 2,
                'title' => 'Заголовок 2_3',
                'date_start' => date('Y-m-d H:i:s')
            ])->execute();
            $this->getDb()->createCommand()->insert('activity', [
                'user_id' => 3,
                'title' => 'Заголовок 3_3',
                'date_start' => date('Y-m-d H:i:s')
            ])->execute();

            $trans->commit();

        } catch (\Exception $exception) {
            \Yii::getLogger()->log($exception->getMessage(), Logger::LEVEL_ERROR);
            $trans->rollBack();
        }
    }
}