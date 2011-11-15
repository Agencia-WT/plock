<div class="content-clientes-view">
	<div style="margin-bottom:10px">
	<h2><?php echo $cliente['Cliente']['nome'] ?></h2>
	</div>
	<div class="row">
		<ul class="tabs" style="margin-left:20px;width:98%">
		  <li class="active"><a href="#pessoais">Dados pessoais</a></li>
		  <li><a href="#dominios">Dominios</a></li>
		  <li><a href="#tarefas">Tarefas</a></li>
		  <li style="float:right">	<button class="btn small danger" data-controls-modal="modal-delete-cliente" data-backdrop="true" data-keyboard="true" style="float:right;border:0px">Deletar cliente</button>	</li>
		  <li style="float:right"><a href="<?php echo Configure::read('BASE_URL'); ?>clientes/edit/<?php echo $cliente['Cliente']['id'] ?>" class="link-button"><button class="btn small info" style="float:right;margin-right:5px">Editar cliente</button></a> </li>
		</ul>
		
		<div class="pill-content">
		  <div class="active" id="pessoais">
			
		  	<div class="row">
				<div class="span8">
					<h4>Dados pessoais</h4>
					<div style="float:left;">
						<span>Contato 1: </span><br/>
						<span>Contato 2: </span><br/>
						<span>Telefone 1: </span><br/>
						<span>Telefone 2: </span>
					</div>
					<div style="float:left">
						<?php echo $cliente['Cliente']['contato_1'] ?><br/>
						<?php echo $cliente['Cliente']['contato_2'] ?><br/>
						<?php echo $cliente['Cliente']['telefone_1'] ?><br/>
						<?php echo $cliente['Cliente']['telefone_2'] ?>
					</div>
				</div>
				<div class="span4">
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
				</div>
				<div class="row">
					<div class="span16">
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
		
		  </div>
		  <div id="dominios">
		  	<div class="span16">
				<?php 
				foreach ( $cliente['Dominio'] as $d ) 
				{ 
				 	$status = $this->Ftpcheck->check($d['ftp_host'], $d['ftp_username'], $d['ftp_password']); 
					?>

				<div class="well box-ftps span7">
					<div style="float:left;width:90px">
						<span>Url:</span><br/>
						<span>Servidor:</span><br/>
						<span>FTP Host:</span><br/>
						<span>FTP Usuário: </span><br/>
						<span>FTP Senha:</span>
						<span>FTP Status: </span>
						<span>&nbsp;</span>
					</div>
					<div style="float:left">
						<?php echo $d['url'] ?><br/>

						<?php 
						if ( !empty($d['servers_id']) )
						{ 
							echo '<a href="'.Configure::read('BASE_URL').'servers/view/'.$d['servers_id'].'">Visualizar Servidor</a><br />';
						}
						else
						{ 
							echo '<strong>Nenhum servidor anexado</strong> <br/>';
						} ?>
						<?php echo $d['ftp_host'] ?><br/>
						<?php echo $d['ftp_username'] ?><br/>
						<?php echo $d['ftp_password'] ?><br/>
						<?php echo $status ?><br/><br/>
						<div class="actions-buttons">
							<div>
							<?php echo $this->Html->link('Editar',  '/dominios/edit/'.$d['id'],   array('class' => 'link-editar')) ?> | 
							<?php echo $this->Html->link('Remover', '/dominios/delete/'.$d['id'], array('class' => 'link-remover')) ?>
							</div>
						</div>
					</div>
					<div class="clear"></div>

				</div>

				<?php } ?>
				<div class="clear"></div>
				<a href="<?php echo Configure::read('BASE_URL'); ?>dominios/add/<?php echo $cliente['Cliente']['id'] ?>">
					<button class="btn small">Adicionar Domínio</button>
				</a>
			</div>
		
		
		  </div>
		  <div id="tarefas">
		  	<div class="row">
				<div class="span16">
					<h4>Adicionar tarefa</h4>
					<div>
					<input type="hidden" name="data[Task][clientes_id]" value="<?php echo $cliente['Cliente']['id'] ?>" class='hiddentaskid'>
					<input type="text" name="data[Task][conteudo]" class="span9 contenttaskadd">
					<button class="btn small primary addTaskBtn" style="margin-left:10px">Adicionar</button>
					</div>
					<hr>
					<h4>Tarefas</h4>
					<div class="tasks-abertas">
					<ol>
					<?php
					foreach($cliente['Task'] as $t)
					{
						if( $t['status'] == 'aberto' ){
					?>
							<li>
								<input type="checkbox" name="check" value="<?php echo $t['id'] ?>" class="checkTask"> &nbsp;
								<span><?php echo $t['conteudo'] ?></span>
							</li>
					<?php	
						}
					}
					?>
					</ol>
					</div>
					<hr>
					<h4>Concluidas</h4>
					<div class="tasks-concluidas">
						<ul>
							<?php
							foreach($cliente['Task'] as $t)
							{
								if( $t['status'] == 'fechado' ){
							?>
									<li>
									    <?php echo $this->Html->image('trash.png',array('alt' => $t['id'],'class' => 'removeTask')) ?> <?php echo $t['conteudo'] ?>  
									</li>
							<?php	
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		
			
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
              <a href="<?php echo Configure::read('BASE_URL'); ?>clientes/delete/<?php echo $cliente['Cliente']['id'] ?>" class="btn primary" >Sim</a>
              <a href="#" class="btn secondary closemodal">Não!</a>
            </div>
</div>
