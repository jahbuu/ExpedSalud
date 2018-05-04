 <?php
                    foreach ($drtr_results as $result) {
                        # code...
                    ?>    
                        <a href="#" onclick="go_to_perfil(<?= $result->id ?>);" class="list-group-item">
                            <div class="media">
                                <div class="pull-left">
                                    <img class="img-circle img-online" src="<?= $path ?>images/photos/user1.png" alt="...">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?= $result->apellido . " " . $result->apellido_2 . ", " . $result->pnombre ;?><small><?= $result->ocupacion;?></small></h4>
                                    <div class="media-content">
                                        <i class="fa fa-map-marker"></i> <?= $result->direccion;?>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-skype"></i> <?= $result->username;?> </li>
                                            <li><i class="fa fa-mobile"></i> <?= $result->telefono;?> </li>
                                            <li><i class="fa fa-envelope-o"></i> <?= $result->email;?> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- media -->
                        </a><!-- list-group -->
                    <?php }