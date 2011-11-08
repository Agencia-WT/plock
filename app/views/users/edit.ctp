<h2>Editar usuário</h2>
<hr>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create(); ?>
<fieldset>
	<div class="clearfix">
		<label for="nome-user">Nome do usuário</label>
		<div class="input">
			<input type="text" name="data[User][name]" value="<?php echo $user['User']['name'] ?>">
		</div>
	</div>
	<div class="clearfix">
		<label for="nome-user">Usuário</label>
		<div class="input">
			<input type="text" name="data[User][username]" value="<?php echo $user['User']['username'] ?>">
		</div>
	</div>
	<div class="clearfix">
		<label for="nome-user">Email</label>
		<div class="input">
			<input type="text" name="data[User][email]" value="<?php echo $user['User']['email'] ?>">
		</div>
	</div>
	<div class="clearfix">
		<label for="nome-user">Tipo de usuário</label>
		<div class="input">
			<select name="data[User][role]">
				<option value="admin" <?php if($user['User']['role'] == 'admin'){ echo 'selected="selected"'; } ?>>Admin</option>
				<option value="manager" <?php if($user['User']['role'] == 'manager'){ echo 'selected="selected"'; } ?>>Manager</option>
				<option value="developer" <?php if($user['User']['role'] == 'developer'){ echo 'selected="selected"'; } ?>>Developer</option>
				<option value="designer" <?php if($user['User']['role'] == 'designer'){ echo 'selected="selected"'; } ?>>Designer</option>
				<option value="editor" <?php if($user['User']['role'] == 'editor'){ echo 'selected="selected"'; } ?>>Editor</option>
			</select>
		</div>
	</div>	
	<div class="actions">
		<input type="hidden" name="data[User][id]" value="<?php echo $user['User']['id'] ?>">
		<input type="submit" value="Salvar" class="btn primary">
	</div>		
</fiedset>
</form>	
