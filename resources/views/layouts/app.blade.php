<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Marina</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

 
 
 
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.10.24/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript"  src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>



   
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>

    
   
   
    



    
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">




    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/addedCss.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                   <i class="fa fa-ship"> </i> <b>Marina</b> Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

   
    </div>
</body>
@if(auth()->user() != null)
<script >
  
  
   
    
    $(document).ready(function() {
     
     var tablein = $('#maintenance_table').DataTable( {
         
         dom: 'Bfrtip',
         buttons: [
            
             {
                 extend: 'print',
                 messageTop: '<p><span class="fa fa-user"></span> Requested User: <b>{{auth()->user()->name}}</b> <br> <span class="fa fa-calendar"></span> {{\Carbon\Carbon::now()->format("d/m/Y")}} <br><span class="fa fa-clock-o"></span> {{\Carbon\Carbon::now()->format("g:i A")}}</p>',
                 title:'Maintenance Report',
                 

                 text:"<i class='fa fa-print'></i> Print Report",
                 exportOptions: {
 
                    columns: [0,1,2,3,4,5],
            
                },
                                      
             },
             {
                 extend: 'excel',
                 
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Maintenance Report',
                 
                 text:"<i class='fa fa-file-excel-o'></i> Export Excel ",
                 exportOptions: {
 
                    columns: [0,1,2,3,4,5],
            
                },
                                          
             },
             {
                 extend: 'pdf',
                 
                 messageTop: 'Requested User: {{auth()->user()->name}} Date: {{\Carbon\Carbon::now()->format("d/m/Y")}} Time: {{\Carbon\Carbon::now()->format("g:i A")}}',
                 title:'Maintenance Report',
                 
                 text:"<i class='fa fa-file-pdf-o'></i> Export PDF ",
                 exportOptions: {
 
                    columns: [0,1,2,3,4,5],
            
                },
                                          
             },
                                   
       
          
            ],
     } );
     $('#maintenance_table thead tr').clone(true).appendTo('#maintenance_table thead');
 
     // Setup - add a text input to each footer cell
     $('#maintenance_table thead tr:eq(1) th').each( function (i) {
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
     
     var tablein = $('#packages_table').DataTable( {
         
         dom: 'Bfrtip',
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
         
         dom: 'Bfrtip',
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
         
         dom: 'Bfrtip',
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
        
        dom: 'Bfrtip',
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
</html>
