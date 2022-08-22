<?php 

	include("connect_db.php");
if (isset($_POST['register'])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$name = $_POST["m_name"];
	$created = date("Y-m-d H:i:s");

	$m_image = $_FILES['m_image']['name'];
    $tmp_dir = $_FILES['m_image']['tmp_name'];
	$upload_dir = "uploads/".$m_image;   
	move_uploaded_file($tmp_dir, $upload_dir);

	$sql = "INSERT INTO member (email,password,m_name,m_created,m_image) VALUES (?,?,?,?,?)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$email);
	$stm->bindParam("2",$password);
	$stm->bindParam("3",$name);
	$stm->bindParam("4",$created);
	$stm->bindParam("5",$m_image);
	$result =  $stm->execute();//mysql_query

	if($result){
		echo "บันทึกข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=login.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=register.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
}
?>