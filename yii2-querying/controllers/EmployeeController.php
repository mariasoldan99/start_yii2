<?php
namespace app\controllers;


use app\models\Employee;
use app\models\Salary;
use yii\db\Query;
use yii\web\Controller;

class EmployeeController extends Controller
{
public function actionIndex()
{
$data = $this->queryData();

return $this->printTable($data);
}

private function queryData($id = '10001')
{
return Salary::find()
->select(['*', 'AVG(salary) as avg_salary'])
->groupBy('emp_no')
->having('AVG(salary) > 60000')
->orderBy('AVG(salary)')
->limit(10)
   // ->offset(10) //will return the next 10 elements
->asArray()
->all();


//    return (new Query())
//        -> select('*')
//        ->from('departments')
//        ->all();
//
//    return (new Query())
//        -> select(['dept_no', 'dept_name'])
//        ->from('departments')
//        ->all();



//return Employee::find()
//->select(["CONCAT(first_name, ' ', last_name) as full_name"])
//->limit(10)
//->where([
//    'emp_no' => ['10001', '10002','10003', '10004']
//])
//->andWhere(['gender' => 'M'])
////->offset(10)
//->asArray()
//->all();

}

private function printTable($data)
{
$content = '<table class="table">';
    foreach ($data as $datum) {
    $content .= "<tr>";
        foreach ($datum as $key => $value) {
        $content .= "<td>$value</td>";
        }
        $content .= "</tr>";
    }
    $content .= '</table>';
return $this->renderContent($content);
}
}