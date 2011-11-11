<?php echo $this->Session->flash(); ?>
<h2>Gerenciar usuários</h2>
<hr>
<a href="<?php echo Configure::read("BASE_URL") ?>users/add"><button class="btn small success">Adicionar usuário</button></a>
<hr>
<table class="zebra-striped" id="tableClientes">
	<thead>
		<tr>
			<th class="blue headerSortDown">Nome do usuário</th>
			<th class="blue">Usuário</th>
			<th class="blue">Email</th>
			<th class="blue">Tipo de usuário</ht>
			<th class="blue">#</th>
			<th class="blue">#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($usuarios as $u){ ?>
		<?php
		switch($u['User']['role']){
			case 'admin':
				$label = "important";
			break;
			case 'manager':
				$label = "important";
			break;
			case 'developer':
				$label = "warning";
			break;
			case 'designer':
				$label = "success";
			break;
			case 'editor':
				$label = "notice";
			break;
		}
		?>
		<tr>
			<td><?php echo $u['User']['name'];?></td>
			<td><?php echo $u['User']['username'] ?></td>
			<td><?php echo $u['User']['email'] ?></td>
			<td><span class="label <?php echo $label ?>"><?php echo $u['User']['role'] ?></span></td>
			<td><?php echo $this->Html->link("Editar","/users/edit/".$u['User']['id']) ?></td>
			<td> <?php echo $this->Html->link("Visualizar","/users/view/".$u['User']['username']) ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>