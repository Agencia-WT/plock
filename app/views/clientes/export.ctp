<h2>Exportar lista de clientes</h2>
<hr>
<strong>Escolha o formato:</strong><br/>
<div class="well" style="margin-top:8px">
	<a href="<?php echo Configure::read('BASE_URL'); ?>/clientes/rest/json" class="btn primary" alt="JSON" target="_blank">JSON</a>&nbsp;
	<a href="<?php echo Configure::read('BASE_URL'); ?>/clientes/rest/filezilla" class="btn" alt="FileZilla" target="_blank">FileZilla</a>&nbsp;
	<button class="btn info">CSV</button>&nbsp;
	<button class="btn success">HTML</button>&nbsp;
</div>

<div id="resultREST">

	<?php
	if(@$clientesXML){
		echo "<h2>Clientes adicionados</h2>";
		foreach($clientesXML as $c){
			echo "<div class='tumb_cliente_export_xml'>";
			echo $c['Name'];
			echo "</div>";
			echo "<div class='clear'></div>";
		}
	}
	?>
	
</div>