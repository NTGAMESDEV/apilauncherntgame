<?php
require_once("test.php"); 

// Настройки серверов
$serverIp1 = '54.38.117.78'; 
$serverPort1 = '1149';
$serverIp2 = '54.38.117.78'; // Замените на адрес второго сервера
$serverPort2 = '1149'; // Замените на порт второго сервера

// Создаем объекты для запросов к серверам
$query1 = new SampQueryAPI($serverIp1, $serverPort1); 
$serverInfo1 = $query1->getInfo();

if ($serverIp2 && $serverPort2) {
    $query2 = new SampQueryAPI($serverIp2, $serverPort2);
    $serverInfo2 = $query2->getInfo(); 
} else {
    $serverInfo2 = ['players' => 0]; 
}

// Формируем JSON-ответ в нужном формате
$jsonResponse = array(
    array(
        "color" => "FF0000",
        "dopname" => "(X2)",
        "maxonline" => 1000,
        "name" => "RED",
        "online" => $serverInfo1['players'],
        "edgar_host" => $serverIp1,
        "kranin_port" => $serverPort1
    ),
    array(
        "color" => "FF0000",
        "dopname" => "(X2)",
        "maxonline" => 1000,
        "name" => "RED",
        "online" => $serverInfo2['players'],
        "edgar_host" => $serverIp2,
        "kranin_port" => $serverPort2
    )
);

// Отключаем буферизацию вывода
ob_end_clean();

// Устанавливаем заголовок Content-type для JSON
header('Content-Type: application/json'); 

// Выводим JSON-ответ 
echo json_encode($jsonResponse); 
?>