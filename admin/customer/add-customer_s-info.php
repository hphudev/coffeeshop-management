<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8"/>
		<title>Thêm thông tin khách hàng</title>
		<meta name="description" content="Website quản lý quán cà phê"/>
		<meta name="author" content="TvT"/>
		<link type="text/css" rel="stylesheet" href="css/normalize.css"/>
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>
	
	<body>
		<div class="content">
			<div class="header coloredControl" id="lHeader">
				<h1>Thêm thông tin khách hàng</h1>
			</div>

			<form action="#" method="post" name="fModifyCustomer">
				Họ và tên: <input type="text" name="tbName" id="tbName"><br/>
				SĐT: <input type="number" name="tbPhoneNumber" id="tbPhoneNumber"> <br/>
				Giới tính: <input type="text" name="tbSex" id="tbSex"> </br>
			</form>

			<div class="seperator">
				<div class="myButton roundedControl coloredControl" id="bConfirm">
					<a><strong>Xác nhận<strong></a>
				</div>

				<div class="myButton roundedControl coloredControl" id="bCancel">
					<a><strong>Thoát<strong></a>
				</div>
			</div>
		</div>
	</body>
</html>