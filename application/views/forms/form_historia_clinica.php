<?php
$display_normal = 1;
if( isset( $form_data ) ){
    $display_normal = 0;
}
?>
<!--Historia Clinica-->

                                        <div class="panel panel-default">    

                                            <div class="panel-heading">
                                                <div class="panel-btns">
                                                    
                                                </div><!-- panel-btns -->
                                                <h4 class="panel-title">Historia Clínica</h4>
                                                <p>Aregar información de Historia Clínica al paciente.</p>
                                            </div>

                                            <div class="panel-body">
                                                <form name="hc_form">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">AHF:</label>
                                                                <textarea  name="hc_01" class="form-control"><?php if ( isset($form_data) ) echo $form_data['ahf']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->                                                              
                                                    </div><!-- row -->
                                              
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">PnP Tabaquismo:</label>
                                                                <textarea  name="hc_02" class="form-control"><?php if ( isset($form_data) ) echo $form_data['pnp_tabaquismo']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->                                                              
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">PnP Etilismo:</label>
                                                                <textarea  name="hc_03" class="form-control"><?php if ( isset($form_data) ) echo $form_data['pnp_etilismo']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->                                                              
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">APP Médicos:</label>
                                                                <textarea  name="hc_04" class="form-control"><?php if ( isset($form_data) ) echo $form_data['app_medicos']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->                                                              
                                                    </div><!-- row -->    

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">APP Traumáticos:</label>
                                                                <textarea  name="hc_05" class="form-control"><?php if ( isset($form_data) ) echo $form_data['app_traumaticos']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->                                                              
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">APP Quirúrjicos:</label>
                                                                <textarea  name="hc_06" class="form-control"><?php if ( isset($form_data) ) echo $form_data['app_quirurjicos']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->                                                              
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Alergia a medicamentos</label>
                                                                <textarea  name="hc_07" class="form-control"><?php if ( isset($form_data) ) echo $form_data['alergia_medicamentos']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->                                                              
                                                    </div><!-- row -->

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Algo</label>
                                                                <textarea  name="hc_08" class="form-control"><?php if ( isset($form_data) ) echo $form_data['ago']; ?></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->                                                              
                                                    </div><!-- row -->  
                                                </form>                                      
                                            </div><!-- panel-body -->

                                            <div class="panel-footer">
                                                <?php if( $display_normal ){ ?>
                                                <button class="btn btn-primary" onclick="show_guardar_form_confirmation_modal('hc', '<?= $this->session->userdata('profile_data')['id']; ?>');" >Guardar</button>
                                                <?php } ?>
                                                <button class="btn btn-primary" onclick="backto('<?= $this->session->userdata('profile_data')['id']; ?>');">Regresar</button>
                                            </div><!-- panel-footer -->

                                        </div><!-- panel panel-default -->