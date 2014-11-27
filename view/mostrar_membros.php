
<?php foreach($lista as $value): ?>
<div class="pessoas">
	<?php if($value->getNome() != $_SESSION['nome']): ?>
		<input type="hidden" class="id_amigo" nome="id_amigo" value="<?php echo $value->getId(); ?>" />
		<div class="membros text-capitalize text-capitalize"><?php echo $value->getNome();?></div>
		<?php if($value->getLogado() == 0): ?>
				<!-- <img class="status" src="../style/off.png" />	 -->
				<div class="status_off"></div>
			<?php else: ?>
				<!-- <img class="status" src="../style/on.png" /> -->	
				<div class="status_on"></div>	
		<?php endif; ?>
	<?php endif; ?>
</div>
<?php endforeach; ?>

