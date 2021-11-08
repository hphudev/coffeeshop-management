<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8"/>
		<title>Quản lý thông tin khách hàng</title>
		<meta name="description" content="Website quản lý quán cà phê"/>
		<meta name="author" content="TvT"/>
		<link type="text/css" rel="stylesheet" href="../css/normalize.css"/>
		<link type="text/css" rel="stylesheet" href="../css/style.css"/>
	</head>
	
	<body>
		<div class="content">
			<div class="header coloredControl whiteText" id="lHeader">
				<h1><strong>Thông tin khách hàng</strong></h1>
			</div>

			<div class="searchEngine seperator">
				<div class="myTextBox" id="tbSearch">
					<form>
						<strong>Họ và tên khách hàng:</strong> <input type="text">
					</form>
				</div>

				<div class="myButton roundedControl coloredControl" id="bSearch">
					<a><strong>Tìm kiếm<strong></a>
				</div>
			</div>

			<div class="seperator">
				<div class="table">
					<ul>
						<li>
							<div class="row whiteText" id="firstRow">
								<div class="cell" id="1" onclick="Click(1)">STT</div>
								<div class="cell" id="2">Họ và tên</div>
								<div class="cell" id="3">Loại thành viên</div>
								<div class="cell" id="4">Ngày đăng ký</div>
								<div class="cell" id="5">Tổng chi</div>
								
								<script>
									function Click(ID)
									{
										document.getElementById(ID).style.backgroundColor = 'blue';
									}
								</script>
							</div>
						<li>
						
						<?php
							include "../../models/DataHandler.php";
							$dataHandler = new DataHandler();
							$data = $dataHandler->ReadData("KHACHHANG KH, LOAITHANHVIEN LTV", "HoTen, TenLoaiTV, NgayDangKy, TongChi", "KH.MaLoaiTV = LTV.MaLoaiTV");
							$count = 1;							

							foreach ($data as $customerData)
							{
						?>
						<li>
							<div class="row">
								<div class="cell">
									<?php
										echo $count;
										$count++;
									?>
								</div>
							
								<?php
									foreach ($customerData as $value)
									{
								?>
									<div class="cell">
										<?php
											echo $value;
										?>
									</div>
								<?php
									}
								?>

							</div>
						<li>
						<?php
							}
						?>
					</ul>
				</div>

				<div class="modifier">
					<ul>
						<li>
							<div class="myButton roundedControl coloredControl" id="bAdd">
								<a><strong>Thêm</strong></a>
							</div>
						</li>

						<li>
							<div class="myButton roundedControl coloredControl" id="bChange">
								<a><strong>Sửa</strong></a>
							</div>
						</li>

						<li>
							<div class="myButton roundedControl coloredControl" id="bDelete">
								<a><strong>Xóa<strong></a>
							</div>
						</li>

						<li>
							<div class="myButton roundedControl coloredControl">
								<a><strong>Thoát<strong></a>
							</div>
						</li>					
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>