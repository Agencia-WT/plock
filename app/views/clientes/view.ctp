<div class="content-clientes-view">
	<div style="border-bottom:1px solid #EEE;margin-bottom:10px">
	<h2><?php echo $cliente['Cliente']['nome'] ?></h2>
	</div>
	<a href="/plock/clientes" class="link-button"><input type="button" class="btn small" value="Voltar" style="float:left;margin-right:5px"></a> &nbsp;
	<a href="/plock/clientes/edit/<?php echo $cliente['Cliente']['id'] ?>" class="link-button"><button class="btn small info" style="float:left">Editar cliente</button></a> &nbsp; 
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
				<?php if($cliente['Cliente']['senha_1']){ ?><span>Senha 1: </span><br/><?php } ?>
				<span>Email 2: </span><br/>
				<?php if($cliente['Cliente']['senha_2']){ ?><span>Senha 2: </span><?php } ?>
			</div>
			<div style="float:left">
				<?php echo $cliente['Cliente']['email_1'] ?><br/>
				<?php if($cliente['Cliente']['senha_1']){ ?><?php echo $cliente['Cliente']['senha_1'] ?><br/><?php } ?>
				<?php echo $cliente['Cliente']['email_2'] ?><br/>
				<?php if($cliente['Cliente']['senha_1']){ ?><?php echo $cliente['Cliente']['senha_2'] ?><br/><?php } ?>
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
		<div class="span8">
			<h4>Servidor</h4>
			
			<?php if($cliente['Cliente']['servers_id'] != '1'){ ?>
			<table class="zebra-striped" id="tableClientes">
				<thead>
					<tr>
						<td width="340px">Servidor</td>
						<td style="text-align:center">#</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $cliente['Server']['nome'] ?></td>
						<td style="text-align:center"><a href="/plock/servers/view/<?php echo $cliente['Server']['id'] ?>">Visualizar</a></td>
					</tr>
				</tbody>
			</table>
			<?php }else{ ?>
				<strong>Nenhum servidor anexado</strong> <br/><br/>
			<?php } ?>
			
			<h4>FTP's</h4>
			<?php foreach($cliente['Ftp'] as $f){ 
			 	$status = $this->Ftpcheck->check($f['host'],$f['username'],$f['password']); 
			?>
				
			<div class="well box-ftps">
				<div style="float:left;width:80px">
					<span>Domínio:</span><br/>
					<span>Host:</span><br/>
					<span>Usuário: </span><br/>
					<span>Senha FTP:</span>
					<span>Status: </span>
					<span>&nbsp;</span>
				</div>
				<div style="float:left">
					<?php echo $f['dominio'] ?><br/>
					<?php echo $f['host'] ?><br/>
					<?php echo $f['username'] ?><br/>
					<?php echo $f['password'] ?><br/>
					<?php echo $status ?><br/><br/>
					<div class="actions-buttons">
						<div>
						<?php echo $this->Html->link("Editar","/ftps/edit/".$f['id'], array('class' => 'link-editar')) ?> | 
						<?php echo $this->Html->link("Remover","/ftps/delete/".$f['id'], array('class' => 'link-remover')) ?>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				
			</div>
			<div class="clear"></div>
			
			<?php } ?>
			<div class="clear"></div>
			<a href="/plock/ftps/add/<?php echo $cliente['Cliente']['id'] ?>">
				<button class="btn small">Adicionar FTP</button>
			</a>
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
