<?php
$display_normal = 1;
if( isset( $form_data ) ){
    $display_normal = 0;
}
//print_r($form_data);die;
?>
<!-- Lista de Problemas -->

<div class="panel panel-default">    

    <div class="panel-heading">
        <div class="panel-btns">
            
        </div><!-- panel-btns -->
        <h4 class="panel-title">Lista de problemas</h4>
        <p>Aregar información de Problemas al paciente.</p>
    </div>

                                            
<div class="panel-body">
    <form name="pca_form">
    <?php if( !isset($form_data) ){ ?>              
        <p>Problema Crónico</p>                                                   
        <div class="row row-cronico">
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Fecha de Diagnóstico:</label>
                    <div class="input-group">
                        <input type="text" name="pc1_01" class="form-control datepiker" placeholder="mm/dd/yyyy" data-date-format="dd-M-yyyy" id="datepicker_pc1_01">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div><!-- input-group --> 
                </div><!-- form-group -->
            </div><!-- col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Descripción:</label>
                    <textarea  name="pc1_02" class="form-control"></textarea>
                </div><!-- form-group -->
            </div><!-- col-sm-6 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Fecha de Resolución:</label>
                    <div class="input-group">
                        <input type="text" name="pc1_03" class="form-control datepiker" data-date-format="dd-M-yyyy" placeholder="mm/dd/yyyy" id="datepicker_pc1_03">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div><!-- input-group -->
                </div><!-- form-group -->
            </div><!-- col-sm-6 -->
        </div><!-- row -->                                                
        <?php if( !isset( $form_data['id']) ){ ?>
        <button class="btn btn-secondary" name="add_c_section">Agregar</button>
        <button class="btn btn-secondary" name="remove_c_section">Eliminar</button>
        <?php } ?>
        <br><br><br>
        <p>Problema Agudo</p>
        <div class="row row-agudo">
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Fecha de Diagnóstico:</label>
                    <div class="input-group">
                        <input type="text" name="pa1_01" class="form-control datepiker" data-date-format="dd-M-yyyy" placeholder="mm/dd/yyyy" id="datepicker_pa1_01">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div><!-- input-group -->
                </div><!-- form-group -->
            </div><!-- col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Descripción:</label>
                    <textarea  name="pa1_02" class="form-control"></textarea>
                </div><!-- form-group -->
            </div><!-- col-sm-6 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Fecha de Resolución:</label>
                    <div class="input-group">
                        <input type="text" name="pa1_03" class="form-control datepiker" data-date-format="dd-M-yyyy" placeholder="mm/dd/yyyy" id="datepicker_pa1_03">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div><!-- input-group -->
                </div><!-- form-group -->
            </div><!-- col-sm-6 -->
        </div><!-- row --> 
        <?php if( !isset( $form_data['id']) ){ ?>
        <button class="btn btn-secondary" name="add_a_section">Agregar</button>
        <button class="btn btn-secondary" name="remove_a_section">Eliminar</button>
        <?php } ?>     
    <?php }else{ 
        $counter = 1;
    ?>
        <p>Problemas Crónicos</p>
        <?php foreach ($form_data as $row) {
            if( $row['tipo'] == 0 ){ ?>
                <div class="row row-cronico">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Fecha de Diagnóstico:</label>
                            <div class="input-group">
                                <input type="text" name="pc<?= $counter;?>_01" class="form-control datepiker" data-date-format="dd-M-yyyy" placeholder="mm/dd/yyyy" id="datepicker_pc<?= $counter;?>_01" value="<?= $row['fecha_diagnostico']?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div><!-- input-group --> 
                        </div><!-- form-group -->
                    </div><!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Descripción:</label>
                            <textarea  name="pc<?= $counter;?>_02" class="form-control"><?= $row['descripcion']?></textarea>
                        </div><!-- form-group -->
                    </div><!-- col-sm-6 -->
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Fecha de Resolución:</label>
                            <div class="input-group">
                                <input type="text" name="pc<?= $counter;?>_03" data-date-format="dd-M-yyyy" class="form-control datepiker" placeholder="mm/dd/yyyy" id="datepicker_pc<?= $counter;?>_03" value="<?= $row['fecha_resolucion'];?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div><!-- input-group -->
                        </div><!-- form-group -->
                    </div><!-- col-sm-6 -->
                </div><!-- row --> 
                <?php $counter = $counter + 1;
            } //if
        } ?>

        <p>Problemas Agudos</p>
        <?php $counter = 1; 
            foreach ($form_data as $row) {
            if( $row['tipo'] == 1 ){ ?>
                <div class="row row-cronico">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Fecha de Diagnóstico:</label>
                            <div class="input-group">
                                <input type="text" name="pa<?= $counter;?>_01" data-date-format="dd-M-yyyy" class="form-control datepiker" placeholder="mm/dd/yyyy" id="datepicker_pa<?= $counter;?>_01" value="<?= $row['fecha_diagnostico']?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div><!-- input-group --> 
                        </div><!-- form-group -->
                    </div><!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Descripción:</label>
                            <textarea  name="pa<?= $counter;?>_02" class="form-control"><?= $row['descripcion']?></textarea>
                        </div><!-- form-group -->
                    </div><!-- col-sm-6 -->
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Fecha de Resolución:</label>
                            <div class="input-group">
                                <input type="text" name="pa<?= $counter;?>_03" data-date-format="dd-M-yyyy" class="form-control datepiker" placeholder="mm/dd/yyyy" id="datepicker_pa<?= $counter;?>_03" value="<?= $row['fecha_resolucion'];?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div><!-- input-group -->
                        </div><!-- form-group -->
                    </div><!-- col-sm-6 -->
                </div><!-- row --> 
                <?php $counter = $counter + 1;
            } //if
        }//foreach

    }//else
    ?>
    </form>
</div><!-- panel-body -->

                                            <div class="panel-footer">
                                                <?php if( $display_normal ){ ?>
                                                <button class="btn btn-primary" onclick="showModalManual('pca', '.panel-scm');">Guardar</button>
                                                <?php } ?>
                                                <button class="btn btn-primary" onclick="backto();">Regresar</button>
                                            </div><!-- panel-footer -->

                                        </div><!-- panel panel-default -->