<?php
if(@$error){
	echo "<h2>".$error."</h2>";
}else{
	
	$name = $usr['User']['name'] ? $usr['User']['name'] : $usr['User']['username'];
	$foto = $this->Gravatar->getImage($usr['User']['email'],100);
	
	switch($usr['User']['role']){
		case 'admin':
			$label = "important";
		break;
		case 'manager':
			$label = "important";
		break;
		case 'developer':
			$label = "warning";
		break;
		case 'designer':
			$label = "success";
		break;
		case 'editor':
			$label = "notice";
		break;
	}
	
	
?>
<button class="btn small" onClick="history.back();">Voltar</button>
<hr>
<div class="row">
	<div class="span2">
		<div class="media-grid">
			<a href="#"><img src="<?php echo $foto ?>" alt=""></a>
		</div>
	</div>
	<div class="span10">
		<h2><?php echo $name ?></h2>
		<span class="label <?php echo $label ?>"><?php echo $usr['User']['role'] ?></span><br/>
		<span><?php echo $usr['User']['email'] ?></span>
	</div>
</div>



<?php } ?>