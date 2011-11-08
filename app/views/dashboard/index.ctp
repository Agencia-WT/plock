<h1>Procurar cliente</h1>
<form name="form1" method="post" action="<?php echo Configure::read('BASE_URL'); ?>clientes/search">
<input type="text" class="span10" name="data[Cliente][nome]" placeholder="Cliente"><button class="btn primary" style="margin-left:10px">Procurar</button>
</form>
<hr>
<h3>Dados</h3>
<strong>Clientes cadastrados: </strong><?php echo $nclientes ?><br/>
<strong>Servidores cadastrados: </strong><?php echo $nservers ?>