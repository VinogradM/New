<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 10.06.2018
 * Time: 18:29
 */
header("Content-Type: text/html; charset=UTF-8");
//
set_time_limit(0);
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 10000);
ignore_user_abort(true);

$host = '127.0.0.1'; // адрес сервера
$database = 'db_voting'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'lkzlbgkjvf@2018'; // пароль
$port = '3300';

$skills_pre = array();
$skills = array();
//var_dump($_POST['mas']);
//echo "dfdsfdsdsfdsfdfs";
$skill_pre = $_POST['mas'];
//var_dump($skills_pre);
//echo 'crbks';
for($i=0;$i<count($_POST['mas']);$i++){
    $skills[$i]=$_POST['mas'][$i];
}
//var_dump($skills);
////echo json_encode($mas_for_apriory,JSON_UNESCAPED_UNICODE);
$link = mysqli_connect($host, $user, $password, $database, $port)
or die("Ошибка " . mysqli_error($link));
//$skills = array('Знание Excel','Базовые знания SQL');

mysqli_set_charset($link, "utf8");


$prof = 'Специалист по ИС';







/////////////////////////// уникальные скилы для одной профессии





//$skills = array('Нацеленность на результат','Умение организовать и работать в команде','Базовые знания SQL','Знание Excel',
   // 'Аналитические способности','Внимательность к деталям',1,2,3,4,5,6,7 );




function pc_array_power_set($array) {
// инициализируем пустым множеством
    $results = array(array());
    foreach ($array as $element)
        foreach ($results as $combination)
            array_push($results, array_merge(array($element), $combination));
    return $results;
}

$power_set = pc_array_power_set($skills);



/////////////////////////////////////////////
// выкачали коды респондетов голосовавших за данную профессии
// подсчитали кол-во голосов
$count_skills = array();    // -=-------------  выкачали коды респондетов голосовавших за данную профессии

$query2 = "SELECT DISTINCT `Код_респондента` FROM `new` WHERE `Профессия`='$prof'";
$query_result2 = mysqli_query($link,$query2);
if (!$query_result2)
{
    die('Ошибка выполнения запроса' . mysqli_error($link));
}
while($rows = mysqli_fetch_array($query_result2))
{
    // echo "$skills[$i].' -- '.$rows[0]<br>";
    $count_skills[] = $rows[0];
}
//echo "1";
//echo "<pre>";
//print_r($count_skills);
//echo "<pre>";
//echo" adsfsdfdsffffffffffffffffffff";
//print_r($count_skills);
//echo "count ".count($count_skills);


///// All voices for this profisseion




//
//echo "voices "."<br>";
$query1 = "SELECT `Компетенция` FROM `new` WHERE `Профессия`='$prof'";

$query_result = mysqli_query($link,$query1);

if (!$query_result)
{
    die('Ошибка выполнения запроса' . mysqli_error($link));
}
//echo "$query_result";
$voices = array();

while($rows = mysqli_fetch_array($query_result))
    //Обрабатывает ряд результата запроса, возвращая
    //ассоциативный массив, численный массив или оба
{
    $voices[] = $rows[0];

}

//echo "<pre>";
//print_r($voices);
//echo "<pre>";

//
//echo "ujkjdflsdfklkdsdddddddddddddddddddddddddddd";

// фоормируем массив голосов ( каждый элемент - набор компетенций )
$mas_of_every_voice = array();
$mas_of_every_ = array();
for($i=0; $i < count($count_skills); $i++) {
    $query1 = "SELECT `Компетенция` FROM `new` WHERE `Код_респондента`='$count_skills[$i]'";

    $query_result = mysqli_query($link, $query1);

    if (!$query_result) {
        die('Ошибка выполнения запроса' . mysqli_error($link));
    }
//echo "$query_result";
    $string='';
    while ($rows = mysqli_fetch_array($query_result))
        //Обрабатывает ряд результата запроса, возвращая
        //ассоциативный массив, численный массив или оба
    {
//        print($count_skills[$i]);
//        print_r($rows[0]);
//        $mas_of_every_[$count_skills[$i]] = $rows[0];
        $string = $string.$rows[0].";";
    }
    $mas_of_every_voice[] = $string;
}
//echo "LAST!1111111111111111111111111111111111111111111111111";
//echo "<pre>";
//print_r($mas_of_every_voice);
////print_r($mas_of_every_);
//echo "<pre>";
//echo json_encode($mas_of_every_voice,JSON_UNESCAPED_UNICODE);





















$after_possible = array();

