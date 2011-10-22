<?php
	echo $this->Session->flash('auth');
?>
<div class="well" style="width:230px">
<h3>Login</h3>
<form id="UserLoginForm" method="post" action="/plock/users/login" accept-charset="utf-8">

<input name="data[User][username]" type="text" maxlength="255" id="UserUsername" placeholder="Usuário"><br/>
<input name="data[User][password]" type="password" maxlength="255" id="UserPassword" placeholder="Senha"><br/>
<button class="btn primary">Login</button>
</form>
</div>