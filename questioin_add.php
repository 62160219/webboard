	<?php 
		include("head.php"); 

		if(!isset($_SESSION["member_name"])){
			header("Location:login.php");
		}

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
				  <div class="panel-heading"><strong>ตั้งกระทู้</strong></div>
				  <div class="panel-body">
				    <form method="post" action="questioin_send.php" enctype="multipart/form-data">
						  <div class="form-group">
						    <label>หัวข้อ</label>
						    <input type="text" name="qt_title" class="form-control" placeholder="ระบุหัวข้อ" required>
						  </div>
						  <div class="form-group">
						    <label>รายละเอียด</label>
						    <textarea class="form-control" name="qt_detail" rows="3" placeholder="ระบุรายละเอียด" required></textarea>
						  </div>
						  <div class="form-group">
						  	<label >รูป</label>
                            <input type="file" accept="image/*" class="form-control" name="qt_image">
						  </div>
						  <button type="submit" name="register" value="register"  class="btn btn-primary">สร้าง</button>
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