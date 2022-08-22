<?php 

	include("connect_db.php");
if (isset($_POST['register'])) {	
	$title = $_POST["qt_title"];
	$detail = $_POST["qt_detail"];
	$id = $_SESSION["member_id"];
	$created = date("Y-m-d H:i:s");

	$qt_image = $_FILES['qt_image']['name'];
    $tmp_dir = $_FILES['qt_image']['tmp_name'];
	$upload_dir = "uploads/image_qt/".$qt_image;   
	move_uploaded_file($tmp_dir, $upload_dir);


	$sql = "INSERT INTO question (qt_title,qt_detail,qt_created,m_id,qt_image) VALUES (?,?,?,?,?)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$title);
	$stm->bindParam("2",$detail);
	$stm->bindParam("3",$created);
	$stm->bindParam("4",$id);
	$stm->bindParam("5",$qt_image);
	$result =  $stm->execute();//mysql_query

	if($result){
		echo "บันทึกข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_me.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_me.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
}
?>