
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

            <h1>Upcoming Carpooling Events</h1>
            <h2>Sign In to Book Ride</h2>

            <table class="table table-bordered table-hover " id="Events-table" name="Events-table" style="content-justify:centre;text-align: center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
                <tr>
                    
                    <th>Title</th>
                    <th>From City</th>
                    <th>To City</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>price</th>
                    <th>Driver Name</th>
                    <th>Book Now</th>
                   
                   
                </tr>
                @if ($events->count() == 0)
                <tr>
                    <td colspan="7" style="text-align: center; color:red;">No products to display.</td>
                </tr>
                @endif
               
            
                @foreach ($events as $event)
                <tr>
                    
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->from }}</td>
                    <td>{{ $event->To}}</td>
                    <td>{{ $event->date}}</td>
                    <td>{{ $event->time}}</td>
                    <td>{{ $event->price}}</td>
                    <td>{{ $event->DriverName}}</td>
            
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#demoModal-{{$event->id}}">Book This Event</button>
                    </td>
                    <div class="modal fade" id="demoModal-{{$event->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" style="color: green; text-align:centre">Carpool Event Book</h2>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Confirm Booking</p>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-success" href='{{ url('event/book/'.$event->title . '/'.$event->id) }}' role="button">Book</a>
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
