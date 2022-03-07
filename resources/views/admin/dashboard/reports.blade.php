
@include('admin.dashboard.aheader')
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
                margin-top:40px;
                margin-bottom:20px;
            }

     table{
         margin-top:50px ;
     }
        </style>
          
    </head>
    <body class="antialiased"  style="background-color: green">
        <div class="container-fluid">

            <h1>Complains Reported On Platform</h1>
            <h2>Complains Filed By Passengers for drivers</h2>

            <table class="table table-bordered table-hover " id="pReport-table" name="pReport-table" style="content-justify:centre;text-align: center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
                <tr>
                    
                    <th>Complain Title</th>
                    <th>Filed By Passenger</th>
                    <th>Description of Complain</th>
                    <th>Event Id</th>
                    <th>Event Date</th>
                    <th>Filed Against Driver</th>
                    <th>Status Of Complain</th>
                
                   
                   
                </tr>
                @if ($driverreports->count() == 0)
                <tr>
                    <td colspan="7" style="text-align: center; color:red;">No Complain Reported.</td>
                </tr>
                @endif
               
            
                @foreach ($driverreports as $driverreport)
                <tr>
                    
                    <td>{{ $driverreport->title }}</td>
                    <td>{{ $driverreport->psn_name }}</td>
                    <td>{{ $driverreport->desc}}</td>
                    <td>{{ $driverreport->eventid}}</td>
                    <td>{{ $driverreport->date}}</td>
                    <td>{{ $driverreport->driver_name}}</td>
                    <td>
                        <input type="checkbox" class="toggle-class-d" data-id="{{$driverreport->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Report Solved" data-off="Report Pending" name="" id=""
                        {{$driverreport->status ? 'checked' : ''}}
                        >
                    </td>
                           
                @endforeach
               

            </table>

            <h2>Complains Filed By Drivers for Passengers</h2>

            <table class="table table-bordered table-hover " id="pReport-table" name="pReport-table" style="content-justify:centre;text-align: center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
                <tr>
                    
                    <th>Complain Title</th>
                    <th>Filed By Driver</th>
                    <th>Description of Complain</th>
                    <th>Event Id</th>
                    <th>Event Date</th>
                    <th>Filed Against Passenger</th>
                    <th>Status Of Complain</th>
                
                   
                   
                </tr>
                @if ($psnreports->count() == 0)
                <tr>
                    <td colspan="7" style="text-align: center; color:red;">No Complain Reported.</td>
                </tr>
                @endif
               
            
                @foreach ($psnreports as $psnreport)
                <tr>
                    
                    <td>{{ $psnreport->title }}</td>
                    <td>{{ $psnreport->driver_name}}</td>
                    <td>{{ $psnreport->desc}}</td>
                    <td>{{ $psnreport->eventid}}</td>
                    <td>{{ $psnreport->date}}</td>
                    <td>{{ $psnreport->psn_name }}</td>
                    
                    <td>
                        <input type="checkbox" class="toggle-class-p" data-id="{{$psnreport->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Report Solved" data-off="Report pending" name="" id=""
                        {{$psnreport->status ? 'checked' : ''}}
                        >
                    </td>
                           
                @endforeach
               

            </table>


        </div>
    </body>
</html>


<script>
      $(function() {
    $('.toggle-class-d').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/drivreportS',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })

  $(function() {
    $('.toggle-class-p').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/psnreportS',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })

</script>