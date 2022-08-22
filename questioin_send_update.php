<?php 

	include("connect_db.php");

	$title = $_POST["qt_title"];
	$detail = $_POST["qt_detail"];
	$id = $_POST["qt_id"];

	$p = "SELECT * FROM question WHERE qt_id = ?";
	$c = $db_con->prepare($p);
	$c->bindParam("1",$id);
	$c->execute();
	$r = $c->fetch(PDO::FETCH_ASSOC);

	$qt_image = $_FILES['qt_image']['name'];
    $tmp_dir = $_FILES['qt_image']['tmp_name'];
	$upload_dir = "uploads/image_qt/".$qt_image;   
	$dir = "uploads/image_qt/";
	if($qt_image){
		if(!file_exists($upload_dir)){
			unlink($dir.$r["qt_image"]);
			move_uploaded_file($tmp_dir, "uploads/image_qt/" .$qt_image);
		}
	}else{
		$qt_image = $r["qt_image"];
	}
	$sql = "UPDATE question SET qt_title = ?,qt_detail = ? ,qt_image = ? WHERE qt_id = ? ";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$title);
	$stm->bindParam("2",$detail);
	$stm->bindParam("3",$qt_image);
	$stm->bindParam("4",$id);
	
	$result =  $stm->execute();//mysql_query
														
	if($result){
		echo "แก้ไขข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_me.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "แก้ไขข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_edit.php?edit=".$_POST["qt_id"]."'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
?>
