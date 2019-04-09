<!DOCTYPE html>
<html>
<head>
	<title>Activation Email - TPACK</title>
</head>
<body>
	<p>
		Chào mừng {{ $name }} đã đăng ký thành viên tại tpack.com. Bạn hãy click vào đường link sau đây để hoàn tất việc đăng ký.
		</br>
	</p>
	<p><a href="{{ $link_active }}">{{ $link_active }}</a></p>
</body>
</html>