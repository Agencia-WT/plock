<h2>Cadastrar usuário</h2>
<hr>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create(); ?>
<fieldset>
	<div class="clearfix">
		<label for="nome-user">Nome do usuário</label>
		<div class="input">
			<input type="text" name="data[User][name]">
		</div>
	</div>
	<div class="clearfix">
		<label for="nome-user">Usuário</label>
		<div class="input">
			<input type="text" name="data[User][username]">
		</div>
	</div>
	<div class="clearfix">
		<label for="nome-user">Senha</label>
		<div class="input">
			<input type="text" name="data[User][password]">
		</div>
	</div>
	<div class="clearfix">
		<label for="nome-user">Email</label>
		<div class="input">
			<input type="text" name="data[User][email]">
		</div>
	</div>
	<div class="clearfix">
		<label for="nome-user">Tipo de usuário</label>
		<div class="input">
			<select name="data[User][role]">
				<option value="admin">Admin</option>
				<option value="manager">Manager</option>
				<option value="developer">Developer</option>
				<option value="designer">Designer</option>
				<option value="editor">Editor</option>
			</select>
		</div>
	</div>	
	<div class="actions">
		<input type="submit" value="Salvar" class="btn primary">
	</div>		
</fiedset>
</form>	
