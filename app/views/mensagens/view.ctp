<h2> Mensagens</h2>

<h3> <?= $Mensagen['Mensagen']['title'] ?> </h3>
<span class='dates'> <?= $Mensagen['Mensagen']['created'] ?></span><br/>
<p> <?= $Mensagen['Mensagen']['content'] ?></p>
<br/>
<?php if($user['User']['role'] == "admin"){ ?>

<?= $this->Html->link('Editar Mensagem' , '/mensagens/edit/'.$Mensagen['Mensagen']['id']); ?> | <?= $this->Html->link('Apagar Mensagem' , '/mensagens/delete/'.$Mensagen['Mensagen']['id']); ?>

<?php } ?>