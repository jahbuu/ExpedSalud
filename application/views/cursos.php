
<?php
	if(isset($cursos) && $cursos != false){
		foreach ($cursos->result() as $curso ) { 
?>

		<ul>
			<li><?= $curso->nombreCurso;  ?></li>
		</ul>		

<?php
		}
	}else{
		echo "<p>Error en la aplicaci[on</p>";
	}
?>
</body>
</html>