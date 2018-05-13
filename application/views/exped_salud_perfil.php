<?php    
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

                
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li><a href="">Pages</a></li>
                                    <li>Profile Page</li>
                                </ul>
                                <h4>Profile Page</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
					
					
                    <div class="contentpanel">
                        
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="text-center">
                                    <img src="<?= $path ?>images/photos/profile-big.jpg" class="img-circle img-offline img-responsive img-profile" alt="" />
                                    <h4 class="profile-name mb5"> <?= $this->session->userdata('profile_data')['apellido'] . " " . $this->session->userdata('profile_data')['apellido_2'] . ", " . $this->session->userdata('profile_data')['nombre'] ?> </h4>
                                    
                                    <div><!--i class="fa fa-briefcase"--></i> Nº de identificación: <?= $this->session->userdata('profile_data')['cedula'];?></div>
                                    
                                    
                                
                                    <div class="mb20"></div>
                                
                                    
                                </div><!-- text-center -->
                                
                                <br />
                              
                                <h5 class="md-title">Ficha de identificación</h5>
                                <ul class="list-unstyled social-list">
                                    <li><i class="fa fa-map-marker"></i>Fecha de Nacimiento: <?= $this->session->userdata('profile_data')['fecha_nacimiento'];?></li>
                                    <li><i class="fa fa-map-marker"></i>Sexo: <?= $this->session->userdata('profile_data')['sexo'];?></li>
                                    <li><i class="fa fa-map-marker"></i>Estado Civil: <?= $this->session->userdata('profile_data')['estado_civil'];?></li>
                                    <li><i class="fa fa-map-marker"></i>Nacionalidad: <?= $this->session->userdata('profile_data')['nacionalidad'];?></li>
                                    <li><i class="fa fa-map-marker"></i>Empresa: <?= $this->session->userdata('profile_data')['empresa'];?></li>
                                    <li><i class="fa fa-map-marker"></i>Ocupación: <?= $this->session->userdata('profile_data')['departamento'];?></li>
                                    <li><i class="fa fa-map-marker"></i>Teléfono: <?= $this->session->userdata('profile_data')['telefono'];?></li>                                                                        
                                    
                                </ul>

                                <!--h5 class="md-title">About</h5>
                                <p class="mb30">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat... <a href="">Show More</a></p-->
                              
                              
                              
                                
                              
                            </div><!-- col-sm-4 col-md-3 -->
                            
                            <div class="col-sm-8 col-md-9">
                              
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-line">
                                    
                                    <li class="active"><a href="#actividad" data-toggle="tab"><strong>Actividad</strong></a></li>
                                    <li><a href="#historial" data-toggle="tab"><strong>Historial</strong></a></li>
                                    
                                    
                                </ul>
                            
                                <!-- Tab panes -->
                                <div class="tab-content nopadding noborder">
                                    
                                    
                                    <div class="tab-pane active" id="actividad">
                                
                                        <div class="follower-list">
                                            <?php

                                           if ( $pid_evnts !== FALSE ){
                                            foreach ($pid_evnts as $result) {
                                               # code...
                                           

                                           ?>
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="holder.js/100x100" alt="" />
                                                </a>
                                                <div class="media-body">
                                                    <h3 class="follower-name"><?= $result->fecha?>, 09:15am</h3>
                                                    <div><i class="fa fa-map-marker"></i> Juan Pèrez, Mèdico General</div>
                                                    <div><i class="fa fa-briefcase"></i> Control Anual  </div>
                                      
                                                    <div class="mb20"></div>
                                      
                                                    <div class="btn-toolbar">
                                                        <div class="btn-group">
                                                            <button class="btn btn-dark btn-xs" id="result987"><i class="fa fa-folder-open-o"></i> Resultados</button>
                                                        </div><!-- btn-group -->
                                                                                                                
                                                    </div><!-- btn-toolbar -->
                                                </div><!-- media-body -->
                                            </div><!-- media -->

                                            <?php } 
                                        }else{
                                            ?>

                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="holder.js/100x100" alt="" />
                                                </a>
                                                <div class="media-body">
                                                    <h3 class="follower-name"><?= "No se encontraron resultados"?></h3>
                                                    
                                      
                                                    <div class="mb20"></div>
                                      
                                                    <div class="btn-toolbar">
                                                        
                                                                                                                
                                                    </div><!-- btn-toolbar -->
                                                </div><!-- media-body -->
                                            </div><!-- media -->

                                            <?php
                                        }
                                        ?>
                                        </div><!--follower-list -->
                                    </div><!-- tab-pane -->
                                    
                                    <div class="tab-pane" id="historial">
                                        <div class="activity-list">
                                            
                                  
                                        <div class="media">

                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-hc">
                                                <?php } ?>
                                                <strong>Historia Clínica</strong>
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                </a>
                                                <?php } ?>
                                                <br/> 
                                                <small class="text-muted">Última actualización: <?= $hc_m; ?></small>
                                                <?php if( $hc_cnt > 1 ){ ?>
                                                 <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('hc', '<?= $this->session->userdata('profile_data')['id'];?>')">Ver más</button>
                                                <?php }?> 
                                                <input type="hidden" id="hc_value" value="<?= $hc_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-ef">
                                                <?php } ?>
                                                <strong>Examen Físico</strong>
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                </a>
                                                <?php } ?>
                                                <br />
                                                <small class="text-muted">Última actualización:<?= $ef_m; ?></small>
                                                <?php if( $ef_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('ef', '<?= $this->session->userdata('profile_data')['id'];?>')">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="ef_value" value="<?= $ef_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->    

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-pca">
                                                <?php } ?>
                                                <strong>Medicamentos crónicos</strong>
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                </a>
                                                <?php } ?>
                                                <br />
                                                <small class="text-muted">Última actualización: <?= $pca_m; ?></small>
                                                <?php if( $pca_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('pca', '<?= $this->session->userdata('profile_data')['id'];?>') ">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="pca_value" value="<?= $pca_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->    

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-el">
                                                <?php } ?>
                                                <strong>Examen de Laboratorio</strong>
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                </a>
                                                <?php } ?>
                                                <br />
                                                <small class="text-muted">Última actualización: <?= $el_m; ?></small>
                                                <?php if( $el_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('el', '<?= $this->session->userdata('profile_data')['id'];?>') ">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="el_value" value="<?= $el_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-eg">
                                                <?php } ?>
                                                <strong>Examen de Gabinete</strong>
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                </a>
                                                <?php } ?>
                                                <br />
                                                <small class="text-muted">Última actualización: <?= $eg_m; ?></small>
                                                <?php if( $eg_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('eg', '<?= $this->session->userdata('profile_data')['id'];?>')">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="eg_value" value="<?= $eg_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                <a href="#"  class="mr5" data-toggle="modal" data-target=".panel-rs">
                                                <?php } ?>
                                                <strong>Referencias</strong>
                                                <?php if( $this->session->userdata('userdata')['role'] == 'med' ){ ?>
                                                </a>
                                                <?php } ?>
                                                <br />
                                                <small class="text-muted">Última actualización: <?= $rs_m; ?></small>
                                                <?php if( $rs_cnt > 1 ){ ?>
                                                <button class="btn btn-xs btn-primary btn-bordered" onclick="view_more('rs', '<?= $this->session->userdata('profile_data')['id'];?>')">Ver más</button>
                                                <?php } ?>
                                                <input type="hidden" id="rs_value" value="<?= $rs_id; ?>"></input>
                                            </div><!-- media-body -->
                                        </div><!-- media -->


                                        </div><!-- activity-list -->
                                    
                                     </div><!-- tab-pane -->
                                
                                
                                    
                                    <div class="tab-pane" id="formularios">
                                
                                        

                                        
                                    
                                        

                                    

                                        


                                    </div><!-- tab-pane -->
                                
                            </div><!-- tab-content -->
                              
                            </div><!-- col-sm-9 -->
                        </div><!-- row -->  
                    
                    </div><!-- contentpanel -->
                    
               

        <!-- MODALES -->

        <!-- Ver Formularios -->
        <!-- HC -->
        

        <!-- Ver Formularios -->
        <!-- HC -->
        <div class="modal fade bs-example-modal-panel panel-hc-l" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Ver formulario</h3>
                    <p>Desea cargar el formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('hc', $('#hc_value').val());">Si</button>
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- EF -->
        <div class="modal fade bs-example-modal-panel panel-ef-l" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Ver formulario</h3>
                    <p>Desea cargar el formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('ef', $('#ef_value').val());">Si</button>
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- PCA -->
        <div class="modal fade bs-example-modal-panel panel-pca-l" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Ver formulario</h3>
                    <p>Desea cargar el formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('pca', $('#pca_value').val());"">Si</button>
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- EG -->
        <div class="modal fade bs-example-modal-panel panel-el-l" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Ver formulario</h3>
                    <p>Desea cargar el formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick=";">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('el', $('#el_value').val());">Si</button>
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- EL -->
        <div class="modal fade bs-example-modal-panel panel-eg-l" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Ver formulario</h3>
                    <p>Desea cargar el formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('eg', $('#eg_value').val());">Si</button>
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- RS -->
        <div class="modal fade bs-example-modal-panel panel-rs-l" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Ver formulario</h3>
                    <p>Desea cargar el formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('rs', $('#rs_value').val());" >Si</button>
                </div>
            </div>


              </div>
            </div>
        </div>

        <!-- Agregar formularios -->
        <!-- HC -->
        <div class="modal fade bs-example-modal-panel panel-hc" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Adición de formulario</h3>
                    <p>Está seguro de que desea agregar un formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="$('.panel-hc').modal('hide');">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('hc');">Si</button>
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- EF -->
        <div class="modal fade bs-example-modal-panel panel-ef" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Adición de formulario</h3>
                    <p>Está seguro de que desea agregar un formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="$('.panel-ef').modal('hide');">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('ef');">Si</button>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- PCA -->
        <div class="modal fade bs-example-modal-panel panel-pca" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Adición de formulario</h3>
                    <p>Está seguro de que desea agregar un formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="$('.panel-pca').modal('hide');">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('pca');">Si</button>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- EG -->
        <div class="modal fade bs-example-modal-panel panel-el" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Adición de formulario</h3>
                    <p>Está seguro de que desea agregar un formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="$('.panel-el').modal('hide');">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('el');">Si</button>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- EL -->
        <div class="modal fade bs-example-modal-panel panel-eg" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Adición de formulario</h3>
                    <p>Está seguro de que desea agregar un formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="$('.panel-eg').modal('hide');">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('eg');">Si</button>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- RS -->
        <div class="modal fade bs-example-modal-panel panel-rs" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Adición de formulario</h3>
                    <p>Está seguro de que desea agregar un formulario </p>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="$('.panel-rs').modal('hide');"">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="getFormLayoutConfirm('rs');">Si</button>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- Confirmación de guardado -->
        <!-- Save confirmation -->
        <div class="modal fade bs-example-modal-panel panel-scm" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Guardar</h3>
                    <p>Está seguro que desea agregar el formulario al expediente del paciente </p>
                    <input class="hidden" id="save_confirmation_value"></input>
                    <input class="hidden" id="save_confirmation_pid"></input>
                    
                </div>
                <div class="panel-body">
                    <button class="btn btn-default btn-bordered" onclick="$('.panel-scm').modal('hide');">Cancelar</button>
                    <button class="btn btn-primary btn-bordered" onclick="addFormDataConfirm();">Si</button>
                </div>
            </div>

              </div>
            </div>
        </div>

        <!-- Success -->
        <div class="modal fade bs-example-modal-panel panel-scss" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                  
              <div class="panelt panel-default">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Información guardada</h3>
                    <p>La información ha sido guardad correctamente </p>
                    <input class="hidden" id="save_confirmation_value"></input>
                    
                </div>
                <div class="panel-body">                    
                    <button class="btn btn-default btn-bordered" onclick="$('.panel-scss').modal('hide');">Ok</button>
                </div>
            </div>

              </div>
            </div>
        </div>
