<?php include __DIR__ . '/../header.php'; ?>
<div class="main-login">
	<div class="login-window">
		<h1>Вход</h1>
		<form action="/users/login" method="post">
			<label>Email <input type="text" name="email" value=""></label>
			<br><br>
			<label>Пароль <input type="password" name="password" value=""></label>
			<br><br>
			<input type="submit" name="Войти">
		</form>
	</div>
</div>
<?php include __DIR__ . '/../footer.php'; ?>