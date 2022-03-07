
@include('userheader')
@include('link')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Carpool</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <!-- Styles -->
        <style>
            h1{
                color: yellow;
                text-align: center;
                margin-top:20px;
            }

            h2{
                color: white;
                text-align: center;
                margin-top:10px;
            }

     table{
         margin-top:50px ;
     }
        </style>
          
    </head>
    <body class="antialiased"  style="background-color: green">
        <div class="container-fluid">

            <h1>My Queries</h1>
            

            <table class="table table-bordered table-hover " id="Query-table" name="Query-table" style="content-justify:centre;text-align: center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
                <tr>
                    
                    <th>Title</th>
                    <th>Desc</th>
                    <th>Driver Name</th>
                    <th>Driver Response</th>
                    
                    
                    
                   
                   
                </tr>
                @if ($querys->count() == 0)
                <tr>
                    <td colspan="4" style="text-align: center; color:red;">No products to display.</td>
                </tr>
                @endif
               
            
                @foreach ($querys as $query)
                <tr>
                    
                    <td>{{ $query->title }}</td>
                    <td>{{ $query->desc }}</td>
                    <td>{{ $query->driver_name}}</td>
                    
                
                    @if($query->answer == null)
                <td><span style="color: red; font-weight:bolder">Not Answered</span></td>
            @else
            <td>{{$query->answer}}</td>
        @endif

       
                   
        
                @endforeach
               

            </table>

         

        </div>
    </body>
</html>

<script type="text/javascript">  
</script>
