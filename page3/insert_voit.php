<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 25.03.2018
 * Time: 12:28
 */
//
$host = '127.0.0.1'; // адрес сервера
$database = 'db_voting'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'lkzlbgkjvf@2018'; // пароль
$port = '3300';


//host: '127.0.0.1',
//    user: 'root',
//    password: 'lkzlbgkjvf@2018',
//    database: 'db_voting',
//    port: '3300'
$link = mysqli_connect($host, $user, $password, $database, $port)
or die("Ошибка " . mysqli_error($link));

mysqli_set_charset($link, "utf8");

//$query = "SELECT * FROM `respondent`";

$mas_voiting = array();
$mas_voiting = $_POST['mas'];
//$company = $_POST['company'];
//$prof = $_POST['prof'];
//$industry = $_POST['industry'];
//$email = $_POST['email'];
//print_r($mas_voiting);


//$query = "SELECT * FROM `respondent`";
//if ($result = mysqli_query($link, $query)) {
//
//    /* извлечение ассоциативного массива */
//    while ($row = mysqli_fetch_assoc($result)) {
//        $mas_ar[]=$row;
//    }
//}
//print_r($mas_ar);


//for($i=0;$i < count($mas_voiting) ; $i++) {
//    print_r($mas_voiting[$i] . "---");
//   $query = "INSERT INTO `test` (voite, industry, prof, company, email) VALUES ('" . $mas_voiting[$i] ."','". $industry ."','".$prof."','".$company."','".$company."')";
// //   $query = "INSERT INTO `test` (voite) VALUES ('" . $mas_voiting[$i] . "')";
//    if (!mysqli_query($link, $query)) {
//        echo(mysqli_error($link));
//    }
//}
$code_respondent = 1;
$query = "SELECT * FROM `new_copy` ORDER BY `#12` DESC LIMIT 1;";
if (!mysqli_query($link, $query)) {
    echo(mysqli_error($link));
}
if ($result = mysqli_query($link, $query)) {
//    /* извлечение ассоциативного массива */
    while ($row = mysqli_fetch_assoc($result)) {
        $company = $row['Компания'];
    $prof = $row['Профессия'];
    $industry = $row['Отрасль'];
      $email = $row['Почта_голосующего'];
      $code_respondent = $row['Код_респондента'];
   }
}

for($i=0;$i < count($mas_voiting) ; $i++) {
    // print_r($mas_voiting[$i] . "---");
    $query = "INSERT INTO `new_copy` (Код_респондента, Тип_респондента, Отрасль, Компетенция, Тип_компетенции, Профессия, Компания, Почта_голосующего) VALUES ('" . $code_respondent . "', 'Работодатель', '" . $industry . "','" . $mas_voiting[$i] . "', 'Личностная','" . $prof . "','" . $company . "','" . $email . "')";
    echo $query;
    if (!mysqli_query($link, $query)) {
        echo(mysqli_error($link));
    }
}

//
//    /* извлечение ассоциативного массива */
//    while ($row = mysqli_fetch_assoc($result)) {
//        $mas_ar[]=$row;
//    }
//}
// выполняем операции с базой данных
//$query = "INSERT INTO `test` (voite) VALUES ('dsflfdl')" ;
////mysqli_query($link, $query);
//if (!mysqli_query($link, $query)) {
//    echo(mysqli_error($link));
//}
// закрываем подключение
mysqli_close($link);
?>