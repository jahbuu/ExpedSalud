<!-- Examenes de Laboratorio -->
<?php
	$panel_title = "";
	$panel_title_desc = "";
    $download_message = "";
    $i_form_data="";
    $href="";
    
    $display_normal=0;
    $display_details=0;
    $display_link=0;
    $i_form_data=0;
    if( isset( $form_data ) ){
        $file = explode("---", $form_data['enlace']);        
        if ( $form_data['descripcion'] != ""){
            $display_details=1;
        }
        if ( $form_data['descripcion'] == ""){
            $i_form_data=1;
            $display_link=1;
        }
    }else{
        $display_normal=1;
    }

    if( $i_form_data) $href= $path . "user_files/" . $this->session->userdata('profile_data')['id'] . "/" . $form_value . "/" . $form_data['enlace'];

    switch($form_value){
        case 'eg':
            $panel_title = "Exámenes de Gabinete";
            $panel_title_desc = "Agregar infomación de los Exámenes de Gabinete al paciente.";      
            $download_message = "Descargar documento del Examen de Gabinete";
            
            break;
        case 'el':
            $panel_title = "Exámenes de Laboratorio";
            $panel_title_desc = "Agregar infomación de los Exámenes de Laboratorio al paciente.";       
            $download_message = "Descargar documento del Examen de Laboratorio";
            break;
        case 'rs':
            $panel_title = "Referencias";
            $panel_title_desc = "Agregar infomación de Referencias al paciente.";       
            $download_message = "Descargar documento de Referencia";
            break;
    }

?>

                                        <div class="panel panel-default">    

                                            <div class="panel-heading">
                                                <div class="panel-btns">
                                                    
                                                </div><!-- panel-btns -->
                                                <h4 class="panel-title"><?= $panel_title; ?></h4>
                                                <p><?= $panel_title_desc; ?></p>
                                            </div>

                                            <div class="panel-body">
                                                    <?php if($display_details || $display_normal){  ?>                                             
                                                    <form name="<?= $form_value;?>_form">
                                                        <?php if($display_normal){  ?>
                                                        <div class="row">
                                                            <div class="rdio rdio-default col-sm-3">
                                                            <input type="radio" name="radio" id="radioDefault" value="1" checked="checked" />
                                                            <label for="radioDefault">Comentarios</label>
                                                        </div>
                                                          
                                                        <div class="rdio rdio-primary col-sm-3">
                                                            <input type="radio" name="radio" value="2" id="radioPrimary" />
                                                            <label for="radioPrimary">Adjuntar Documento</label>
                                                        </div>
                                                        </div><!-- row -->
                                                        <?php } ?>
                                                        
                                                        <div class="row radioval1">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Detalle:</label>
                                                                        <textarea  name="<?= $form_value;?>_01" class="form-control"><?php if ( isset($form_data) ) echo $form_data['descripcion']; ?></textarea>
                                                                    </div><!-- form-group -->
                                                                </div><!-- col-sm-6 -->                                                         
                                                        </div><!-- row -->
                                                        
                                                    </form>
                                                     <?php } ?>

                                                <?php if( $display_link ){  ?>
                                                    <div class="row radioval2">
                                                        <a class="mr5" href="<?= $href;?>" download><?= $download_message;?></a>
                                                    </div><!-- row -->            
                                                <?php }else if( $display_normal ){ ?>
                                                    <div class="row hidden radioval2">
                                                        <form action="<?= $path . 'index.php/Cdropzone/upload' ?>" class="dropzone">
                                                            <input type="hidden" name="hidden_dz1" value="<?= $this->session->userdata('profile_data')['id'] ?>"></input>
                                                            <div class="fallback">
                                                                <input type="file" multiple />
                                                            </div>
                                                        </form>
                                                    </div><!-- row -->                                         
                                                <?php } ?>
                                                                                          
                                            </div><!-- panel-body -->

                                            <div class="panel-footer">
                                                <?php if( $display_normal ){ ?>
                                                <button class="btn btn-primary" onclick="showModalManual('<?= $form_value;?>', '.panel-scm');">Guardar</button>
                                                <?php } ?>
                                                <button class="btn btn-primary" onclick="backto();">Regresar</button>
                                            </div><!-- panel-footer -->

                                        </div><!-- panel panel-default -->