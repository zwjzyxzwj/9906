<?php
header("content-type:text/html;charset=utf-8");
	$no =$_GET["no"];
	//1.连接数据库,设置编码格式
	$link = mysqli_connect("127.0.0.1", "root", "root", "students");
	if($link===FALSE){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link, "utf8");
	//2.执行sql语句,获取结果集
	$sql = "delete from student WHERE Sno='$no'";
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
//	mysqli_free_result($res);
//	mysqli_close($link);
?>