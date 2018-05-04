
<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-user"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="">Pages</a></li>
                <li>People Directory</li>
            </ul>
            <h4>People Directory</h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->

<div class="contentpanel">
    
    <div class="row">
        <div class="col-sm-3">                                
            <h5 class="md-title">Reciente</h5>
            <div class="list-group people-group">
				<a href="#" class="list-group-item">
                    <div class="media">
                        <div class="pull-left">
                            <img class="img-circle img-offline" src="<?= $path ?>images/photos/user4.png" alt="...">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Nusja Nawancali</h4>
                            <small>Software Engineer</small>
                        </div>
                    </div><!-- media -->
                </a><!-- list-group -->
                <a href="#" class="list-group-item">
                    <div class="media">
                        <div class="pull-left">
                            <img class="img-circle img-offline" src="<?= $path ?>images/photos/user2.png" alt="...">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Renov Leonga</h4>
                            <small>Software Engineer</small>
                        </div>
                    </div><!-- media -->
                </a><!-- list-group -->
                <a href="#" class="list-group-item">
                    <div class="media">
                        <div class="pull-left">
                            <img class="img-circle img-offline" src="<?= $path ?>images/photos/user3.png" alt="...">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Zaham Sindilmaca</h4>
                            <small>Software Engineer</small>
                        </div>
                    </div><!-- media -->
                </a><!-- list-group -->
                <a href="#" class="list-group-item">
                    <div class="media">
                        <div class="pull-left">
                            <img class="img-circle img-offline" src="<?= $path ?>images/photos/user4.png" alt="...">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Nusja Nawancali</h4>
                            <small>Software Engineer</small>
                        </div>
                    </div><!-- media -->
                </a><!-- list-group -->
				<a href="#" class="list-group-item">
                    <div class="media">
                        <div class="pull-left">
                            <img class="img-circle img-offline" src="<?= $path ?>images/photos/user4.png" alt="...">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Nusja Nawancali</h4>
                            <small>Software Engineer</small>
                        </div>
                    </div><!-- media -->
                </a><!-- list-group -->
            </div><!-- list-group -->            
        </div><!-- col-sm-3 -->
        <div class="col-sm-9">
            
            <div class="well mt10">
                <div class="row">
                    <div class="col-sm-12">
                        <input id="search-type" class="width100p dir-search" data-placeholder="¿A quien estás buscando?">
                            
                        
                    </div>
                    <!--div class="col-sm-3">
                        <select id="search-type" class="width100p" data-placeholder="Search Type">
                            <option value="">Choose One</option>
                            <option value="Full Name" selected>Full Name</option>
                            <option value="Position">Position</option>
                            <option value="Company">Company</option>
                        </select>
                    </div-->
                </div>
            </div><!-- well -->
            
            <br />
            
            <div class="pull-right">
                <ul class="directory-pagination pagination pagination-split pagination-sm pagination-contact">
                    <li class="disabled btn-pagination-back"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>                    
                    <li class="disabled btn-pagination-next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    <li class="hidden pagination-pages"><?= $pages; ?></li>
                </ul>
            </div>
            <h3 class="xlg-title">All Contacts</h3>
            
            <div class="list-group contact-group">

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
                ?>
            </div><!-- list-group -->
        </div><!-- col-sm-9 -->
    </div><!-- row -->                      
</div><!-- contentpanel -->                    