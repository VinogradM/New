<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 03.06.2018
 * Time: 18:02
 */

header("Content-Type: text/html; charset=UTF-8");
//
$host = '127.0.0.1'; // адрес сервера
$database = 'db_voting'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'lkzlbgkjvf@2018'; // пароль
$port = '3300';

$link = mysqli_connect($host, $user, $password, $database, $port)
or die("Ошибка " . mysqli_error($link));

mysqli_set_charset($link, "utf8");


$prof = 'Системный аналитик';

$mas_of_skills = array();
$query2 = "SELECT DISTINCT `Компетенция` FROM `interval_table`";// WHERE `Профессия`='$prof'";
$query_result2 = mysqli_query($link,$query2);
if (!$query_result2)
{
    die('Ошибка выполнения запроса' . mysqli_error($link));
}
while($rows = mysqli_fetch_array($query_result2))
{
    // echo "$skills[$i].' -- '.$rows[0]<br>";
    $mas_of_skills[] = $rows[0];
}

echo "<pre>";
print_r($mas_of_skills);
echo "<pre>";


$mas_of_power = array();
for ($i=0; $i < count($mas_of_skills); $i++) {
    $query2 = "SELECT COUNT(`Компетенция`) FROM `interval_table` WHERE `Компетенция`='$mas_of_skills[$i]'";
    $query_result2 = mysqli_query($link, $query2);
    if (!$query_result2) {
        die('Ошибка выполнения запроса' . mysqli_error($link));
    }
    while ($rows = mysqli_fetch_array($query_result2)) {
        // echo "$skills[$i].' -- '.$rows[0]<br>";
        $mas_of_power[$mas_of_skills[$i]] = $rows[0];
    }
}
echo "<pre>";
print_r($mas_of_power);
echo "<pre>";


