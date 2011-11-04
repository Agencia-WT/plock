<?php echo $this->Session->flash(); ?>
<h1>Gerenciar clientes</h1>
<hr>
<table class="zebra-striped" id="tableClientes">
	<thead>
		<tr>
			<th class="green header headerSortDown">Nome</th>
			<th class="green header">Host</th>
			<th class="green header">Usuário</th>
			<th class="green header">Senha FTP</ht>
			<th class="green header">Email</th>
			<th class="green header">#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $d){ ?>
			<tr>
				<td><?php echo $d['Cliente']['nome'] ?></td>
				<td><?php echo @$d['Ftp'][0]['host'] ?></td>
				<td><?php echo @$d['Ftp'][0]['username'] ?></td>
				<td><?php echo @$d['Ftp'][0]['password'] ?></td>
				<td><?php echo $d['Cliente']['email_1'] ?></td>
				<td><?php echo $this->Html->link("visualizar","/clientes/view/".$d['Cliente']['id']) ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>


<div class="pagi">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array("separator" => null)); ?>  	
<?php echo $this->Paginator->next('Próxima »', null, null, array('class' => 'disabled')); ?>
<span style="float:right">
	<?php echo $this->Paginator->counter(array("separator" => " de ")); ?>
</span>
</div>
<div class="clear"></div>






