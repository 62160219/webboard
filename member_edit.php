<?php 
		include("head.php"); 

		//ดึงข้อมูลเพื่อมาแสดงเพื่อทำการแก้ไข
		$sql = "SELECT * FROM member WHERE m_id = '".$_GET["edit"]."' "; 
		$update = $db_con->prepare($sql);
		$update->execute();
		$row = $update->fetch(PDO::FETCH_ASSOC);
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
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-heading"><strong>แก้ไขข้อมูล</strong></div>
				  <div class="panel-body">
				    <form method="post" action="member_send_update.php" enctype="multipart/form-data">
                          <div class="form-group">
						    <label>Password</label>
						    <input type="password" class="form-control" name="password" value="<?php echo $row["password"];?>" required>
						  </div>
                          <div class="form-group">
						    <label>Full Name</label>
						    <input type="text" class="form-control" name="m_name" value="<?php echo $row["m_name"];?>" required>
						  </div>
                          <div class="form-group">
						    <label>Picture</label>
						    <input type="file" class="form-control" name="m_image" value="<?php echo $row["m_image"];?>" >
						  </div>
							<input type="hidden" name="m_id" id="m_id" value="<?php echo $row["m_id"];?>"  />
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