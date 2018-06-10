<?php

header("Content-Type: text/html; charset=UTF-8");

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


// название профессии
$prof = 'Менеджер проектов в сфере IT';

$mas_of_industries = array();
$query = "SELECT DISTINCT `Отрасль` FROM `new`";
$query_result = mysqli_query($link,$query);

while ($rows = mysqli_fetch_assoc($query_result))
{
    $mas_of_industries[]= $rows['Отрасль'];
}

//print_r($mas_of_industries);
//echo"<br><br><br>";

    $query1 = "SELECT COUNT(DISTINCT `Код_респондента`) FROM `new` WHERE `Профессия` = '$prof'";

$query_result = mysqli_query($link,$query1);
//echo "$query_result";
$count_voices;

while($rows = mysqli_fetch_array($query_result))
    //Обрабатывает ряд результата запроса, возвращая
    //ассоциативный массив, численный массив или оба
{
    $count_voices=$rows[0];

}
//echo "Count voices = $count_voices <br>";


// для графика

$count_mas_industry = array();
$count_mas_industry[] = ['Отрасль',''];
for ($i = 0; $i < count($mas_of_industries); $i++) {
    //print_r($mas_of_industries[$i]); //`Отрасль`
    // $query = "SELECT COUNT `Отрасль` FROM `new` WHERE `Отрасль` = '$mas_of_industries[$i]' AND `Профессия` = '$prof'";
    $query = "SELECT COUNT(DISTINCT `Код_респондента`) FROM `new` WHERE `Отрасль` = '$mas_of_industries[$i]' AND `Профессия` = '$prof'";
    $query_result = mysqli_query($link, $query) or trigger_error(mysqli_error($link)." in ". $query);


    while ($rows = mysqli_fetch_array($query_result)) {
        $count_mas_industry[] = [$mas_of_industries[$i],(int)$rows[0]];
    }
}
//print_r($count_mas_industry);
//echo "<br>";
$json = json_encode($count_mas_industry, JSON_UNESCAPED_UNICODE);
echo $json;
