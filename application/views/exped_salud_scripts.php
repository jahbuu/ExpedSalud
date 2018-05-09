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
                //Ready functions
                jQuery(document).ready(function() {                            
                    
                    // Since the calendar is the deafult view; Initialize it
                    initCalendar();
                    $('#timepicker').timepicker();

                });
                   


            </script>
            <script>
                //Calendar functions
                //Calendar initizalition
                function initCalendar(){
                    refetchAddForm();
                    datepicker_init('#datepicker');
                    timepicker_init('#timepicker');
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
                        editable: false,
                        droppable: false, // this allows things to be dropped onto the calendar !!!
                        drop: function(date, allDay) { // this function is called when something is dropped                                  
                            // retrieve the dropped element's stored Event Object
                            var originalEventObject = jQuery(this).data('eventObject');
                            alert(originalEventObject.title);         
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
                            console.log('Event: ' + calEvent.title);                                 
                        },
                        events: '<?= $path . "index.php/Ccalendar/getEvents";?>',
    //                     events: [{ id:1,
    //        start: "2018-05-06T10:00:00",
    //        end:"2018-05-06T18:00:00",
    //        title: 'test timed event',
    //        allDay: false }, 
    //     { id:2,
    //       start: "2016-12-07",
    //       title: 'All Day Event',
    //       allDay: true }
    // ],
                        eventClick: function(event, element) {                                
                            $('#datepicker').val(event.start_date);                            
                            $('#timepicker').val(event.start_time);                            

                            $('#eventID').val(event.id);

                            $('#add-event').parent().removeClass('hidden');
                            $('#add-event-select2').parent().addClass('hidden');

                            $('#patient_id').val( event.id_patient );
                            $('#patient_name_label_id').val( event.id_patient );
                            $('#add-event').val( event.patient_name );
                            $('#title').val( event.title );
                            $('#calendar').fullCalendar('updateEvent', event);
                            $('.panel-addEvent').modal('show');


                        }
                    }); 
                   
                    // Time Picker
                    // jQuery('#timepicker').timepicker({defaultTIme: false});
                    // jQuery('#timepicker2').timepicker({showMeridian: false});
                    // jQuery('#timepicker3').timepicker({minuteStep: 15});
                    // Date Picker
                    // jQuery('#datepicker').datepicker();
                    // jQuery('#datepicker-inline').datepicker();
                    // jQuery('#datepicker-multiple').datepicker({
                    //     numberOfMonths: 3,
                    //     showButtonPanel: true
                    // });
                    // Input Masks
                    jQuery("#date").mask("99/99/9999");
                    jQuery("#phone").mask("(999) 999-9999");
                    jQuery("#ssn").mask("999-99-9999");
                    // Select2
                    // jQuery("#select-basic, #select-multi").select2();
                    // jQuery('#select-search-hide').select2({
                    //     minimumResultsForSearch: -1
                    // });
                        
                    // Set select2 initialization parameters
                    var data_function = function(params){
                        // q is the raw parameter of the searched item
                        // page is the number of pages
                        return {
                            q: params,                                    
                            page :  params.page || 1
                        };                            
                    }
                    var result_function = function(data){
                        return {
                            results: data.results
                        };
                    }
                    initSelec2( 'add-event-select2', 'Master/getDirectory', data_function, result_function );                    
                                  
                }
                //Refectch the calendar events
                function refetchCalendar(){
                    $('#calendar').fullCalendar( 'refetchEvents' );
                }
                //Clean form inputs
                function cleanAddEventForm(){
                    $('.panel-addEvent').find('form input').val('');                    
                    $('.panel-addEvent').find('form textarea').val('');
                    $('#add-event-select2').select2('val', '');
                    
                    
                }
                //
                function addCalendarEvent(){
                    validateForm('addEvent');
                    var type = 'POST';
                    var data = $("[name='form-addEvent']").serializeArray();
                    var url = '<?= $path; ?>index.php/Ccalendar/addEvents';
                    var async = 'async';
                    var success = function(){
                        refetchCalendar();
                        cleanAddEventForm();
                    }
                    var error = null;
                    ajaxRequest(type, url, async, data, success, error);
                }
                //        
                function refetchAddForm(){
                    $('#panel-addEvent').on('hidden.bs.modal', function (e) {
                        $('#add-event').parent().addClass('hidden');
                        $('#add-event-select2').parent().removeClass('hidden');
                        cleanAddEventForm();
                    });                    
                }      

            </script>
            <script>
                //Directory functions
                //Initializaton of the irectory
                function initDirectory(side = 0){
                    //Set select2 initialization parameters
                    var data_function = function(params){                        
                        return {
                            q: params,                                    
                            page :  $(".directory-pagination li.pagination-pages").html()
                        };                            
                    }
                    var result_function = function (data, params) {                             
                        return {
                            results: data.results
                        };
                    }
                    initSelec2( 'search-type', 'Master/getDirectory', data_function, result_function );
                    // Set selec2 onChange function to navigate to the profile of the selected result                                                        
                    $('#search-type').change(function() {                      
                      goTo('profile', 'Master/profile', this.value);
                    });       
                }
                // Refreshes the directory based on the pagination selection
                function refreshDirectory(side = 0){
                    //Set ajax parameters
                    var post = 'POST';
                    var url = '<?= $path . "index.php/Master/refreshDirectory" ; ?>';
                    var async = 'false';
                    var data = {'side' : side, orderby:'', tpages:$('li.pagination-pages').html(), current_page:$('li.active a').html()};
                    var success = function(data){                        
                        $(".all-contacts-div").html(data.directory);                                   
                        $(".pagination-menu-div").html(data.pagination);                                                           
                    }
                    var error = function(){
                        //#code
                    };
                    var dataType = 'json';
                    ajaxRequest( post, url, async, data, success, error, dataType );
                }
                //Validate forms
                function validateForm(form_name){
                    switch(form_name){
                        case 'addForm':
                            
                            break;
                        case 'default':
                            break;
                    }
                }
            </script>
            <script>
                //Profile functions


            </script>
            <script>
                //Forms functions
                // Show getFormLayout confirmation modal
                function getFormLayoutConfirm(form_value){
                    getFormLayout(form_value);
                    setTimeout(function(){                        
                        $(".panel-"+form_value).modal("hide");
                        $(".panel-"+form_value+'-l').modal("hide");
                    }, 200);
                }
                function getFormLayoutConfirm(form_value, form_id){
                    getFormLayout(form_value, form_id);
                    setTimeout(function(){                        
                        $(".panel-"+form_value).modal("hide");
                        $(".panel-"+form_value+'-l').modal("hide");
                    }, 200);
                }
                // Ajax request to load the formlayout
                function getFormLayout(form_value, form_id = -1){
                    //Set ajax parameters
                    var data = {                                                        
                        form_value : form_value
                    }                        
                    if (form_id == -1){
                        // #
                    }else if(form_id != 0){
                        data['form_id'] = form_id;
                        
                    }else{
                        data['form_id'] =  $("#"+form_value+"_value").val();
                    }
                    var type = "POST";                    
                    var url = '<?= $path . "index.php/Master/getFormLayout";?>';
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
                    ajaxRequest(type, url, async, data, success, error);                   
                }
                // Show the selected modal manually
                function showModalManual(form_value, modal){
                    // Missing the separation of the functions, this should only show the selected modal and
                    // create the layout depending on the form value. The form value should be setted in another
                    // funcion
                    $(modal).modal('show');                
                    $("#save_confirmation_value").val(form_value);
                }
                // Show the addFormData confirmation modal
                function addFormDataConfirm(form_value){                    
                    addFormData( $("#save_confirmation_value").val());                                                    
                    setTimeout(function(){ 
                        $('.panel-scm').modal('hide');
                        backto();
                    }, 300);
                }
                function addFormData(form_type){
                    // Set ajax parameters
                    var data = $("[name='"+form_type+"_form']").serializeArray();                                                
                    var name = 'form_type';
                    var value = '';
                    switch(form_type){
                        case 'hc':                                                
                            value = 1;
                        break;
                        case 'ef':                        
                            value = 2;
                        break;
                        case 'pca':                                                        
                            data.push( {name, value} );
                            name = pa_count;
                            value = $(".row-agudo").length;
                            data.push( {name, value} );
                            name = pa_count;
                            value = $(".row-cronico").length;
                            data.push( {name, value} );
                            name = 'form_type';
                            value = 3;                            
                        break;
                        case 'el':                                
                            value = 4;
                        break;
                        case 'eg':
                            value = 5;
                        break;
                        case 'rs':
                            value = 6;                                
                        break;                            
                    }                        
                    data.push( {name, value} );
                    var type = "POST";                    
                    var url = '<?= $path . "index.php/Master/addForm";?>';
                    var async = "async";     
                    var success = function(data){
                            setTimeout(function(){
                                $(".panel-scss").modal('show');
                            }, 300);
                            
                        };                
                    var error = function(){};
                    ajaxRequest(type, url, async, data, success, error);                  
                    return false;
                }

            </script>
            <script>
                //Navigation functions


            </script>
            <script>
                //Overall functions
                //Select2 initialization 
                function initSelec2(element_id, list_id, data_function, result_function){
                    //element_id -> id of the imputo to be initialize it
                    //list_id or path is the function to be called. The controller must be specified
                    //data_function is the callback from writting into the input (elemnt_id)
                    //result_function is the callback from getting the list from the server

                    //Get the html element                    
                    var $mysel = $("#"+element_id+'');
                    //Initialize the html element with selec2 library
                    $mysel.select2({                        
                        ajax: {
                            url:'<?= $path;?>index.php/' + list_id + '',
                            type:'POST',
                            dataType:'json',
                            delay:250,
                            data: data_function,
                            results: result_function,
                            cache:true
                        },                        
                        allowClear: true
                    });
                }
                //AjaxRequest 
                function ajaxRequest( type = '', url = '', async = '', data = '', success = '', error = '', dataType = '' ){
                    $.ajax({
                        type: type,
                        url: url,
                        async: async,
                        dataType:dataType,                    
                        data: data,
                        success: success,
                        error: error
                    });
                }
                //navigate through the sections
                function goTo(section, url, id = 0){
                    //section of the files
                    //url or path is the function to be called. The controller must be specified
                    //id
                    switch(section){
                        case 'profile':
                        var success = function(data){
                            set_content_body(data);                    
                        };
                            break;
                        case 'directory':
                        var success = function(data){
                            set_content_body(data);
                            setTimeout(function(){                                                    
                                initDirectory();                           
                            }, 300);
                        }
                            break;
                        case 'calendar':
                            var success = function(data){
                                set_content_body(data);
                                setTimeout(function(){                        
                                    initCalendar();
                                }, 300);
                            };
                            break;
                    }

                    var type = "POST";                    
                    var url = "<?= $path . "index.php/"; ?>" + url;
                    var async = "async";
                    if( id == 0 ){
                        var data = { k_id : '<?= $this->session->userdata('userdata')['id']; ?>' };  
                    }else{
                        var data = { k_id : id };  
                    }
                    var error = function(){};
                    ajaxRequest(type, url, async, data, success, error);
                }
                // Updates the main panel content
                function set_content_body(html){

                    $( ".mainpanel" ).html(html);
                }
                function datepicker_init(id){                    
                    $(id).datepicker();
                }
                function timepicker_init(id){                    
                    jQuery(id).timepicker(
                        {defaultTIme: false},
                        {template: 'modal'},
                        {format: 'HH:mm'}
                    );
                }

            </script>


            <script>

           

              

                //Calendar function
                
                // no esta bien inicializada la tabla los botones de navegacion estan sin el css igual que la barra para buscar
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
                            $(".panel-"+form_value).modal("hide");
                        }, 300);
                    }                    
                    //Cargar el form en pa lagina principal
                    function load_form(form_value, mode, formid = 0){
                        
                        var data = {                            
                            mode : mode,
                            form_value : form_value
                        }
                        if( mode == 2 ){
                            if (formid != 0){
                                data['form_id'] = formid;
                            }else{
                                data['form_id'] =  $("#"+form_value+"_value").val();
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
                        ajaxRequest(type, url, async, data, success, error);                        
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
                        ajaxRequest( 
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
                    function view_more(tipo,){
                        event.preventDefault(); // prevent page from redirecting
                        var type = "POST";                    
                        var url = "<?= $path . "index.php/Master/getHistoryComplete/"; ?>"+ tipo;
                        var async = "async";
                        var data = [];
                        var success = function(data){
                                $("#historial").html(data); 
                                setTimeout(function(){                        
                                    init_data_tables();
                                }, 300);                       
                            };
                        var error = function(){};
                        ajaxRequest(type, url, async, data, success, error);

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
                                                    '<input type="text" name="p'+tipo+new_id+'_01" class="form-control datepiker" placeholder="mm/dd/yyyy" id="datepicker_p'+tipo+new_id+'_01">'+
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
                                                    '<input type="text" name="p'+tipo+new_id+'_03" class="form-control datepiker" placeholder="mm/dd/yyyy" id="datepicker_p'+tipo+new_id+'_03">'+
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
             
                    function form_load_confirmation(id, form_value){                                       
                        load_form(form_value, 2, id);
                        var modal_reference = ".panel-"+form_value+"-l";
                        setTimeout(function(){
                            $(modal_reference).modal("hide");
                        }, 300);
                    }
       </script>
       <style>
            .panel-addEvent{
                z-index:6666 !important;
            }
            .datepicker{z-index:7777 !important;}

.bootstrap-timepicker-widget table td input {
width: 50px;
}
        </style>
    </body>
</html>
