<?php echo $this->Session->flash(); ?>
<h2>Gerenciar mensagens</h2>
<hr>
<a href="<?php echo Configure::read("BASE_URL") ?>messages/add"><button class="btn small success">Adicionar mensagem</button></a>
<hr>
<table class="zebra-striped" id="tableClientes">
	<thead>
		<tr>
			<th class="blue headerSortDown">Titulo</th>
			<th class="blue">Status</th>
			<th class="blue">Tipo</th>
			<th class="blue">Criado em</ht>
			<th class="blue">#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($messages as $m){ ?>
		<?php
		switch($m['Message']['type']){
			case 'comunicado':
				$label = "notice";
			break;
			case 'importante':
				$label = "warning";
			break;
			case 'urgente':
				$label = "important";
			break;
			default: $label = 'notice';
		}
		
		switch($m['Message']['status']){
			case 'active':
				$status = 'Ativa';
				$lb = 'success';
			break;
			case 'disabled':
				$status = 'Desativada';
				$lb = '';
			break;
		}
		?>
		<tr>
			<td><?php echo $m['Message']['title'];?></td>
			<td><span class="label <?php echo $lb ?>"><?php echo $status ?></span></td>
			<td><span class="label <?php echo $label ?>"><?php echo $m['Message']['type'] == 'on' ? 'comunicado' : $m['Message']['type'] ?></span></td>
			<td><?php echo $m['Message']['created'] ?></td>
			<td><?php echo $this->Html->link("Editar","/messages/edit/".$m['Message']['id']) ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>