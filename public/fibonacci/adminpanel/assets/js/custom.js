/************************************************************************************
 Template Name    : Fibonacci | Responsive Bootstrap 4.1.3 Portfolio Admin Template
 Author           : ElseColor
 Version          : 1.0.0
 Created          : 2020
 File Description : Custom js file of the template
 ***********************************************************************************/


$(function() {

    "use strict";

    /* ----------------------------------------------------------------
              [ CKEditor Js ]
-----------------------------------------------------------------*/
    $(function(){
        ClassicEditor
            .create( document.querySelector( '#editor' ))
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    });
    $(function(){
        ClassicEditor
            .create( document.querySelector( '#editor2'))
            .then( editor2 => {
                window.editor = editor2;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    });

    $(function(){
        ClassicEditor
            .create( document.querySelector( '#editor3' ))
            .then( editor3 => {
                window.editor = editor3;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    });


    $(function(){
        ClassicEditor
            .create( document.querySelector( '#editor4' ))
            .then( editor4 => {
                window.editor = editor4;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    });


    /* ----------------------------------------------------------------
                 [ DataTable Js ]
 -----------------------------------------------------------------*/

    $(function(){
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });


    /* ----------------------------------------------------------------
           [ Alert Auto Close Js ]
-----------------------------------------------------------------*/

    $(function(){
        window.setTimeout(function() {
            $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);
    });

    /* ----------------------------------------------------------------
                [ Prevent Multiple Submit Js ]
-----------------------------------------------------------------*/
    $(function(){
        $('form').on('submit', function () {
            $(this).find(':submit').attr('disabled', 'true');
            $('.spinner').show();
        });
    });

    /* ----------------------------------------------------------------
             [ Datetime Picker Js ]
-----------------------------------------------------------------*/

    if($('#datepairExample .date').length){
        $('#datepairExample .time').timepicker({
            'showDuration': true,
            'timeFormat': 'g:ia'
        });
        $('#datepairExample .date').datepicker({
            'format': 'd-m-yyyy',
            'autoclose': true
        });
        $('#datepairExample').datepair();
    }

    /* ----------------------------------------------------------------
          [ Circles Js ]
-----------------------------------------------------------------*/

    Circles.create({
        id:'circles-1',
        radius:45,
        value:100,
        maxValue:100,
        width:7,
        text: text_1,
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    });

    Circles.create({
        id:'circles-2',
        radius:45,
        value:100,
        maxValue:100,
        width:7,
        text: text_2,
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    });

    Circles.create({
        id:'circles-3',
        radius:45,
        value:100,
        maxValue:100,
        width:7,
        text: text_3,
        colors:['#f1f1f1', '#F25961'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    });



});