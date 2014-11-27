<?php if(isset($msg)): ?>
	<?php foreach($msg as $value): ?>
		<?php if($value->getRemetente() == $_SESSION['nome']): ?>
			<p class="text-capitalize" id="eu_remetente">Eu:</p>
			<p id="style_msg"><?php echo $value->getMsg();?></p>
		<?php else: ?>	
			<p class="text-capitalize" id="remetente"><?php echo $value->getRemetente();?>:</p>
			<p id="style_msg"><?php echo $value->getMsg();?></p>
		<?php endif; ?>
			<p id="style_data"><?php echo $value->getData();?></p>
	<?php endforeach; ?>
<?php endif; ?>