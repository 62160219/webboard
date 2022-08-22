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
				  <div class="panel-heading"><strong>เข้าสู่ระบบ</strong></div>
				  <div class="panel-body">
				    <form method="post" action="login_send.php">
						  <div class="form-group">
						    <label>ชื่อผู้ใช้งาน</label>
						    <input type="text" name="email" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน" required>
						  </div>
						  <div class="form-group">
						    <label>รหัสผ่าน</label>
						    <input type="password" name="password" class="form-control" placeholder="ระบุรหัสผ่าน" required>
						  </div>
						  <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
						</form>
				  </div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</body>
</html>