<?php

namespace app\controllers;

use app\models\MyCustomer;
use yii\rest\Controller;

class CustomerController extends Controller
{

    public function actionIndex()
    {
       $customers = MyCustomer::find()->all();
       echo '<pre>';
       var_dump($customers);
       echo '</pre>';
    }

    public function actionView($id=1)
    {
//        MyCustomer::find()->where("id = ".$id);
//
//       $customer =  MyCustomer::find()->where("id= :id", [
//            'id' => $id
//        ])->one();
        $customer = MyCustomer::findOne($id);
        echo '<pre>';
        var_dump($customer->username);
        echo '</pre>';
    }

    public function actionSave()
    {
        $customer = new MyCustomer();
       // $customer->username = 'max';
        $customer->email = 'max@eaxmple.com';
       if($customer->save()){
           echo '<pre>';
           var_dump('SUCCES');
           echo '</pre>';
       }else{
           echo '<pre>';
           var_dump('FAIL', $customer->errors);
           echo '</pre>';
       };
    }

    public function actionUpdate($id)
    {
        $customer = MyCustomer::findOne($id);
        $customer->email = 'mail@mail.com';
        if($customer->save()){
            echo '<pre>';
            var_dump('SUCCES');
            echo '</pre>';
        }else{
            echo '<pre>';
            var_dump('FAIL', $customer->errors);
            echo '</pre>';
        };
    }

    public function actionDelete($id)
    {
        $customer = MyCustomer::findOne($id);
        if( $customer->delete($id)){
            echo '<pre>';
            var_dump('SUCCES');
            echo '</pre>';
        }else{
            echo '<pre>';
            var_dump('FAIL', $customer->errors);
            echo '</pre>';
        };
    }

}