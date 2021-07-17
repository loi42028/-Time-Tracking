<!DOCTYPE html>
<head>
<title>Manage Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
		<form action="/check-login-admin" method="post">
			@csrf
			<input type="text" class="ggg" name="email" placeholder="E-MAIL">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD">
			<input type="submit" value="Sign In" name="login">
		</form>
</div>
</div>

</body>
</html>
