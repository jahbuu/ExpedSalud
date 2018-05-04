<?php
$display_normal = 1;
if( isset( $form_data ) ){
    $display_normal = 0;
}
?>
<!--Examen Fisico-->

                                        <div class="panel panel-default">    

                                            <div class="panel-heading">
                                                <div class="panel-btns">
                                                    
                                                </div><!-- panel-btns -->
                                                <h4 class="panel-title">Examen Físico</h4>
                                                <p>Aregar información de Examen Físico al paciente.</p>
                                            </div>

                                            <div class="panel-body">
                                                <form name="ef_form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Presión Arterial:</label>
                                                                <textarea  name="ef_01" class="form-control"><?php if ( isset($form_data) ) echo $form_data['presion_arterial']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Peso:</label>
                                                                <textarea  name="ef_04" class="form-control"><?php if ( isset($form_data) ) echo $form_data['peso']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Frecuencia Cardiaca:</label>
                                                                <textarea  name="ef_02" class="form-control"><?php if ( isset($form_data) ) echo $form_data['frecuencia_cardiaca']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Talla:</label>
                                                                <textarea  name="ef_05" class="form-control"><?php if ( isset($form_data) ) echo $form_data['talla']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Frecuencia Respiratoria:</label>
                                                                <textarea  name="ef_03" class="form-control"><?php if ( isset($form_data) ) echo $form_data['frecuencia_respiratoria']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Temperatura:</label>
                                                                <textarea  name="ef_06" class="form-control"><?php if ( isset($form_data) ) echo $form_data['temperatura']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->                                               

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Apariencia:</label>
                                                                <textarea  name="ef_07" class="form-control"><?php if ( isset($form_data) ) echo $form_data['apariencia']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Cabeza y Cuello:</label>
                                                                <textarea  name="ef_08" class="form-control"><?php if ( isset($form_data) ) echo $form_data['cabeza']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Ojos:</label>
                                                                <textarea  name="ef_09" class="form-control"><?php if ( isset($form_data) ) echo $form_data['ojos']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">ORL:</label>
                                                                <textarea  name="ef_10" class="form-control"><?php if ( isset($form_data) ) echo $form_data['ORL']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Cardiopulmonar:</label>
                                                                <textarea  name="ef_11" class="form-control"><?php if ( isset($form_data) ) echo $form_data['cardiopulmonar']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Abdomen:</label>
                                                                <textarea  name="ef_12" class="form-control"><?php if ( isset($form_data) ) echo $form_data['abdomen']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Extremidades:</label>
                                                                <textarea  name="ef_13" class="form-control"><?php if ( isset($form_data) ) echo $form_data['extremidades']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Osteomuscular:</label>
                                                                <textarea  name="ef_14" class="form-control"><?php if ( isset($form_data) ) echo $form_data['osteomuscular']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">SNC:</label>
                                                                <textarea  name="ef_15" class="form-control"><?php if ( isset($form_data) ) echo $form_data['SNC']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Genitales:</label>
                                                                <textarea  name="ef_16" class="form-control"><?php if ( isset($form_data) ) echo $form_data['genitales']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Piel:</label>
                                                                <textarea  name="ef_17" class="form-control"><?php if ( isset($form_data) ) echo $form_data['piel']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div><!-- row -->
                                                </form>
                                            </div><!-- panel-body -->

                                            <div class="panel-footer">
                                                <?php if( $display_normal ){ ?>
                                                <button class="btn btn-primary" onclick="show_guardar_form_confirmation_modal('ef');">Guardar</button>
                                                <?php } ?>
                                                <button class="btn btn-primary" onclick="backto();">Regresar</button>
                                            </div><!-- panel-footer -->

                                        </div><!-- panel panel-default -->