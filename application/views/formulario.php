<?=
	form_open('/gemini/record_data');
?>

<?php
	$nombre=array( 'name' => 'nombre', 'placeholder' => 'Escrive tu nombre' );
	$videos=array( 'name' => 'videos', 'placeholder' => 'Cantidad videos del curso' );
?>

<label>
	<?= form_label('Nombre', 'nombre') ?>
	<?= form_input($nombre); ?>
</label>
<label>
	<?= form_label('Número de videos', 'videos') ?>
	<?= form_input($videos); ?>
</label>

<?= form_submit('', 'Subir curso') ?>

<?=
form_close();
?>

	</body>
</html>

