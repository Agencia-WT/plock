<?php echo $this->Session->flash(); ?>
<h2>Gerenciar usuários</h2>
<hr>
<table class="zebra-striped" id="tableClientes">
	<thead>
		<tr>
			<th class="blue headerSortDown">Nome do usuário</th>
			<th class="blue">Usuário</th>
			<th class="blue">Email</th>
			<th class="blue">Tipo de usuário</ht>
			<th class="blue">#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($usuarios as $u){ ?>
		<tr>
			<td><?php echo $u['User']['name'] ?></td>
			<td><?php echo $u['User']['username'] ?></td>
			<td><?php echo $u['User']['email'] ?></td>
			<td><?php echo $u['User']['role'] ?></td>
			<td><?php echo $this->Html->link("Editar","/users/edit/".$u['User']['id']) ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>