<h2>Regras de acesso</h2>
<hr>
<span>Regras de acesso para cada módulo do sistema.</span><br/>
<table class="zebra-striped" id="tableRegras">
	<thead>
		<tr>
			<th>#</th>
			<th class="blue">Tipo de usuário</th>
			<th class="" style="text-align:center">Clientes</th>
			<th class="" style="text-align:center">Servidores</th>
			<th class="" style="text-align:center">Usuários</ht>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Admin</td>
			<td style="text-align:center"><span class="label success">✓</span></td>
			<td style="text-align:center"><span class="label success">✓</span></td>
			<td style="text-align:center"><span class="label success">✓</span></td>
		</tr>
		<tr>
			<td>2</td>
			<td>Manager</td>
			<td style="text-align:center"><span class="label success">✓</span></td>
			<td style="text-align:center"><span class="label success">✓</span></td>
			<td style="text-align:center"><?php echo $this->Html->image('denied.png') ?></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Developer</td>
			<td style="text-align:center"><span class="label success">✓</span></td>
			<td style="text-align:center"><span class="label success">✓</span></td>
			<td style="text-align:center"><?php echo $this->Html->image('denied.png') ?></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Designer</td>
			<td style="text-align:center"><span class="label success">✓</span></td>
			<td style="text-align:center"><?php echo $this->Html->image('denied.png') ?></td>
			<td style="text-align:center"><?php echo $this->Html->image('denied.png') ?></td>
		</tr>	
		<tr>
			<td>5</td>
			<td>Editor</td>
			<td style="text-align:center"><span class="label success">✓</span></td>
			<td style="text-align:center"><?php echo $this->Html->image('denied.png') ?></td>
			<td style="text-align:center"><?php echo $this->Html->image('denied.png') ?></td>
		</tr>							
	</tbody>
</table>
<strong>Legenda</strong><br/><br/>
<span class="label success">✓</span> Acesso permitido.<br/>
<?php echo $this->Html->image('denied.png') ?> Não possui acesso.</span>