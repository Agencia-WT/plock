<div class="content-clientes-view">
	<h2><?php echo $cliente['Cliente']['nome'] ?></h2>
	<a href="/plock/clientes/edit/<?php echo $cliente['Cliente']['id'] ?>"><button class="btn small info" style="float:left">Editar cliente</button></a> &nbsp; 
	<button class="btn small danger" data-controls-modal="modal-delete-cliente" data-backdrop="true" data-keyboard="true" style="float:right">Deletar cliente</button>
	<hr>
	<div class="row">
		<div class="span8">
			<h4>Dados pessoais</h4>
			<div style="float:left;">
				<span>Contato 1: </span><br/>
				<span>Contato 2: </span>
			</div>
			<div style="float:left">
				<?php echo $cliente['Cliente']['contato_1'] ?><br/>
				<?php echo $cliente['Cliente']['contato_2'] ?>
			</div>
			<div class="clear"></div>
		
			<hr>
			<h4>Email</h4>
			<div style="float:left;width:60px">
				<span>Email 1: </span><br/>
				<span>Senha 1: </span><br/>
				<span>Email 2: </span><br/>
				<span>Senha 2: </span>
			</div>
			<div style="float:left">
				<?php echo $cliente['Cliente']['email_1'] ?><br/>
				<?php echo $cliente['Cliente']['senha_1'] ?><br/>
				<?php echo $cliente['Cliente']['email_2'] ?><br/>
				<?php echo $cliente['Cliente']['senha_2'] ?><br/>
			</div>
		</div>
		<div class="span8">
			<h4>FTP</h4>
			<div style="float:left;width:80px">
				<span>FTP:</span><br/>
				<span>Senha FTP:</span>
			</div>
			<div style="float:left">
				<?php echo $cliente['Cliente']['ftp'] ?><br/>
				<?php echo $cliente['Cliente']['senha_ftp'] ?><br/>
			</div>
			<div class="clear"></div>
			<hr>
			<h4>Dados complementares</h4>
			<div style="float:left;width:90px">
				<span>Observações: </span>
			</div>
			<div style="float:left">
				<?php echo nl2br($cliente['Cliente']['observacoes']) ?>
			</div>
		</div>
	</div>
</div>


<div id="modal-delete-cliente" class="modal hide fade">
            <div class="modal-header">
              <a href="#" class="close">&times;</a>
              <h3>Calma ...</h3>
            </div>
            <div class="modal-body">
              <p>Deseja realmente apagar o cliente <strong><?php echo $cliente['Cliente']['nome'] ?></strong> ?</p>
            </div>
            <div class="modal-footer">
              <a href="/plock/clientes/delete/<?php echo $cliente['Cliente']['id'] ?>" class="btn primary" >Sim</a>
              <a href="#" class="btn secondary closemodal">Não!</a>
            </div>
          </div>
