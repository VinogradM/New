<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 02.06.2018
 * Time: 17:39
 */
//header("Content-Type: text/html; charset=UTF-8");
//
//$host = '127.0.0.1'; // адрес сервера
//$database = 'db_voting'; // имя базы данных
//$user = 'root'; // имя пользователя
//$password = 'lkzlbgkjvf@2018'; // пароль
//$port = '3300';
//
//$link = mysqli_connect($host, $user, $password, $database, $port)
//or die("Ошибка " . mysqli_error($link));
//
//mysqli_set_charset($link, "utf8");    https://t4tutorials.com/apriori-algorithm/

$mas1 = array('Milk,Tea,Cake', 'Eggs,Tea,Cold Drink', 'Milk,Eggs,Tea,Cold Drink', 'Eggs,Cold Drink', 'Juice');

//$mas2 = array('Milk', 'Tea', 'Cake', 'Cold Drink', 'Juice', 'Eggs');
$mas2 = array('Milk', 'Tea', 'Cake', 'Cold Drink', 'Juice', 'Eggs','POL', 'BOB');
set_time_limit(0);
ini_set('memory_limit', '200000M');
//ini_set('memory_limit', '-1');
ini_set('max_execution_time', 10000);
ignore_user_abort(true);
//for($i=0; $i < count($mas1); $i++){
//   $voice = $mas1[$i];
//   print($voice."<br>");
//    $pieces = explode(",", $voice);
//    for($j=0; $j < count($pieces); $j++) {
//        print($pieces[$j]."<br>");
//    }
//    echo "<br>";
//}

function pc_array_power_set($array) {
// инициализируем пустым множеством
    $results = array(array());
    foreach ($array as $element)
        foreach ($results as $combination)
            array_push($results, array_merge(array($element), $combination));
    return $results;
}


$set = array('A', 'B', 'C');
$power_set = pc_array_power_set($mas2);
//print_r($power_set);



// Создает все возможные комбинации
$possible = array();
//$first_elem = '';
//for($i=0; $i < count($mas2); $i++){
//    $first_elem = $first_elem.$mas2[$i].",";
//    for($j=$i+1; $j < count($mas2); $j++){
//        $variant = $first_elem.$mas2[$j];
//        echo $variant."<br>";
//        $possible[]=$variant;
//    }
//}
//echo "<br>";
$possible = $power_set;
//echo "<pre>";
//print_r($possible);
//echo "<pre>";
$main_mass = array();
for($i=0; $i < count($possible); $i++) {
    $value = $possible[$i];
  //  print_r($value);
    for($qw=0; $qw < count($value); $qw++) {
        $new_value = $value[$qw];
      //  echo "sdfffffffffffffd";
      //  print_r($new_value);
        $mas_of_uniq_from_value = explode(',', $new_value); // массив из компетенций 1 варианта для проверки
        for ($j = 0; $j < count($mas1); $j++) {
         //   echo "Массив из  компетенций 1 голоса" . "<br>";
            $value2 = $mas1[$j];
            $mas_of_unig_from_value2 = explode(',', $value2); // массив из компетенций 1 голоса
//            print_r($mas_of_unig_from_value2);
//            echo "<br>";
//            echo "Массив из  компетенций 1 варианта для проверки" . "<br>";
//            print_r($mas_of_uniq_from_value);
//            echo "<br>";
            for ($k = 0; $k < count($mas_of_uniq_from_value); $k++) {

                if ((in_array($mas_of_uniq_from_value[$k], $mas_of_unig_from_value2)) && ($k == count($mas_of_uniq_from_value) - 1)) { //count($mas_of_uniq_from_value)
//                    echo "why here";
//                    print($mas_of_uniq_from_value[$k] . " in ");
//                    print_r($mas_of_unig_from_value2);
//                    echo "<br>";
                    $main_mass[] = $value;
//                    echo "Сейчас массив такой :";
//                    print_r($main_mass);
                    continue;
                }

                if (in_array($mas_of_uniq_from_value[$k], $mas_of_unig_from_value2)) {
//                    echo "fantom" . "<br>";
//                    print($mas_of_uniq_from_value[$k] . " in ");
//                    print_r($mas_of_unig_from_value2);
//                    echo "<br>";
//                print($mas_of_uniq_from_value[$k]." in ".print_r($mas_of_unig_from_value2)."<br>");
                    // continue;

                } else {
                    break;
                }

            }
        }
    }
}

echo json_encode($main_mass);







