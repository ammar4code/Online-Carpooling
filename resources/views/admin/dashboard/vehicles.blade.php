@include('admin.dashboard.aheader');
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                margin-top:40px;
                margin-bottom:20px;
            }

     table{
         margin-top:50px ;
     }
        </style>
          
    </head>
    <body class="antialiased"  style="background-color: green">
        @if(session()->has('message'))
        <div class="alert alert-success" style="text-align: center">
            {{ session()->get('message') }}
        </div>
    @endif
        <div class="container-fluid">

            <h1>Admin Vehicle Registration Panel</h1>
            <h2>Vehicle Type Registration</h2>

           <div class="d-flex justify-content-center" >
            <form class="form-inline" action="addvehicle" method="POST" style="content-justify:center; text-align:center">
            @csrf    
                <div class="form-group" >
                 
                  <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" placeholder="Vehicle Type" >
                </div>
              
                <button type="submit" class="btn btn-info ml-5" >Add New Type</button>
              </form>
           </div>

            <h2>Vehicle Details</h2>

            <table class="table table-bordered table-hover " id="pReport-table" name="pReport-table" style="content-justify:centre;text-align: center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
                <tr>
                    
                    <th>Vehicle Type</th>
                    <th>Vehicle Edit</th>
                    <th>Vehicle Delete</th>
                
                </tr>
                @foreach ($vehicles as $vehicle)

              <tr>

                <td>{{$vehicle->vehicle_type}}</td>

              

              <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal-{{$vehicle->id}}">Edit Vehicle</button>
                    
                </td>
               <div class="modal fade" id="editModal-{{$vehicle->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" style="color: green; text-align:centre">Carpool Event Vehicle</h2>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('admin/editvehicle'.'/'.$vehicle->id)}}" role="button">
                                       @csrf
                                        <input type="text" name="editveh" id="editveh" value="{{$vehicle->vehicle_type}}"> 
                                        <br> 
                                    <button type="submit" class="btn btn-primary mr-5 mt-3 mb-5" style="">Submit</button>
                                    </form>
                                   
                                </div>
                                <div class="modal-footer">
                                   
                                </div> 
                            </div>
                        </div>
                    </div>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal-{{$vehicle->id}}">Delete Vehicle</button>
                
                    <div class="modal fade" id="delModal-{{$vehicle->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" style="color: red; text-align:centre">Delete Carpool Event</h2>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to confirm this deletion!</p>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-danger" href='{{ url('admin/deletevehicle'. '/'.$vehicle->id)}}' role="button">Confirm Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
        
                </td>
                    
                @endforeach
                   
                   
                </tr>
               

            </table>

           

        </div>
    </body>
</html>

