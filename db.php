<?php

function getBestSix(){
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';  

	$pdo = new PDO("mysql:host=$servername;dbname=orders", $username, $password);
	$sql="SELECT * FROM menu ORDER BY order_count DESC LIMIT 6";
	$stmt=$pdo->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC); //返回的数据类型是associated array
	return $result;
}


//all menu from each category
function getMenuByCateId($id){
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';  

	$pdo = new PDO("mysql:host=$servername;dbname=orders", $username, $password);
	$sql="SELECT * FROM menu WHERE category=".$id." ORDER BY menu_id";
	$stmt=$pdo->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function getCateName(){
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';  

	$pdo = new PDO("mysql:host=$servername;dbname=orders", $username, $password);
	$sql="SELECT * FROM food_cate ORDER BY food_cate_id ASC";
	$stmt=$pdo->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function getCoupons(){
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';  

	$pdo = new PDO("mysql:host=$servername;dbname=orders", $username, $password);
	$sql="SELECT * FROM coupons";
	$stmt=$pdo->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}


//TEST
// try{
// 	print_r(getAllByCateId(3));
// 	} catch(PDOException $e){
// 		echo "getAllByCateId() error".$e->getMessage();
// 	}









?>