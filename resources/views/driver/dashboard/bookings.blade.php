
@include('driver.dashboard.dheader')
@include('link')

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
                margin-top:10px;
            }

     table{
         margin-top:50px ;
     }
        </style>
          
    </head>

    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
       {{ session('status') }}
    </div>
    @endif

    <body class="antialiased"  style="background-color: green">
        <div class="container-fluid">

            <h1>Your Carpooling Events</h1>
            <h2>Your Booking Events</h2>

            <table class="table table-bordered table-hover " id="booking-table" name="booking-table" style="content-justify:centre;text-align: center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
                <tr>
                    
                    <th>Title</th>
                    <th>From City</th>
                    <th>To City</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Passenger Name</th>
                    <th>Status</th>
                    <th>Report This Passenger</th>
                   
                   
                </tr>
                @if ($bookings->count() == 0)
                <tr>
                    <td colspan="7" style="text-align: center; color:red;">No bookings to display.</td>
                </tr>
                @endif
               
            
                @foreach ($bookings as $booking)
                <tr>
                    
                    <td>{{ $booking->title }}</td>
                    <td>{{ $booking->from }}</td>
                    <td>{{ $booking->To}}</td>
                    <td>{{ $booking->date}}</td>
                    <td>{{ $booking->time}}</td>
                    <td>{{ $booking->psn_name}}</td>
                    <td>
                        <input type="checkbox" class="toggle-class" data-id="{{$booking->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="confirmed" data-off="denied" name="" id=""
                        {{$booking->status ? 'checked' : ''}}
                        >
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reportModal-{{$booking->id}}">Report This Passenger</button>
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
                                    
                                    <form action="{{ url('reportpsn/'. $booking->psn_name . '/'.$booking->id) }}" method="POST">
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


<script>
      $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var booking_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/bookingStatus',
            data: {'status': status, 'booking_id': booking_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>