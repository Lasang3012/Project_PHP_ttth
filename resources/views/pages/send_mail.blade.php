<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body {
		font-family: Arial;
	}

	.coupon {
		border: 5px dotted #bbb;
		width: 80%;
		border-radius: 15px;
		margin: 0 auto;
		max-width: 600px;
	}

	.container {
		padding: 2px 16px;
		background-color: #f1f1f1;
	}

	.promo {
		background: #ccc;
		padding: 3px;
	}

	.expire {
		color: red;
	}
	p.code {
    text-align: center;
    font-size: 20px;
	}
	p.expire {
    text-align: center;
	}
	h2.note {
    text-align: center;
    font-size: large;
    text-decoration: underline;
	}
</style>
</head>
<body>

	<div class="coupon">

		<div class="container">
			<h3>Mã khuyến mãi từ shop <a target="_blank" href="#">thanhsang.com</a>
			</h3>
		</div>
		<div class="container" style="background-color:white">

			<h2 class="note"><b><i>
				Giảm 100K
			    cho tổng đơn hàng đặt mua</i></b></h2>

			<p>Quý khách đã từng mua hàng tại shop <a target="_blank" style="color:red" href="#">thanhsang.com</a> nếu đã có tài khoản xin vui lòng <a target="_blank" style="color:red"  href="{{URL::to('/dang-nhap')}}">đăng nhập</a> vào tài khoản để mua hàng và nhập mã code phía dưới để được giảm giá mua hàng ,xin cảm ơn quý khách.Chúc quý khách thật nhiều sức khỏe và bình an trong cuộc sống. </p>
		</div>
		<div class="container">
			<p class="code">Sử dụng Code sau: <span class="promo">COVID</span>với chỉ 25k mã giảm giá,nhanh tay kẻo hết.</p>
			<p class="expire">Ngày bắt đầu : 1/7 / Ngày hết hạn code: 30/8</p>
		</div>

	</div>

</body>
</html>
