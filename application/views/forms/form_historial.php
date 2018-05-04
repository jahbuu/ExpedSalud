<?php
    //Historia Clinica
   //Historia Clinica
    if( $pid_hstry['hc_m'] == 0 ){
        $hc_m = "No hay registro de Historia Clínica";
        $hc_id = $hc_cnt = 0;        
    }else if( $pid_hstry['hc_m'] >= 1 ){
        $hc_d = $pid_hstry['hc_d'];
        $hc_id = $pid_hstry['hc_id'];
        $hc_cnt= $pid_hstry['hc_m'];
        $hc_m = '<a href="#" class="mr5" data-toggle="modal" data-target=".panel-hc-l">' . $hc_d . '</a>';       
    }

    //Examen Fisico
    if($pid_hstry['ef_m'] == 0 ){$ef_id = 0;
        $ef_m = "No hay registro de Exámenes Físicos";        
        $ef_id = $ef_cnt = 0;
    }else if( $pid_hstry['ef_m'] >= 1 ){
        $ef_d = $pid_hstry['ef_d'];
        $ef_id = $pid_hstry['ef_id'];
        $ef_cnt= $pid_hstry['ef_m'];
        $ef_m = '<a href="#" class="mr5" data-toggle="modal" data-target=".panel-ef-l">' . $ef_d . '</a>';                
    }

    //Problemas
    if( $pid_hstry['pca_m'] == 0 ){
        $pca_m = "No hay registro de Problemas";    
        $pca_id = $pca_cnt = 0;
    }else if( $pid_hstry['pca_m'] >= 1 ){
        $pca_d = $pid_hstry['pca_d'];
        $pca_id = $pid_hstry['pca_id'];
        $pca_cnt= $pid_hstry['pca_m'];
        $pca_m = '<a href="#" class="mr5" data-toggle="modal" data-target=".panel-pca-l">' . $pca_d . '</a>';                
    }

    //Examen de Laboratorio
    if( $pid_hstry['el_m'] == 0 ){
        $el_m = "No hay registro de Exámenes de Laboratorio";
        $el_id = $el_cnt = 0;
    }else if( $pid_hstry['el_m'] >= 1 ){
        $el_d = $pid_hstry['el_d'];
        $el_id = $pid_hstry['el_id'];
        $el_cnt= $pid_hstry['el_m'];
        $el_m = '<a href="#" class="mr5" data-toggle="modal" data-target=".panel-el-l">' . $el_d . '</a>';                
    }

    //Examen de Gabinete
    if( $pid_hstry['eg_m'] == 0 ){
        $eg_m = "No hay registro de Historia Clínica";
        $eg_id = $eg_cnt = 0;
    }else if( $pid_hstry['eg_m'] >= 1 ){
        $eg_d = $pid_hstry['eg_d'];
        $eg_id = $pid_hstry['eg_id'];
        $eg_cnt= $pid_hstry['eg_m'];
        $eg_m = '<a href="#" class="mr5" data-toggle="modal" data-target=".panel-eg-l">' . $eg_d . '</a>';                
    }

    //Referencias
    if( $pid_hstry['rs_m'] == 0 ){
        $rs_m = "No hay registro de Referencias";
        $rs_id = $rs_cnt = 0;
    }else if( $pid_hstry['rs_m'] >= 1 ){
        $rs_d = $pid_hstry['rs_d'];
        $rs_id = $pid_hstry['rs_id'];
        $rs_cnt= $pid_hstry['rs_m'];
        $rs_m = '<a href="#" class="mr5" data-toggle="modal" data-target=".panel-rs-l">' . $rs_d . '</a>';        
    }

?>

<div class="activity-list">
                                            
                                  
                                        <div class="media">

                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-hc"><strong>Historia Clínica</strong></a><br /> 
                                                <small class="text-muted">Última actualización: <?= $hc_m; ?></small>
                                                <?php if( $hc_cnt > 1 ){ ?>
                                                 <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('hc'); ">Ver más</button>
                                                <?php }?> 
                                                <input type="hidden" id="hc_value" value="<?= $hc_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-ef"><strong>Examen Físico</strong></a><br />
                                                <small class="text-muted">Última actualización:<?= $ef_m; ?></small>
                                                <?php if( $ef_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('ef'); ">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="ef_value" value="<?= $ef_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->    

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-pca"><strong>Lista de problemas</strong></a><br />
                                                <small class="text-muted">Última actualización: <?= $pca_m; ?></small>
                                                <?php if( $pca_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('pca'); ">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="pca_value" value="<?= $pca_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->    

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-el"><strong>Examen de Laboratorio</strong></a><br />
                                                <small class="text-muted">Última actualización: <?= $el_m; ?></small>
                                                <?php if( $el_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('el'); ">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="el_value" value="<?= $el_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-eg"><strong>Examen de Gabinete</strong></a><br />
                                                <small class="text-muted">Última actualización: <?= $eg_m; ?></small>
                                                <?php if( $eg_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('eg'); ">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="eg_value" value="<?= $eg_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-rs"><strong>Referencias</strong></a><br />
                                                <small class="text-muted">Última actualización: <?= $rs_m; ?></small>
                                                <?php if( $rs_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('rs'); ">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="rs_value" value="<?= $rs_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->


                                        </div><!-- activity-list -->