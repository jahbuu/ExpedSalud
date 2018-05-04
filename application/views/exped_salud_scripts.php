            <script src="<?= $path ?>js/jquery-1.11.1.min.js"></script>
            <script src="<?= $path ?>js/jquery-migrate-1.2.1.min.js"></script>
            <script src="<?= $path ?>js/bootstrap.min.js"></script>
            <script src="<?= $path ?>js/modernizr.min.js"></script>
            <script src="<?= $path ?>js/pace.min.js"></script>
            <script src="<?= $path ?>js/retina.min.js"></script>
            <script src="<?= $path ?>js/jquery.cookies.js"></script>
            <script src="<?= $path ?>js/jquery-ui-1.10.3.min.js"></script>
            <script src="<?= $path ?>js/moment.min.js"></script>
            <script src="<?= $path ?>js/fullcalendar.min.js"></script>
            <script src="<?= $path ?>js/jquery.ui.touch-punch.min.js"></script>	
            <script src="<?= $path ?>js/jquery.autogrow-textarea.js"></script>
            <script src="<?= $path ?>js/jquery.mousewheel.js"></script>
            <script src="<?= $path ?>js/jquery.tagsinput.min.js"></script>
            <script src="<?= $path ?>js/toggles.min.js"></script>
            <script src="<?= $path ?>js/bootstrap-timepicker.min.js"></script>
            <script src="<?= $path ?>js/jquery.maskedinput.min.js"></script>
            <script src="<?= $path ?>js/select2.min.js"></script>
            <script src="<?= $path ?>js/colorpicker.js"></script>
            <script src="<?= $path ?>js/dropzone.min.js"></script>
            <script src="<?= $path ?>js/jquery.dataTables.min.js"></script>
            

            <script src="<?= $path ?>js/custom.js"></script>
                <script>
                jQuery(document).ready(function() {                            
                    init_calendar();
                });    /* initialize the external events */  
                    
                
               
                
           

                $("ui-datepicker").attr('z-index', '10000 !important');
            </script>
            <script>

                //Views function
                function init_agenda(){

                }
                function update_pagination(side){

                    
                    //ajax to getPaginationTabs

                }
                function init_directorio(side = 0){                    
                    // Select2                    
                    var $mysel = $("#search-type");
                    $mysel.select2({
                        placeholder:'Srchng fr',
                        ajax: {
                            url:'<?= $path;?>/index.php/Master/getDirectory',
                            type:'POST',
                            dataType:'json',
                            delay:250,
                            data: function(params){
                                //alert(JSON.stringify(params));
                                return {
                                    q: params,                                    
                                    page :  $(".directory-pagination li.pagination-pages").html()
                                };                            
                            },
                            results: function (data, params) {
                                

                       
                                return {
                                    results: data.results
                                };
                            },
                            cache:true
                        },                    
                    });

                                                        
                    $mysel.change(function() {
                      go_to_perfil(this.value);
                    });

                    
                    
                    
                }

                function refresh_directorio(side = 0){
                        ajax_request( 
                            'POST', 
                            '<?= $path . "index.php/Master/getHistory" ; ?>',
                            'false',  
                            data,                  
                            function(data){                        
                                $("#historial").html(data);                                   
                            },
                            function(){
                                //alert("error");
                        });

                }


                function init_perfil(){

                }


                //Calendar function
                function init_calendar(){
                    jQuery('#external-events div.external-event').each(function() {
                                  
                            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                            // it doesn't need to have a start or end
                            var eventObject = {
                                title: $.trim($(this).text()) // use the element's text as the event title
                            };
                                          
                            // store the Event Object in the DOM element so we can get to it later
                            jQuery(this).data('eventObject', eventObject);
                                          
                            // make the event draggable using jQuery UI
                            jQuery(this).draggable({
                                zIndex: 999,
                                revert: true,      // will cause the event to go back to its
                                revertDuration: 0  //  original position after the drag
                            });
                        });                    
                        /* initialize the calendar */  
                        jQuery('#calendar').fullCalendar({
                            header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'month,agendaWeek,agendaDay'
                            },
                            editable: true,
                            droppable: true, // this allows things to be dropped onto the calendar !!!
                            drop: function(date, allDay) { // this function is called when something is dropped                                  
                                // retrieve the dropped element's stored Event Object
                                var originalEventObject = jQuery(this).data('eventObject');
                                                  
                                // we need to copy it, so that multiple events don't have a reference to the same object
                                var copiedEventObject = $.extend({}, originalEventObject);
                                                  
                                // assign it the date that was reported
                                copiedEventObject.start = date;
                                copiedEventObject.allDay = allDay;
                                                  
                                // render the event on the calendar
                                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                                jQuery('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                                                  
                                // is the "remove after drop" checkbox checked?
                                if (jQuery('#drop-remove').is(':checked')) {
                                    // if so, remove the element from the "Draggable Events" list
                                    jQuery(this).remove();
                                }
                            },
                            eventClick: function(calEvent, jsEvent, view) {
                                //alert('Event: ' + calEvent.title);
                                //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                                //alert('View: ' + view.name);
                                // change the border color just for fun
                                $(this).css('border-color', 'red');
                                $(this).css('addClass', 'modal');                                
                                //$('.contentpanel0').css("display", "inherit");                                
                                $('.myModal').modal( {
                                        escapeClose: true,
                                        clickClose: false,
                                        showClose: false
                                });
                            }
                        }
                    ); 
                    // Tags Input
                    jQuery('#tags').tagsInput({width:'auto'});
                     
                    // Textarea Autogrow
                    jQuery('#autoResizeTA').autogrow();

                    // Spinner
                    var spinner = jQuery('#spinner').spinner();
                    spinner.spinner('value', 0);

                    // Form Toggles
                    jQuery('.toggle').toggles({on: true});

                    // Time Picker
                    jQuery('#timepicker').timepicker({defaultTIme: false});
                    jQuery('#timepicker2').timepicker({showMeridian: false});
                    jQuery('#timepicker3').timepicker({minuteStep: 15});

                    // Date Picker
                    jQuery('#datepicker').datepicker();
                    jQuery('#datepicker-inline').datepicker();
                    jQuery('#datepicker-multiple').datepicker({
                        numberOfMonths: 3,
                        showButtonPanel: true
                    });

                    // Input Masks
                    jQuery("#date").mask("99/99/9999");
                    jQuery("#phone").mask("(999) 999-9999");
                    jQuery("#ssn").mask("999-99-9999");

                    // Select2
                    jQuery("#select-basic, #select-multi").select2();
                    jQuery('#select-search-hide').select2({
                        minimumResultsForSearch: -1
                    });

                    function format(item) {
                        return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined)?"":item.element[0].getAttribute('rel') ) + ' mr10"></i>' + item.text;
                    }

                    // This will empty first option in select to enable placeholder
                    jQuery('select option:first-child').text('');

                    jQuery("#select-templating").select2({
                        formatResult: format,
                        formatSelection: format,
                        escapeMarkup: function(m) { return m; }
                    });

                    // Color Picker
                    if(jQuery('#colorpicker').length > 0) {
                        jQuery('#colorSelector').ColorPicker({
                            onShow: function (colpkr) {
                                    jQuery(colpkr).fadeIn(500);
                                    return false;
                            },
                            onHide: function (colpkr) {
                                        jQuery(colpkr).fadeOut(500);
                                        return false;
                            },
                            onChange: function (hsb, hex, rgb) {
                            jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
                            jQuery('#colorpicker').val('#'+hex);
                            }
                        });
                    }

                    // Color Picker Flat Mode
                    jQuery('#colorpickerholder').ColorPicker({
                        flat: true,
                        onChange: function (hsb, hex, rgb) {
                            jQuery('#colorpicker3').val('#'+hex);
                        }
                    });                   
                }

                function init_data_tables(){
                    jQuery('#basicTable').DataTable({
                        responsive: true,
                        language: {
                            "decimal":        "",
                            "emptyTable":     "No data available in table",
                            "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
                            "infoEmpty":      "Showing 0 to 0 of 0 entries",
                            "infoFiltered":   "(filtered from _MAX_ total entries)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     "Show _MENU_ entries",
                            "loadingRecords": "Loading...",
                            "processing":     "Processing...",
                            "search":         "Search:",
                            "zeroRecords":    "No matching records found",
                            "paginate": {
                                "first":      "First",
                                "last":       "Last",
                                "next":       "Next",
                                "previous":   "Previous"
                            },
                            "aria": {
                                "sortAscending":  ": activate to sort column ascending",
                                "sortDescending": ": activate to sort column descending"
                            }
                        }
                    });
                    
                    var shTable = jQuery('#shTable').DataTable({
                        "fnDrawCallback": function(oSettings) {
                            jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                        },
                        responsive: true
                    });
                    
                    // Show/Hide Columns Dropdown
                    jQuery('#shCol').click(function(event){
                        event.stopPropagation();
                    });
                    
                    jQuery('#shCol input').on('click', function() {

                        // Get the column API object
                        var column = shTable.column($(this).val());

                        // Toggle the visibility
                        if ($(this).is(':checked'))
                            column.visible(true);
                        else
                            column.visible(false);
                    });
                    
                    var exRowTable = jQuery('#exRowTable').DataTable({
                        responsive: true,
                        "fnDrawCallback": function(oSettings) {
                            jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                        },
                        "ajax": "ajax/objects.txt",
                        "columns": [
                            {
                                "class":          'details-control',
                                "orderable":      false,
                                "data":           null,
                                "defaultContent": ''
                            },
                            { "data": "name" },
                            { "data": "position" },
                            { "data": "office" },
                            { "data": "salary" }
                        ],
                        "order": [[1, 'asc']] 
                    });
                    
                    // Add event listener for opening and closing details
                    jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                        var tr = $(this).closest('tr');
                        var row = exRowTable.row( tr );
                 
                        if ( row.child.isShown() ) {
                            // This row is already open - close it
                            row.child.hide();
                            tr.removeClass('shown');
                        }
                        else {
                            // Open this row
                            row.child( format(row.data()) ).show();
                            tr.addClass('shown');
                        }
                    });
                   
                    
                    // DataTables Length to Select2
                    jQuery('div.dataTables_length select').removeClass('form-control input-sm');
                    jQuery('div.dataTables_length select').css({width: '60px'});
                    jQuery('div.dataTables_length select').select2({
                        minimumResultsForSearch: -1
                    });
                }

                //Forms function
                    //Verificacion para mostrar el form
                    function form_confirmation(value, form_value){               
                        if( value == 1){
                            //                    
                        }else if( value == 2){
                            load_form(form_value, 1, 0);
                            
                        }

                        var modal_reference = ".panel-"+form_value;

                        setTimeout(function(){                        
                            $(modal_reference).modal("hide");
                        }, 300);

                    }
                    //Cargar el form en pa lagina principal
                    function load_form(form_value, mode, formid){
                        
                        var data = {                            
                            mode : mode,
                            form_value : form_value
                        }
                        if( mode == 2 ){
                            if (formid != 0){
                                data['formid'] = formid;
                            }else{
                                data['formid'] =  $("#"+form_value+"_value").val();
                            }
                            
                        }
                        var old_content = $("#historial").html();

                        var type = "POST";                    
                        var url = '<?= $path . "index.php/Master/load_form";?>';
                        var async = "async";

                        var success = function(data){
                            $("#historial").html(data);
                            setTimeout(function(){                        
                                if(form_value == 'pca'){
                                    init_problemas_toolkit();
                                }else if(form_value = 'el'){
                                    init_eglrs_toolkit();
                                }
                            }, 300);
                                  
                        };
                        var error = function(){};
                        ajax_request(type, url, async, data, success, error);                        
                    }
                    //Inicializar las libs
                    function init_problemas_toolkit(){                        
                        $("[name=add_a_section]").click(function(event) { // button event handler
                              event.preventDefault(); // prevent page from redirecting
                              add_problem_section("a");
                        });

                        $("[name=remove_a_section]").click(function(event) { // button event handler
                              event.preventDefault(); // prevent page from redirecting
                              remove_problem_section("a");
                        });

                        $("[name=add_c_section]").click(function(event) { // button event handler
                              event.preventDefault(); // prevent page from redirecting
                              add_problem_section("c");
                        });

                        $("[name=remove_c_section]").click(function(event) { // button event handler
                              event.preventDefault(); // prevent page from redirecting
                              remove_problem_section("c");
                        });

                      

                        pc = $( "input[id^='datepicker_pc']" ).size() / 2;
                        pa = $( "input[id^='datepicker_pa']" ).size() / 2;                        
                        for (var i = pc; i > 0; i--) {
                            datepicker_init('#datepicker_pc'+ i +'_01');
                            datepicker_init('#datepicker_pc'+ i +'_03');    
                        }
                        for (var i = pa; i > 0; i--) {
                            datepicker_init('#datepicker_pa'+ i +'_01');
                            datepicker_init('#datepicker_pa'+ i +'_03');    
                        }
                       
                        

                    };
                    function datepicker_init(id){
                        jQuery(id).datepicker({format:'dd-M-yyyy'});
                    }

                    function init_eglrs_toolkit(){
                        $('[name=radio]').change(function() {
                            if( $(this).val() == 1){
                                $(".radioval1").show();
                                $(".radioval2").hide();
                            }else{
                                $(".radioval2").removeClass("hidden");
                                $(".radioval1").hide();
                                $(".radioval2").show();
                            }
                           
                        });

                        $(".dropzone").dropzone();

                    }
                    function backto(){
                        var data = '';
                        ajax_request( 
                            'POST', 
                            '<?= $path . "index.php/Master/getHistory" ; ?>',
                            'false',  
                            data,                  
                            function(data){                        
                                $("#historial").html(data);                                   
                            },
                            function(){
                                //alert("error");
                        });
                    }
                    //Verificacion para mostrar el form / edición
                    function form_load_confirmation(value, form_value){               
                        if( value == 1){
                            //                    
                        }else if( value == 2){
                            load_form(form_value, 2, 0);                    
                        }

                        var modal_reference = ".panel-"+form_value+"-l";

                        setTimeout(function(){                        
                            $(modal_reference).modal("hide");
                        }, 300);

                    }
                    function show_guardar_form_confirmation_modal(form_value){
                        $(".panel-scm").modal('show');                
                        $("#save_confirmation_value").val(form_value);                      
                    }
                     //Confirmation message before saving the form
                    function guardar_form_confirmation(value){
                        
                        if( value == 1){
                            //                    
                        }else if( value == 2){                              
                            guardar_form( $("#save_confirmation_value").val());                            
                        }
                        setTimeout(function(){ 
                            $(".bs-example-modal-panel").modal("hide");
                            backto();
                        }, 300);
                    }                    
                    //Save form function
                    function guardar_form(tipo_form){                
                        var form = "[name='"+tipo_form+"_form']";
                        switch(tipo_form){
                            case 'hc':                                                
                                var extra_data = "&formtype="+1+"";
                            break;
                            case 'ef':                        
                                var extra_data = "&formtype="+2+"";
                            break;
                            case 'pca':                        
                                var pa_count = $(".row-agudo").length;
                                var pc_count = $(".row-cronico").length;
                                var extra_data = "&formtype="+3+"&pa_count="+pa_count+"&pc_count="+pc_count;
                            break;
                            case 'el':
                                var extra_data = "&formtype="+4+"";      
                            break;
                            case 'eg':
                                var extra_data = "&formtype="+5+"";
                            break;
                            case 'rs':
                                var extra_data = "&formtype="+6+"";
                            break;
                            
                        }            
                        
                        var data = $(form).serialize() + extra_data;
                                        
                        var type = "POST";                    
                        var url = '<?= $path . "index.php/Master/guardar_form";?>';
                        var async = "async";     
                        var success = function(data){
                                setTimeout(function(){
                                    $(".panel-scss").modal('show');
                                }, 300);
                                
                            };                
                        var error = function(){};
                        ajax_request(type, url, async, data, success, error);                  

                        return false;
                        

                        
                    }
                    function view_more(tipo,){
                        event.preventDefault(); // prevent page from redirecting
                        var type = "POST";                    
                        var url = "<?php echo $path . "index.php/Master/getHistoryComplete/"; ?>"+ tipo;
                        var async = "async";
                        var data = [];
                        var success = function(data){
                                $("#historial").html(data); 
                                setTimeout(function(){                        
                                    init_data_tables();
                                }, 300);                       
                            };
                        var error = function(){};
                        ajax_request(type, url, async, data, success, error);

                        return false;   
                    }


                    function add_c_section(event){
                        event.preventDefault(); // prevent page from redirecting
                          add_problem_section("c");
                        }; 
                    

                    function remove_c_section(event){
                        event.preventDefault(); // prevent page from redirecting
                          remove_problem_section("c");
                        };

                    function add_problem_section(tipo){
                        //Problemas agudos
                        if(tipo=='a'){
                            var row_type = 'row-agudo';
                        }else if(tipo=='c'){
                            var row_type = 'row-cronico';
                        }    

                        var element = "."+row_type;
                        var new_id = $( element ).length + 1;

                        var new_row = '<div class="row '+row_type+'">'+
                                        '<div class="col-sm-3">'+
                                            '<div class="form-group">'+
                                                '<label class="control-label">Fecha de Diagnóstico:</label>'+
                                                '<div class="input-group">'+
                                                    '<input type="text" name="p'+tipo+new_id+'_01" class="form-control" placeholder="mm/dd/yyyy" id="datepicker_p'+tipo+new_id+'_01">'+
                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>'+
                                                '</div><!-- input-group -->'+
                                            '</div><!-- form-group -->'+
                                        '</div><!-- col-sm-6 -->'+
                                        '<div class="col-sm-6">'+
                                            '<div class="form-group">'+
                                                '<label class="control-label">Descripción:</label>'+
                                                '<textarea  name="p'+tipo+new_id+'_02" class="form-control"></textarea>'+
                                            '</div><!-- form-group -->'+
                                        '</div><!-- col-sm-6 -->'+
                                        '<div class="col-sm-3">'+
                                            '<div class="form-group">'+
                                                '<label class="control-label">Fecha de Resolución:</label>'+
                                                '<div class="input-group">'+
                                                    '<input type="text" name="p'+tipo+new_id+'_03" class="form-control" placeholder="mm/dd/yyyy" id="datepicker_p'+tipo+new_id+'_03">'+
                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>'+
                                                '</div><!-- input-group -->'+
                                            '</div><!-- form-group -->'+
                                        '</div><!-- col-sm-6 -->'+
                                    '</div><!-- row --> ';

                        var form = "[name=pca_form] ."+row_type+":last";
                        $( form ).after(new_row);

                        datepicker_init( '#datepicker_p'+tipo+new_id+'_01' );
                        datepicker_init( '#datepicker_p'+tipo+new_id+'_03' );                        
                    }

                    function remove_problem_section(tipo){
                        //Problemas agudos
                        if(tipo=='a'){
                            var row_type = 'row-agudo';
                        }else if(tipo=='c'){
                            var row_type = 'row-cronico';
                        } 
                        var form = "[name=pca_form] ."+row_type+":last";
                        var element = "."+row_type;
                        if ( $( element ).length == 1 ){

                        }else{
                            $( form ).remove();    
                        }                
                    }
                    function form_load_confirmation_from_history(id, form_value){                                       
                        load_form(form_value, 2, id);
                        var modal_reference = ".panel-"+form_value+"-l";
                        setTimeout(function(){
                            $(modal_reference).modal("hide");
                        }, 300);
                    }



                //Menu functionsss
                function set_content_body(content){
                    $( ".mainpanel" ).html(content);
                }

                function go_to_perfil(id){
                    var type = "POST";                    
                    var url = "<?php echo $path . "index.php/Master/perfil/"; ?>"+id;
                    var async = "async";
                    var data = [];
                    var success = function(data){
                        set_content_body(data);
                        setTimeout(function(){                        
                                                        
                        }, 300);
                    };
                    var error = function(){};
                    ajax_request(type, url, async, data, success, error);
                }

                function go_to_directorio(){
                    var type = "POST";
                    
                    var url = "<?php echo $path . "index.php/Master/directorio/". $this->session->userdata('userdata')['id'] . ""; ?>";
                    var async = "async";
                    var data = [];
                    var success = function(data){
                        set_content_body(data);
                        setTimeout(function(){                        
                            
                            init_directorio();
                            $('#search-type').on("select2:selecting", function(e) {         
                                            console.log( $(this).val() );
                                            console.log( '$$$$$$' );
                    });
                        }, 300);
                    };
                    var error = function(){};
                    ajax_request(type, url, async, data, success, error);

                }

                function go_to_agenda(){
                    var type = "POST";
                    
                    var url = "<?php echo $path . "index.php/Master/agenda/". $this->session->userdata('userdata')['id'] . ""; ?>";
                    var async = "async";
                    var data = [];
                    var success = function(data){
                        set_content_body(data);
                        setTimeout(function(){                        
                            init_calendar();
                        }, 300);
                    };
                    var error = function(){};
                    ajax_request(type, url, async, data, success, error);

                }

                function ajax_request( type, url, async, data, success, error ){
                    $.ajax({
                        type: type,
                        url: url,
                        async: async,
                        //dataType:'json',                    
                        data: data,
                        success: success,
                        error: error
                    });
                }
       </script>>
    </body>
</html>
