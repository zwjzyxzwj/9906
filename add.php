<?php
	header("content-type:text/html;charset=utf-8");
	$no = $_GET["no"];
	$name = $_GET["name"];
	$pwd = $_GET["pwd"];
	$sex=$_GET["sex"];
	$birthday = $_GET["birth"];
	$class = $_GET["classname"];
//	echo $no ,$name ,$pwd ,$sex ,$birthday ,$class;
	//1.连接数据库,设置编码格式
	$link = mysqli_connect("127.0.0.1", "root", "root", "students");
	if($link===FALSE){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link, "utf8");
	//2.执行sql语句,获取结果集
	$sql = "INSERT INTO student(Sno,Sname,Spwd,Ssex,Sbirthday,Class) values('$no','$name','$pwd','$sex','$birthday','$class');";
	$res = mysqli_query($link, $sql);
	if($res===FALSE){
		echo "ERROE:".mysqli_errno($link);
		echo "ERROE:".mysqli_error($link);
		exit;
	}
	//3.处理结果集
	$rows = mysqli_affected_rows($link);
	if($rows>0){
		echo "success";
	}else{
		echo "fail";
	}
	
?>