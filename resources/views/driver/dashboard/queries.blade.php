
@include('driver.dashboard.dheader')
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
                    <th>No.</th>
                    <th>Title</th>
                    <th>Desc</th>
                    <th>Passenger Name</th>
                    <th>Your Response</th>
                    
                    
                    
                   
                   
                </tr>
                @if ($querys->count() == 0)
                <tr>
                    <td colspan="7" style="text-align: center; color:red;">No products to display.</td>
                </tr>
                @endif
               
            
                @foreach ($querys as $key=>$query)
                <tr>
                    
                    <td>{{ $key+1}}</td>
                    <td>{{ $query->title }}</td>
                    <td>{{ $query->desc }}</td>
                    <td>{{ $query->psn_name}}</td>
                    
                
                    @if($query->answer == null)
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#delModal-{{$query->id}}">Respond</button>
                    </td>
                    <div class="modal fade" id="delModal-{{$query->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" style="color: green; text-align:centre">Enter Your Response</h2>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('queryrespond'.'/'.$query->id)}}" role="button">
                                        @csrf
                                        <textarea rows="4" cols="50" name="answer"></textarea>

                                     <button type="submit" class="btn btn-success mr-5 mt-3 mb-5" style="">Send Response</button>
                                     </form>
                                </div>
                                <div class="modal-footer">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                
        
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
