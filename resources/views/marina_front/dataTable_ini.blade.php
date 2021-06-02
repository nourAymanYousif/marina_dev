

@if(auth()->user() != null)
<script >
  
  
   
    
    $(document).ready(function() {
     
     var tablein = $('#maintenance_table').DataTable( {

         dom: 'Blfrtip',
         buttons: [
            
             {
                 extend: 'print',
                 messageTop: '<p><span class="fa fa-user"></span> Requested User: <b>{{auth()->user()->name}}</b> <br> <span class="fa fa-calendar"></span> {{\Carbon\Carbon::now()->format("d/m/Y")}} <br><span class="fa fa-clock-o"></span> {{\Carbon\Carbon::now()->format("g:i A")}}</p>',
                 title:'Maintenance Report',
                 

                 text:"<i class='fa fa-print'></i> Print Report",
                 exportOptions: {
 
                    columns: [0,1,2,3,4,5,6],
            
                },
                                      
             },
             {
                 extend: 'excel',
                 
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Maintenance Report',
                 
                 text:"<i class='fa fa-file-excel-o'></i> Export Excel ",
                 exportOptions: {
 
                    columns: [0,1,2,3,4,5,6],
            
                },
                                          
             },
             {
                 extend: 'pdf',
                 
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Maintenance Report',
                 
                 text:"<i class='fa fa-file-pdf-o'></i> Export PDF ",
                 exportOptions: {
 
                    columns: [0,1,2,3,4,5,6],
            
                },
                                          
             },
                                   
       
          
            ],
     } );
     $('#maintenance_table thead tr').clone(true).appendTo('#maintenance_table thead');
 
     // Setup - add a text input to each footer cell
     $('#maintenance_table thead tr:eq(1) th').each( function (i) {
         var title = $(this).text();
         if (title === "Order Date") {
        
        $(this).html( '<input data-provide="datepicker" data-date-format="dd/mm/yyyy" type="text" id="datepicker" placeholder="Search '+title+'"  />' );
        }else {

        $(this).html( '<input id='+title+'type="text" placeholder="Search By'+title+'" />' );
       }        



         $( 'input', this ).on('keyup change', function () {
             if ( tablein.column(i).search() !== this.value ) {
                tablein
                     .column(i)
                     .search( this.value )
                     .draw();
             }
           
         } );
     } );
 
     //table.destroy();
 } );
 
 




// invoices table ini datatable

  
$(document).ready(function() {
     
     var tablein = $('#packages_table').DataTable( {

         dom:  'Blfrtip',
         buttons: [
            
             {

                 extend: 'print',
                 messageTop: '<p><span class="fa fa-user"></span> Requested User: <b>{{auth()->user()->name}}</b> <br> <span class="fa fa-calendar"></span> {{\Carbon\Carbon::now()->format("d/m/Y")}} <br><span class="fa fa-clock-o"></span> {{\Carbon\Carbon::now()->format("g:i A")}}</p>',
                 title:'Invoice Report',
                 

                 text:"<i class='fa fa-print'></i> Print Report",
                 exportOptions: {
 
                    columns: [0,1,2,4],
            
                },
                                      
             },
             {
                 extend: 'excel',
                 
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Invoice Report',
                 
                 text:"<i class='fa fa-file-excel-o'></i> Export Excel ",
                 exportOptions: {
 
                    columns: [0,1,2,4],
            
                },
                                          
             },
             {
                 extend: 'pdf',
                 
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Invoice Report',
                 
                 text:"<i class='fa fa-file-pdf-o'></i> Export PDF ",
                 exportOptions: {
 
                    columns: [0,1,2,4],
            
                },
                                          
             },
                                   
       
            ],
        

     } );
     $('#packages_table thead tr').clone(true).appendTo('#packages_table thead');
 
     // Setup - add a text input to each footer cell
     $('#packages_table thead tr:eq(1) th').each( function (i) {
         var title = $(this).text();
         $(this).html( '<input type="text" placeholder="Search By'+title+'" />' );
  
         $( 'input', this ).on('keyup change', function () {
             if ( tablein.column(i).search() !== this.value ) {
                tablein
                     .column(i)
                     .search( this.value )
                     .draw();
             }
           
         } );
     } );
 
     //table.destroy();
 } );
 
 




