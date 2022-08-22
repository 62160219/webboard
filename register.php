	<?php include("head.php"); ?>
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
				  <div class="panel-heading"><strong>ลงทะเบียน</strong></div>
				  <div class="panel-body">
				    <form method="post" action="register_send.php" enctype="multipart/form-data">
						  <div class="form-group">
						    <label>E-mail</label>
						    <input type="email" name="email" class="form-control" placeholder="ระบุอีเมล" required>
						  </div>
						  <div class="form-group">
						    <label>รหัสผ่าน</label>
						    <input type="password" name="password" class="form-control" placeholder="ระบุรหัสผ่าน" required>
						  </div>
						  <hr>
						  <div class="form-group">
						    <label>ชื่อ-นามสกุล</label>
						    <input type="text" name="m_name" class="form-control" placeholder="ระบุชื่อ" required>
						  </div>
						  <div class="form-group">
						  	<label >รูปโปรไฟล์</label>
                            <input type="file" accept="image/*" class="form-control" name="m_image">
						  </div>
						  <button type="submit" name="register" value="register"  class="btn btn-primary">ลงทะเบียน</button>
						</form>
				  </div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</body>
</html>