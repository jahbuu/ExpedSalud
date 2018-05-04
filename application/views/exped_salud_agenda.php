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
            
           
 

	<div class="contentpanel" style="display:none">
        <div class="panel panel-default">
            <div class="myModal">
    			<div class="panel-heading">                        
                    <h4 class="panel-title">Input Fields</h4>
                    <p>Individual form controls automatically receive some global styling. All textual elements with <code>.form-control</code> are set to width: 100%; by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing.</p>
                </div><!-- panel-heading -->                    
                <div class="panel-body nopadding">
                    <form class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Default Input</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Default Input" class="form-control" />
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="disabledinput">Disabled Input</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Disabled Input" id="disabledinput" class="form-control" disabled="" />
                            </div>
                        </div><!-- form-group -->    
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="readonlyinput">Read-Only Input</label>
                            <div class="col-sm-8">
                                <input type="text" value="Read Only Input" id="readonlyinput" class="form-control" readonly="readonly" />
                            </div>
                        </div><!-- form-group -->    
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Help Text</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Help Text" class="form-control">
                                <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Input w/ Tooltip</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Hover me" title="Tooltip goes here" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" />
                            </div>
                        </div><!-- form-group -->
                    </form>          
                </div><!-- panel-body -->       
            </div><!-- panel -->
        </div>
    </div>
    <div class="contentpanel">
        <div class="row">                   
            <div class="col-md-12">
                <div id="calendar"></div>
            </div><!-- col-md-9 -->
        </div><!-- row -->
    </div><!-- contentpanel -->            

    <div class="modal fade bs-example-modal-tabs" tabindex="-1" role="dialog">
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
                                <input type="text" placeholder="Buscar paciente" class="form-control" />
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
