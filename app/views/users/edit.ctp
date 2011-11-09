<div style="border-bottom:1px solid #EEE;margin-bottom:10px">
	<h2>Editar usuário</h2>
</div>
	<button class="btn small danger" data-controls-modal="modal-delete-cliente" data-backdrop="true" data-keyboard="true" style="float:left">Deletar usuário</button>
	<br/>
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
		<input type="button" value="Cancelar" class="btn" onClick="history.back();">
	</div>		
</fiedset>
</form>	


<div id="modal-delete-cliente" class="modal hide fade">
	<div class="modal-header">
		<a href="#" class="close">&times;</a>
		<h3>Calma ...</h3>
	</div>
   
	<div class="modal-body">
		<p>Deseja realmente apagar o usuário <strong><?php echo $user['User']['name'] ?></strong> ?</p>
	</div>
            
	<div class="modal-footer">
		<a href="<?php echo Configure::read('BASE_URL'); ?>users/delete/<?php echo $user['User']['id'] ?>" class="btn primary" >Sim</a>
		<a href="#" class="btn secondary closemodal">Não!</a>
	</div>
</div>
