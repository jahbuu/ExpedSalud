

<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="profile.html">
            <img class="img-circle" src="<?= $path ?>images/photos/profile.png" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading" id="loggedUserName"><?= $this->session->userdata('userdata')['nombre'] . " " . $this->session->userdata('userdata')['apellido']; ?></h4>
            <small class="text-muted"><?= $this->session->userdata('userdata')['titulo'] ?></small>
        </div>
    </div><!-- media -->
    
    <h5 class="leftpanel-title">Navigation</h5>
    <ul class="nav nav-pills nav-stacked">                
		<?php if($this->session->userdata('userdata')['role'] == 'med'){ ?>
			<li><a id="id_menu_agenda" href="#" onclick="goTo('calendar', 'Master/calendar', 0);" ><i class="fa fa-bars"></i> <span>Agenda</span></a></li>
			<li><a id="id_menu_directorio" href="#" onclick="goTo('directory', 'Master/directory', 0);"><i class="fa fa-map-marker"></i> <span>Directorio</span></a></li>
		<?php } ?>
    </ul>            
</div><!-- leftpanel -->