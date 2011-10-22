<?php echo $this->Session->flash(); ?>
<h1>Gerenciar clientes</h1>
<hr>
<table class="zebra-striped" id="tableClientes">
	<thead>
		<tr>
			<th class="yellow header headerSortDown">Nome</th>
			<th class="blue header">Telefone</th>
			<th class="green header">FTP</th>
			<th class="green header">Senha FTP</ht>
			<th>Email</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $d){ ?>
			<tr>
				<td><?php echo $d['Cliente']['nome'] ?></td>
				<td><?php echo $d['Cliente']['telefone_1'] ?></td>
				<td><?php echo $d['Cliente']['ftp'] ?></td>
				<td><?php echo $d['Cliente']['senha_ftp'] ?></td>
				<td><?php echo $d['Cliente']['email_1'] ?></td>
				<td><?php echo $this->Html->link("visualizar","/clientes/view/".$d['Cliente']['id']) ?>
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






