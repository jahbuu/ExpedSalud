<div class="panel panel-primary-head">  
    <table id="basicTable" class="table table-striped table-bordered responsive">
        <thead class="">
            <tr>
                <th>Fecha</th>                
                <th>Médico</th>
                <th></th>                
            </tr>
        </thead> 
        <tbody>
        	<?php
        		foreach ($pid_evnts as $result) {
        			echo "<tr>";
						echo "<td>". date( 'd-M-Y', strtotime( $result->fecha ) ) ."</td>";					
						echo "<td>". $result->mnombre . " " . $result->mapellido . "</td>";
						echo "<td>". " <btn onclick='form_load_confirmation_from_history(". $result->id .", \"". $form_type ."\");' class='btn btn-primary btn-bordered'>Ver</btn> " ."";
                        //echo "<btn onclick='form_load_confirmation_from_history(". $result->id .", \"". $form_type ."\");' class='btn btn-danger btn-bordered'>Eliminar</btn> ";
                        //echo " <btn onclick='form_load_confirmation_from_history(". $result->id .", \"". $form_type ."\");' class='btn btn-warning btn-bordered'>Editar</btn> ";
                        echo "</td>";
					echo "</tr>";
				}
        	?>                                        
        </tbody>
    </table>
    <button class="btn btn-primary" onclick="backto();">Regresar</button>
</div><!-- panel -->
                        