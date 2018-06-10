<?php

header("Content-Type: text/html; charset=UTF-8");

$host = '127.0.0.1'; // адрес сервера
$database = 'db_voting'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'lkzlbgkjvf@2018'; // пароль
$port = '3300';

$link = mysqli_connect($host, $user, $password, $database, $port)
or die("Ошибка " . mysqli_error($link));

mysqli_set_charset($link, "utf8");


// название профессии
$prof = 'Системный аналитик';


$query1 = "SELECT DISTINCT `Компетенция` FROM `new` WHERE `Профессия`='Менеджер проектов в сфере IT'";

$query_result = mysqli_query($link,$query1);

if (!$query_result)
{
    die('Ошибка выполнения запроса' . mysqli_error($link));
}
//echo "$query_result";
$skills = array();

while($rows = mysqli_fetch_array($query_result))
    //Обрабатывает ряд результата запроса, возвращая
    //ассоциативный массив, численный массив или оба
{
    $skills[] = $rows[0];

}

$sol = count($skills);
//echo "$sol";
//echo "mas";
$count_skills = array();
for ($i = 0; $i < count($skills); $i++){
    $query2 = "SELECT COUNT(`Компетенция`) FROM `new` WHERE `Компетенция`='$skills[$i]' AND `Профессия`='$prof'";
    $query_result2 = mysqli_query($link,$query2);
    if (!$query_result2)
    {
        die('Ошибка выполнения запроса' . mysqli_error($link));
    }
    while($rows = mysqli_fetch_array($query_result2))
    {
        // echo "$skills[$i].' -- '.$rows[0]<br>";
        $count_skills[$skills[$i]] = $rows[0];
    }

}
//echo "<pre>";
//print_r($count_skills);
//echo "<pre>";
//echo" adsfsdfdsffffffffffffffffffff";
arsort($count_skills);

//echo "<pre>";
//print_r($count_skills);
//echo "<pre>";
$mas123 = array_slice($count_skills, 0, 15);
//echo "<pre>";
//print_r($mas123);
//echo "<pre>";
$main_mas = array();
$main_mas[] = ['Компетенция',''];
foreach ($mas123 as $key => $val) {
//    echo "$key = $val\n";
    $main_mas[] = [$key,$val];
}
//echo "<pre>";
//print_r($main_mas);
//echo "<pre>";

$json = json_encode($main_mas,JSON_UNESCAPED_UNICODE);
echo $json;


