<header>
    <div class="headerwrapper">
        <div class="header-left">
            <a href="#" class="logo">
                <img src="<?=$path ?>images/image002.png" alt="Chain Logo" >
            </a>
            <div class="pull-right">
                <a href="" class="menu-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div><!-- header-left -->        
        <div class="header-right">            
            <div class="pull-right">                                                
                <div class="btn-group btn-group-list btn-group-notification">
                                        

                    <a href="#" class="btn btn-dark btn-sm mr5" data-toggle="modal" data-target=".panel-addEvent"><i class="fa fa-book"></i></a>
                </div><!-- btn-group -->                
                <div class="btn-group btn-group-option">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">                                            
                      <li><a href="<?= $path; ?>index.php/Master/logout"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                    </ul>
                </div><!-- btn-group -->
                
            </div><!-- pull-right -->
            
        </div><!-- header-right -->
        
    </div><!-- headerwrapper -->
</header>