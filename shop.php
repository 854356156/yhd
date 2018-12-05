<?php
//连接数据库
$dbhost = 'localhost';
$dbuser = 'admin';
$dbpwd = 'admin';
$dbname = 'test';

$db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname );

if($db->connect_errno !=0){
    echo '连接失败';
    echo $db->connect_error;
}

$db->query('SET NAMES UTF8');

//获取表的名称$table
//$result = $db->query('SHOW TABLES');
//$tables = [];
//$tabless = '';
//while($arr = $result->fetch_assoc()){
//    $tables[] = $arr;
//}
//foreach ($tables as $abc){
//    if($abc['Tables_in_login'] === 'shop'){
//        $tabless = $abc;
//    } ;
//}
//$table = implode(",", $tabless);
$table = 'shop';
//查询
$sql = 'SELECT * FROM '.$table;
$res = $db->query($sql);

$shop = [];
while($shoparr = $res->fetch_assoc()){
    $shop[] = $shoparr;
}
$shop_string = json_encode($shop);
echo $shop_string;