<?php 
		include("head.php"); 

		//ดึงข้อมูลเพื่อมาแสดงเพื่อทำการแก้ไข
		$sql = "SELECT * FROM reply WHERE rp_id = '".$_GET["edit"]."' "; 
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
				  <div class="panel-heading"><strong>แก้ไขความคิดเห็น</strong></div>
				  <div class="panel-body">
				    <form method="post" action="reply_send_update.php" enctype="multipart/form-data">
						  <div class="form-group">
						    <label>แก้ไข</label>
						    <textarea class="form-control" name="rp_detail" rows="3" placeholder="ระบุรายละเอียด" required><?php echo $row["rp_detail"];?></textarea>
						  </div>
						  <div class="form-group">
						  	<label>แก้ไขรูป</label>
                            <input type="file" accept="image/*" class="form-control" name="rp_image">
						  </div>
						   <input type="hidden" name="rp_id" id="rp_id" value="<?php echo $row["rp_id"];?>"  />
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