$v = array();
for ($i=0; $i < count($power_set);$i++){
    $v = $power_set[$i];
    //print_r($v);
    $st='';
    for ($j=0; $j < count($v);$j++){
        if ($j == count($v) - 1) {
            $st = $st.$v[$j];
        } else {
            $st = $st.$v[$j].';';
        }
       // echo $st.'<br>';
    }
    $after_possible[]= $st;
}
//echo "   after    ";
//echo"<pre>";
//print_r($after_possible);
//echo"<pre>";
//echo "nexxt step"."<br>";




$main_mass = array();
$alone = true;
for($i=0; $i < count($after_possible); $i++) {
    $value = $after_possible[$i];
  //  echo "Stroka iz randoma ".'<br>';
   // echo $value."<br>";

//    for($qw=0; $qw < count($value); $qw++) {
//        $new_value = $value[$qw];
//        echo "sdfffffffffffffd";
//        print_r($new_value);
    // есть ли в троке запятіе
    $pos = strrpos($value, ";");
    if ($pos === false) { // обратите внимание: три знака равенства
        // не найдено...
    }
    // create the mas from the string
    $mas_of_uniq_from_value = explode(';', $value); // массив из компетенций 1 варианта для проверки

    for ($j = 0; $j < count($mas_of_every_voice); $j++) {
      //  echo "Массив из  компетенций 1 голоса" . "<br>";
        $value2 = $mas_of_every_voice[$j];
        $mas_of_unig_from_value2 = explode(';', $value2); // массив из компетенций 1 голоса
//        print_r($mas_of_unig_from_value2);
//        echo "<br>";
//        echo "Массив из  компетенций 1 варианта для проверки" . "<br>";
//        print_r($mas_of_uniq_from_value);
//        echo "<br>";
        // created the mas from voices


        for ($k = 0; $k < count($mas_of_uniq_from_value); $k++) {

            if ((in_array($mas_of_uniq_from_value[$k], $mas_of_unig_from_value2)) && ($k == count($mas_of_uniq_from_value) - 1)) { //count($mas_of_uniq_from_value)
//                echo "why here";
//                print($mas_of_uniq_from_value[$k] . " in ");
//                print_r($mas_of_unig_from_value2);
//                echo "<br>";
                //$string1 = '';
//                    for($t=0;$t < count($value); $t++) {
//                       // $string1 = $string1.$value[$t].',';
//                        if($t == count($value)-1){
//                            $string1 = $string1.$value[$t];
//                        }
//                        else{
//                            $string1 = $string1.$value[$t].',';
//                        }
//                    }
                //$main_mass[] = $string1;
                $main_mass[] = $value;
//                echo "Сейчас массив такой :";
//                print_r($main_mass);
                continue;
            }

            if (in_array($mas_of_uniq_from_value[$k], $mas_of_unig_from_value2)) {
//                echo "fantom" . "<br>";
//                print($mas_of_uniq_from_value[$k] . " in ");
//                print_r($mas_of_unig_from_value2);
//                echo "<br>";
//                print($mas_of_uniq_from_value[$k]." in ".print_r($mas_of_unig_from_value2)."<br>");
                // continue;

            } else {
                break;
            }

        }
        // }
    }
}

//echo "<pre>";
//print_r($main_mass);
//echo "<pre>";




/// вставка в таблицу для быстрого подсчета
for($i=0; $i < count($main_mass); $i++) {
    if ($main_mass[$i] !== '') {
        $query1 = "INSERT INTO interval_table (`Компетенция`) VALUES ('$main_mass[$i]');";

        $query_result = mysqli_query($link, $query1);

        if (!$query_result) {
            die('Ошибка выполнения запроса' . mysqli_error($link));
        }
    }
}

//echo json_encode($main_mass, JSON_UNESCAPED_UNICODE);


$mas_of_power = array();
for ($i=0; $i < count($skills); $i++) {
    $query2 = "SELECT COUNT(`Компетенция`) FROM `interval_table` WHERE `Компетенция`='$skills[$i]'";
    $query_result2 = mysqli_query($link, $query2);
    if (!$query_result2) {
        die('Ошибка выполнения запроса' . mysqli_error($link));
    }
    while ($rows = mysqli_fetch_array($query_result2)) {
        // echo "$skills[$i].' -- '.$rows[0]<br>";
       // $mas_of_power[][$skills[$i]] = $rows[0];
        $mas_of_power[$i]['Набор'] =$skills[$i];
        $mas_of_power[$i]['Мощность'] =$rows[0];
    }
}
//echo "<pre>";
//print_r($mas_of_power);
//echo "<pre>";
arsort($mas_of_power);
echo json_encode($mas_of_power, JSON_UNESCAPED_UNICODE);
