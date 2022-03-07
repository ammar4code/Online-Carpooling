
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

        @if(session()->has('message'))
        <div class="alert alert-success mt-2" style="text-align: center">
            {{ session()->get('message') }}
        </div>
    @endif

        <div class="container-fluid">

            <h1>Your Carpooling Events</h1>
            <h2>Your Booking Events</h2>

            <table class="table table-bordered table-hover " id="Events-table" name="Events-table" style="content-justify:centre;text-align: center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
                <tr>
                    
                    <th>Title</th>
                    <th>From City</th>
                    <th>To City</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>Driver Name</th>
                    <th>Status</th>
                    <th>Send Query</th>
                    <th>Report an Issue</th>
                    
                   
                   
                </tr>
                @if ($bookings->count() == 0)
                <tr>
                    <td colspan="7" style="text-align: center; color:red;">No products to display.</td>
                </tr>
                @endif
               
            
                @foreach ($bookings as $booking)
                <tr>
                    
                    <td>{{ $booking->title }}</td>
                    <td>{{ $booking->from }}</td>
                    <td>{{ $booking->To}}</td>
                    <td>{{ $booking->date}}</td>
                    <td>{{ $booking->time}}</td>
                    <td>{{ $booking->price}}</td>
                    <td>{{ $booking->driver_name}}</td>
                    @if($booking->status == '1')
                <td>Confirmed</td>
            @else
            <td>Pending</td>
        @endif

        <td>
            <button class="btn btn-warning" data-toggle="modal" data-target="#queryModal-{{$booking->id}}">Make Query</button>
        </td>
        <div class="modal fade" id="queryModal-{{$booking->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" style="color:Green; text-align:centre">Make Query to Driver</h2>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ url('askdriver/'. $booking->driver_name . '/'.$booking->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Query Title" >
                             </div>

                             <div class="form-group">
                                 <textarea name="desc" id="desc" cols=61" rows="10" placeholder="Query Description"></textarea>
                             </div>
                             <button type="submit" class="btn btn-success mt-3">Send This to Driver</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
                  

        
        <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reportModal-{{$booking->id}}">Report Driver</button>
        </td>
        <div class="modal fade" id="reportModal-{{$booking->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" style="color: red; text-align:centre">Report To Admin</h2>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ url('reportdriver/'. $booking->driver_name . '/'.$booking->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Complain Title" >
                             </div>

                             <div class="form-group">
                                 <textarea name="desc" id="desc" cols=61" rows="10" placeholder="Complain Description"></textarea>
                             </div>
                             <button type="submit" class="btn btn-danger mt-3">Report This to Admin</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
                   
        
                @endforeach
               

            </table>

         

        </div>
    </body>
</html>

<script type="text/javascript">  
</script>
