<div class="content-servers-view">
	<div style="border-bottom:1px solid #EEE;margin-bottom:10px">
	<h2><?php echo $server['Server']['nome'] ?></h2>
	</div>
	<button class="btn small" style="float:left" onClick="history.back();">Voltar </button>
	<a href="/plock/servers/edit/<?php echo $server['Server']['id'] ?>"><button class="btn small info" style="float:left;margin-left:10px">Editar servidor</button></a> &nbsp; 
	<button class="btn small danger" data-controls-modal="modal-delete-server" data-backdrop="true" data-keyboard="true" style="float:right">Deletar servidor</button>
	<hr>
	<div class="row">
		<div class="span8">
			<h4>Dados</h4>
			<div style="float:left;margin-right:5px" class="span-servers-bold">
				<span>Nome: </span><br/>
				<span>URL: </span><br/>
				<span>Usuário: </span><br/>
				<span>Senha: </span><br/>
				<span>IP: </span>
			</div>
			<div style="float:left">
				<?php echo $server['Server']['nome'] ?><br/>
				<a href="<?php echo $server['Server']['url'] ?>" target="_blank"><?php echo $server['Server']['url'] ?></a><br/>
				<?php echo $server['Server']['usuario'] ?><br/>
				<?php echo $server['Server']['senha'] ?><br/>
				<?php echo $server['Server']['ip'] ?><br/>
			</div>
		</div>
	</div>
</div>


<div id="modal-delete-server" class="modal hide fade">
	<div class="modal-header">
  		<a href="#" class="close">&times;</a>
  		<h3>Calma ...</h3>
	</div>
	<div class="modal-body">
  		<p>Deseja realmente apagar o server <span><?php echo $server['Server']['nome'] ?></span> ?</p>
	</div>
	<div class="modal-footer">
  		<a href="/plock/servers/delete/<?php echo $server['Server']['id'] ?>" class="btn primary" >Sim</a>
  		<a href="#" class="btn secondary closemodal">Não!</a>
	</div>
</div>