// invoices table ini datatable

  
    $(document).ready(function() {
     
     var tablein = $('#invoices_table').DataTable( {
         
        dom:  'Blfrtip',
         buttons: [
            
             {
                 extend: 'print',
                 messageTop: '<p><span class="fa fa-user"></span> Requested User: <b>{{auth()->user()->name}}</b> <br> <span class="fa fa-calendar"></span> {{\Carbon\Carbon::now()->format("d/m/Y")}} <br><span class="fa fa-clock-o"></span> {{\Carbon\Carbon::now()->format("g:i A")}}</p>',
                 title:'Invoice Report',
                 

                 text:"<i class='fa fa-print'></i> Print Report",
                 exportOptions: {
 
                    columns: [0,1,2,4,5,6,7,8,9,10],
            
                },
                                      
             },
             {
                 extend: 'excel',
                 
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Invoice Report',
                 
                 text:"<i class='fa fa-file-excel-o'></i> Export Excel ",
                 exportOptions: {
 
                    columns: [0,1,2,4,5,6,7,8,9,10],
            
                },
                                          
             },
             {
                 extend: 'pdf',
                 
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Invoice Report',
                 
                 text:"<i class='fa fa-file-pdf-o'></i> Export PDF ",
                 exportOptions: {
 
                    columns: [0,1,2,4,5,6,7,8,9,10],
            
                },
                                          
             },
                                   
       
          
            ],
     } );
     $('#invoices_table thead tr').clone(true).appendTo('#invoices_table thead');
 
     // Setup - add a text input to each footer cell
     $('#invoices_table thead tr:eq(1) th').each( function (i) {
         var title = $(this).text();
         $(this).html( '<input type="text" placeholder="Search By'+title+'" />' );
  
         $( 'input', this ).on('keyup change', function () {
             if ( tablein.column(i).search() !== this.value ) {
                tablein
                     .column(i)
                     .search( this.value )
                     .draw();
             }
           
         } );
     } );
 
     //table.destroy();
 } );
 
 




// client table ini datatable


    $(document).ready(function() {
     
     var tablein = $('#clients_table').DataTable( {
         
        dom:  ' Blfrtip',
         buttons: [
            
             {
                 extend: 'print',
                 messageTop: '<p><span class="fa fa-user"></span> Requested User: <b>{{auth()->user()->name}}</b> <br> <span class="fa fa-calendar"></span> {{\Carbon\Carbon::now()->format("d/m/Y")}} <br><span class="fa fa-clock-o"></span> {{\Carbon\Carbon::now()->format("g:i A")}}</p>',
                 title:'Client Report',
                 text:"<i class='fa fa-print'></i> Print Report",
                 exportOptions: {
 
                    columns: [0,1,2,3],
            
                },
                                          
             },
             {
                 extend: 'excel',
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Client Report',
          
                 text:"<i class='fa fa-file-excel-o'></i> Export Excel ",
                 exportOptions: {
 
                     columns: [0,1,2,3],
            
                },
                                          
             },
             {
                 extend: 'pdf',
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Client Report',
          
                 text:"<i class='fa fa-file-pdf-o'></i> Export PDF ",
                 exportOptions: {
 
                    columns: [0,1,2,3],
            
                },
                                          
             },
                                   
       
          
            ],
     } );
     $('#clients_table thead tr').clone(true).appendTo('#clients_table thead');
 
     // Setup - add a text input to each footer cell
     $('#clients_table thead tr:eq(1) th').each( function (i) {
         var title = $(this).text();
         $(this).html( '<input type="text" placeholder="Search By'+title+'" />' );
  
         $( 'input', this ).on('keyup change', function () {
             if ( tablein.column(i).search() !== this.value ) {
                tablein
                     .column(i)
                     .search( this.value )
                     .draw();
             }
           
         } );
     } );
 
     //table.destroy();
 } );
 
 




// boats table ini datatable


$(document).ready(function() {
     
    var table = $('#boats_table').DataTable( {
        
        dom: 'Blfrtip',
        buttons: [
           
            {
                extend: 'print',
                messageTop: '<p><span class="fa fa-user"></span> Requested User: <b>{{auth()->user()->name}}</b> <br> <span class="fa fa-calendar"></span> {{\Carbon\Carbon::now()->format("d/m/Y")}} <br><span class="fa fa-clock-o"></span> {{\Carbon\Carbon::now()->format("g:i A")}}</p>',
                 title:'Boats Report',
          
                text:"<i class='fa fa-print'></i> Print Report",
                exportOptions: {

                    columns: [0,1,2,5,6],
           
               },
                                         
            },
            {
                extend: 'excel',
                messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Boats Report',
                text:"<i class='fa fa-file-excel-o'></i> Export Excel ",
                exportOptions: {

                    columns: [0,1,2,5,6],
           
               },
                                         
            },
            {
                extend: 'pdf',
                messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Boats Report',
                text:"<i class='fa fa-file-pdf-o'></i> Export PDF ",
                exportOptions: {

                    columns: [0,1,2,5,6],
           
               },
                                         
            },
                                  
      
         
           ],
    } );
    $('#boats_table thead tr').clone(true).appendTo( '#boats_table thead' );

    // Setup - add a text input to each footer cell
    $('#boats_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search By'+title+'" />' );
 
        $( 'input', this ).on('keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
          
        } );
    } );

    //table.destroy();
} );




</script>
@endif
