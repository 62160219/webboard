<?php 

	include("connect_db.php");

	$password = $_POST["password"];
	$m_name = $_POST["m_name"];
    $id = $_POST["m_id"];

	$p = "SELECT * FROM member WHERE m_id = ?";
	$c = $db_con->prepare($p);
	$c->bindParam("1",$id);
	$c->execute();
	$r = $c->fetch(PDO::FETCH_ASSOC);

	$m_image = $_FILES['m_image']['name'];
    $tmp_dir = $_FILES['m_image']['tmp_name'];
	$upload_dir = "uploads/".$m_image;   
	$dir = "uploads/";
	if($m_image){
		if(!file_exists($upload_dir)){
			unlink($dir.$r["m_image"]);
			move_uploaded_file($tmp_dir, "uploads/" .$m_image);
		}
	}else{
		$m_image = $r["m_image"];
	}
	$sql = "UPDATE member SET password = ?,m_name = ?, m_image = ? WHERE m_id = ? ";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$password);
	$stm->bindParam("2",$m_name);
	$stm->bindParam("3",$m_image);
    $stm->bindParam("4",$id);

	$result =  $stm->execute();//mysql_query
														
	if($result){
		echo "แก้ไขข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=member.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "แก้ไขข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=member_edit.php?edit=".$_POST["m_id"]."'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
?>