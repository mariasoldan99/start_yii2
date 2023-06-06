<?php

namespace app\controllers;

use yii\db\Connection;
use yii\db\Expression;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
//       $db = new Connection([
//            'dsn' => 'mysql:host=localhost;dbname=yii2basic',
//            'username' => 'root1',
//            'password' => 'zR5sG/rAaSvQ*r-E',
//            'charset' => 'utf8mb4',
//            'tablePrefix' => ''
//        ]);
//       var_dump($db);

         $db = \Yii::$app->db;
        $users = $db->createCommand("SELECT * FROM user")->queryAll(); //this is for all
        echo '<pre>';
        var_dump($users);
        echo '</pre>';
        return "List if users";
    }

    public function actionView($id)
    {
        $db = \Yii::$app->db;
        $user = $db->createCommand('SELECT * FROM user WHERE id=:id')->bindValue('id',$id)->queryOne();
        echo '<pre>';
        var_dump($user);
        echo '</pre>';
        return "User";
    }

    public function actionCreate()
    {
        $db = \Yii::$app->db;
        $db->createCommand()->insert('user',[
            'username' => 'user1',
            'email' => 'null',
            'status' => 1
        ])->execute();
        return 'User created';
    }

    public function actionUpdate()
    {
        $db = \Yii::$app->db;
//        $db->createCommand()->update('user', [
//            'email' => 'user1@example.com'
//        ], [
//            'id' => 5,
//        ])->execute();
        $db->createCommand()->update('user', [
            'email' => new Expression('CONCAT(username, \'@email.test\')')
        ], [
            'email' => null
        ])->execute();
        return "User updated";
    }

    public function actionDelete($id)
    {
        $db = \Yii::$app->db;
        $db->createCommand()->delete('user', 'id = :id', [
            'id' => $id
        ])->execute();
        return "User deleted";
    }
    public function actionUpsert() // will be update if exist
    {
        $db = \Yii::$app->db;
        $db->createCommand()->upsert('user', [
            'username' => 'john',
            'email' => 'john.doe@example.com'
        ], [
            'email' => 'john.doe@example.com'
        ])->execute();
    }

    public function actionQuoting()
    {
        $db = \Yii::$app->db;
        // SELECT `username` from `user`
        // SELECT IFNULL(`email`, `username`) FROM `user`;

        $db->createCommand("SELECT IFNULL([[email]], [[username]]) FROM {{user}}")->execute();
    }
}