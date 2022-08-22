<?php 

include("head.php"); 

if(!isset($_SESSION["member_name"])){
	header("Location:login.php");
}



	include("connect_db.php");

	$detail = $_POST["rp_detail"];
	$id = $_POST["qt_id"];
	$created = date("Y-m-d H:i:s");
	$m_id = $_SESSION["member_id"];

	$rp_image = $_FILES['rp_image']['name'];
    $tmp_dir = $_FILES['rp_image']['tmp_name'];
	$upload_dir = "uploads/reply/".$rp_image;   
	move_uploaded_file($tmp_dir, $upload_dir);

	$sql = "INSERT INTO reply (rp_detail,rp_created,qt_id,rp_image,m_id) VALUES (?,?,?,?,?)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$detail);
	$stm->bindParam("2",$created);
	$stm->bindParam("3",$id);
	$stm->bindParam("4",$rp_image);
	$stm->bindParam("5",$m_id);
	$result = $stm->execute();//mysql_query
		
	

	if($result){
		echo "บันทึกข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_reply.php?qt_id=".$_POST["qt_id"]."'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_reply.php?qt_id=".$_POST["qt_id"]."'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
?>