<?php 

	include("connect_db.php");

	$detail = $_POST["rp_detail"];
	$id = $_POST["rp_id"];

	$p = "SELECT * FROM reply WHERE rp_id = ?";
	$c = $db_con->prepare($p);
	$c->bindParam("1",$id);
	$c->execute();
	$r = $c->fetch(PDO::FETCH_ASSOC);

	$rp_image = $_FILES['rp_image']['name'];
    $tmp_dir = $_FILES['rp_image']['tmp_name'];
	$upload_dir = "uploads/reply/".$rp_image;   
	$dir = "uploads/reply/";
	if($rp_image){
		if(!file_exists($upload_dir)){
			unlink($dir.$r["rp_image"]);
			move_uploaded_file($tmp_dir, "uploads/reply/" .$rp_image);
		}
	}else{
		$rp_image = $r["rp_image"];
	}

	$sql = "UPDATE reply SET rp_detail = ?, rp_image = ? WHERE rp_id = ? ";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$detail);
	$stm->bindParam("2",$rp_image);
	$stm->bindParam("3",$id);
	$result =  $stm->execute();//mysql_query
														
	if($result){
		echo "แก้ไขข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=reply_me.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "แก้ไขข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=reply_edit.php?edit=".$_POST["rp_id"]."'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
?>