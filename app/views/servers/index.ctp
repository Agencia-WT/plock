<?php echo $this->Session->flash(); ?>
<h1>Gerenciar servidores</h1>
<hr>
<table class="zebra-striped" id="tableServers">
	<thead>
		<tr>
			<th class="yellow header headerSortDown">Nome</th>
			<th class="yellow header">URL</th>
			<th class="yellow header">Usuário</th>
			<th class="yellow header">Senha</ht>
			<th class="yellow header">IP</th>
			<th class="yellow header">#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($servers as $s){ ?>
			<?php if($s['Server']['id'] != '1'){ ?>
			<tr>
				<td><?php echo $s['Server']['nome'] ?></td>
				<td><?php echo @$s['Server']['url'] ?></td>
				<td><?php echo @$s['Server']['usuario'] ?></td>
				<td><?php echo @$s['Server']['senha'] ?></td>
				<td><?php echo $s['Server']['ip'] ?></td>
				<td><?php echo $this->Html->link("Visualizar","/servers/view/".$s['Server']['id']) ?></td>
			</tr>
			<?php } ?>
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





