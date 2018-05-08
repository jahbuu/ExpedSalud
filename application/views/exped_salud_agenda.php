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

    <div class="modal fade bs-example-modal-tabs panel-addEvent" id="panel-addEvent" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h4 class="modal-title">Agregar Cita</h4>
            </div>
            <div class="modal-body">                                
                <div class="panel-body nopadding">
                    <form class="form-horizontal form-bordered form-addEvent" name="form-addEvent">
                        <div class="form-group col-sm-6">
                            <label for="add-event-select2">Paciente</label>                    
                            <input id="add-event-select2" name="patient_id[]" class="width100p dir-search" data-placeholder="¿A quien estás buscando?">
                        </div><!-- form-group -->                                
                        <div class="form-group col-sm-6 hidden">
                            <label for="add-event-select2">Paciente</label>                    
                            <input readonly id="add-event" type="input" class="width100p dir-search" data-placeholder="">
                        </div><!-- form-group -->                        
                        <div class="form-group col-sm-6 pull-right">
                            <label for="datepiker">Fecha</label>
                            <input type="text" class="form-control" data-date-format="d-M-y" placeholder="d-M-y" id="datepicker" name="start"></input>
                            <!--span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span-->
                        </div><!-- input-group -->
                        <div class="form-group col-sm-12 pull-left">
                            <label for="">Asunto</label>
                            <textarea class="form-control" id="title" name="title" rows="5"></textarea>
                        </div><!-- input-group -->                                  
                        <div class="form-group col-sm-12 pull-right hidden">                            
                            <input type="text" class="form-control" id="eventID" name="event_id">
                            <input id="patient_id" name="patient_id[]" type="input" class="width100p dir-search" data-placeholder="">
                            <!--span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span-->
                        </div><!-- input-group -->
                    </form>
                </div>
            </div>
            <div class="modal-footer">                
                <button class="btn btn-primary btn-rounded" id="saveEvent" onclick="addCalendarEvent();" data-dismiss="modal">Guardar</button>
            </div>
          </div>
        </div>
    </div>  <!-- modaltabs -->      
