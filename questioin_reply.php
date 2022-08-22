	<?php 
		include("head.php"); 

		//นับจำนวนผู้เข้ามาอ่าน
		$id = $_GET["qt_id"];

		$update = $db_con->prepare("UPDATE question SET qt_view = (qt_view+1) WHERE qt_id = ? ");
		// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
		$update->bindParam("1",$id);
		$result =  $update->execute();//mysql_query

		//ดึงข้อมูลกระทู้เพื่อมาแสดง
		$question = $db_con->prepare("SELECT * FROM question WHERE qt_id = '".$_GET["qt_id"]."'"); 
		$question->execute();
		$row=$question->fetch(PDO::FETCH_ASSOC);

	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include("top_menu.php"); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3><?php echo $row["qt_title"];?></h3>
				<?php echo $row["qt_detail"];?>
				<div class="div">
					<img src="uploads/image_qt/<?php echo $row['qt_image'] ?>" width="200" height="100%">
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<?php 
					$l = 1;
					$reply = $db_con->prepare("SELECT * FROM reply 
														LEFT JOIN member ON (reply.m_id = member.m_id)
														WHERE qt_id = '".$_GET["qt_id"]."' ORDER BY rp_id DESC");
					$reply->execute();

					while ($row=$reply->fetch(PDO::FETCH_ASSOC)) {// mysql_fetch_assoc()
				?>
				<div class="panel panel-default">
				  <div class="panel-heading"><strong>(ชือผู้ตอบ <?php echo ($row["m_name"]); ?>)</strong></div>
				  <div class="panel-body">
				  <div class="div">
					<?php
						if($row["rp_image"]!=null){
					?>
					<img src="uploads/reply/<?php echo $row['rp_image'] ?>" width="200" height="100%">
					<?php
						}
					?>
				</div>
						
				    <?php echo $row["rp_detail"]; ?>
				    <p>&nbsp;</p>
				    <small>สร้างเมื่อ <?php echo $row["rp_created"]; ?></small>
				  </div>
				</div>
				<?php 
					}
				?>

				
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
				  <div class="panel-heading">แสดงความคิดเห็น</div>
				  <div class="panel-body">
				    <form method="post" action="questioin_reply_send.php" enctype="multipart/form-data">				
						  <div class="form-group">
						    <label>ความคิดเห็น</label>
						    <textarea class="form-control" name="rp_detail" rows="3" placeholder="ระบุรายละเอียด" required></textarea>
						  </div> 
						  <div class="form-group">
						  	<label >รูป</label>
                            <input type="file" accept="image/*" class="form-control" name="rp_image">
						  </div>
						  <input type="hidden" name="qt_id" value="<?php echo $_GET["qt_id"];?>">
						  <button type="submit" class="btn btn-primary">บันทึก</button>
						  <button type="reset" class="btn btn-default">ยกเลิก</button>
						</form>
				  </div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</body>
</html>