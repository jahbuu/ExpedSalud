    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-calendar"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="">Pages</a></li>
                    <li>Calendar</li>
                </ul>
                <h4>Calendar</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
            
    <div class="contentpanel">        
        <div class="row">                   
            <div class="col-md-12">
                <div id="calendar"></div>
            </div><!-- col-md-9 -->
        </div><!-- row -->
    </div><!-- contentpanel -->            

    <div class="modal fade bs-example-modal-tabs panel-newevents" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h4 class="modal-title">Agregar Cita</h4>
            </div>
            <div class="modal-body">                                
                <div class="panel-body nopadding">
                    <form class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Paciente</label>
                            <div class="col-sm-8">
                                <input id="add-event-select2" class="width100p dir-search" data-placeholder="¿A quien estás buscando?">
                            </div>
                        </div><!-- form-group -->                                
                        <div class="form-group">
                            <label class="control-label col-sm-4">Default Functionality</label>
                        <div class="input-group col-sm-8">
                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div><!-- input-group -->                                    
                        </div><!-- input-group -->          
                        <div class="btn-list">                                          
                            <button class="btn btn-primary btn-rounded" id="saveEvent" onclick="save();" data-dismiss="modal">Guardar</button>
                        </div>                                                    
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>  <!-- modaltabs -->      
