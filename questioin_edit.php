	<?php 
		include("head.php"); 

		//ดึงข้อมูลเพื่อมาแสดงเพื่อทำการแก้ไข
		$sql = "SELECT * FROM question WHERE qt_id = '".$_GET["edit"]."' "; 
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
				  <div class="panel-heading"><strong>แก้ไขกระทู้</strong></div>
				  <div class="panel-body">
				    <form method="post" action="questioin_send_update.php" enctype="multipart/form-data">
						  <div class="form-group">
						    <label>หัวข้อ</label>
						    <input type="text" name="qt_title" class="form-control" value="<?php echo $row["qt_title"];?>" required>
						  </div>
						  <div class="form-group">
						    <label>รายละเอียด</label>
						    <textarea class="form-control" name="qt_detail" required><?php echo $row["qt_detail"];?> </textarea>
						  </div>
						  <div class="form-group">
						  	<label >รูป</label>
                            <input type="file" accept="image/*" class="form-control" name="qt_image">
						  </div>
						  <input type="hidden" name="qt_id" id="qt_id" value="<?php echo $row["qt_id"];?>"  />
						  <button type="submit"class="btn btn-primary">บันทึก</button>
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