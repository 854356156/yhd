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

//获取数据
$name = $_POST['name'];
$src = $_POST['src'];
$price = $_POST['price'];
$number = $_POST['number'];
$user = $_POST['user'];
$shopid = $_POST['shopid'];

//购物车里数量增减按钮
$cartshopnumber = $_POST['cartshopnumber'];
$cartshopuser = $_POST['cartshopuser'];
$cartshopid = $_POST['cartshopid'];

//删除
$deluser = $_POST['deluser'];
$delid = $_POST['delid'];

//获取表的名称$table
//$result = $db->query('SHOW TABLES');
//$tables = [];
//$tabless = '';
//while($arr = $result->fetch_assoc()){
//    $tables[] = $arr;
//}
//foreach ($tables as $abc){
//    if($abc['Tables_in_login'] === 'cart'){
//        $tabless = $abc;
//    } ;
//}
//$table = implode(",", $tabless);
$table = 'cart';

if($cartshopuser){
    $zengjiaSql = 'UPDATE '.$table.' SET '.'`number`='.'\''.$cartshopnumber.'\' WHERE '.'`user`='.'\''.$cartshopuser.'\''.' and `shopid`='.'\''.$cartshopid .'\'';
    $db->query($zengjiaSql);

}elseif ($user){
    //判断用户购物车有没有同一件商品
    $chaxunSql = 'SELECT * FROM '.$table.' WHERE user='.'\''.$user.'\''.' and shopid='.'\''.$shopid.'\'';
    $chaxunRes = $db->query($chaxunSql);
    if($chaxunRes->num_rows>0){
        //商品存在
        $shopnumber = [];
        $shopnumbers = '';
        $shopuser = '';
        $shopcoding = '';
        while($shoparr = $chaxunRes->fetch_assoc()){
            $shopnumber[] = $shoparr;
        }
        foreach ($shopnumber as $abc){
            $shopnumbers = $abc['number'];
            $shopuser = $abc['user'];
            $shopcoding = $abc['shopid'];
        }
        $totalnumber = $shopnumbers + $number;
        $zengjiaSql = 'UPDATE '.$table.' SET '.'`number`='.'\''.$totalnumber.'\' WHERE '.'`user`='.'\''.$shopuser.'\''.' and `shopid`='.'\''.$shopcoding.'\'';
        $db->query($zengjiaSql);
    }else{
        //商品不存在
        //增加
        $sql = 'INSERT INTO '.'`'.$table.'`'.' ('.'`user`,'.'`shopid`,'.'`name`,'.'`img`,'.'`price`,'.'`number`'.') VALUES ('.'\''.$user.'\','.'\''.$shopid.'\','.'\''.$name.'\','.'\''.$src.'\','.'\''.$price.'\','.'\''.$number.'\')';
        $res = $db->query($sql);

    }
}elseif ($deluser){
    //删除商品
    $delsql = 'DELETE FROM '.$table.' WHERE '.'`user`='.'\''.$deluser.'\''.' and `shopid`='.'\''.$delid .'\'';
    $res = $db->query($delsql);
}
////获取表的名称$table
//$result = $db->query('SHOW TABLES');
//$tables = [];
//$tabless = '';
//while($arr = $result->fetch_assoc()){
//    $tables[] = $arr;
//}
//foreach ($tables as $abc){
//    if($abc['Tables_in_login'] === 'cart'){
//        $tabless = $abc;
//    } ;
//}
//$table = implode(",", $tabless);
//
////判断用户购物车有没有同一件商品
//$chaxunSql = 'SELECT * FROM '.$table.' WHERE user='.'\''.$user.'\''.' and shopid='.'\''.$shopid.'\'';
//$chaxunRes = $db->query($chaxunSql);
//if($chaxunRes->num_rows>0){
//    //商品存在
//    $shopnumber = [];
//    $shopnumbers = '';
//    $shopuser = '';
//    $shopcoding = '';
//    while($shoparr = $chaxunRes->fetch_assoc()){
//        $shopnumber[] = $shoparr;
//    }
//    foreach ($shopnumber as $abc){
//        $shopnumbers = $abc['number'];
//        $shopuser = $abc['user'];
//        $shopcoding = $abc['shopid'];
//    }
//    $totalnumber = $shopnumbers + $number;
//    $zengjiaSql = 'UPDATE '.$table.' SET '.'`number`='.'\''.$totalnumber.'\' WHERE '.'`user`='.'\''.$shopuser.'\''.' and `shopid`='.'\''.$shopcoding.'\'';
//    $db->query($zengjiaSql);
//}else{
//    //商品不存在
//    //增加
//    $sql = 'INSERT INTO '.'`'.$table.'`'.' ('.'`user`,'.'`shopid`,'.'`name`,'.'`img`,'.'`price`,'.'`number`'.') VALUES ('.'\''.$user.'\','.'\''.$shopid.'\','.'\''.$name.'\','.'\''.$src.'\','.'\''.$price.'\','.'\''.$number.'\')';
//    $res = $db->query($sql);
//
//}

