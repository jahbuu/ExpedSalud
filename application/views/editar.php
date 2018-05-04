<?=
	form_open('/cursos/actualizar/'.$id.'');
?>

<?php
	$nombre=array( 'name' => 'nombre', 'placeholder' => 'Escrive tu nombre', 'value' => $curso->result()[0]->nombreCurso );
	$videos=array( 'name' => 'videos', 'placeholder' => 'Cantidad videos del curso' , 'value' => $curso->result()[0]->CantidadVideos );
?>

<label>
	<?= form_label('Nombre', 'nombre') ?>
	<?= form_input($nombre); ?>
</label>
<label>
	<?= form_label('Número de videos', 'videos') ?>
	<?= form_input($videos); ?>
</label>

<?= form_submit('', 'Actualizar curso') ?>

<?=
form_close();
?>

	</body>
</html>
