<?php

if(@$data){
?>
<h2>Selecione o cliente que deseja incluir uma(s) tarefa(s)</h2>
<hr>
<table>
	<thead>
		<tr>
			<th>Cliente</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $c){ ?>
			<tr>
				<td><?php echo $c['Cliente']['nome'] ?></td>
				<td><?php echo $this->Html->link("Selecionar","/tasks/add/".$c['Cliente']['id']) ?></td>
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

<?php
}else{
?>
<h2>Adicionar tarefa</h2>
<hr>
<form>
	<div class="row">
		<div class="span12">		
			<div class="clearfix">
				<label for="clienteNome">Cliente</label>
				<div class="input">
					<span class="uneditable-input"><?php echo $cliente['Cliente']['nome'] ?></span>
				</div>
			</div>
			<div class="clearfix">
				<label for="tarefaNome">Titulo</label>
				<div class="input">
					<input type="text" name="data[Task][titulo]" id="tarefaNome" class="span6">
				</div>
			</div>
			<div class="clearfix">
				<label for="tarefaConteudo">Conteúdo</label>
				<div class="input">
					<textarea class="xxlarge" id="tarefaConteudo" name="data[Task][conteudo]" rows="3"></textarea>
					<span class="help-block">Conteúdo da tarefa.  </span>
				</div>
			</div>
			<div class="clearfix">
				<label for="tarefaData">Data</label>
				<div class="input">
				 <div class="inline-inputs">
				      <input class="small" type="text" name="data_1" placeholder="10/10/2011"/>
				      <input class="mini" type="text" name="hora_1" placeholder="10h" />
				      até
				      <input class="small" type="text" name="data_2" placeholder="12/10/2011"/>
				      <input class="mini" type="text" name="hora_2" placeholder="18h" />
				      <span class="help-block">Data e horário de início da tarefa e data e hora de termino da tarefa.</span>
				 </div>
				</div>
			</div>
			<div class="actions">
				<input type="submit" value="Salvar" class="btn primary">
				<input type="button" value="Cancelar" class="btn">
			</div>
		</div>
	</div>
</form>




<?php } ?>