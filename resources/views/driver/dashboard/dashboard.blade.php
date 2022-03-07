@include('driver.dashboard.dheader')




<style>

body{
    background-color: green;
}

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

@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
   {{ session('status') }}
</div>
@endif

<h1>Your Created Carpooling Events</h1>

<table class="table table-bordered table-hover" style="background-color:white; width:70%; margin-left:auto;margin-right:auto;">
    <thead>
       
        <th>Title</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Time</th>
        <th>Vehicle</th>
        <th>Status</th>
        <th colspan="2">Commands</th>
    </thead>

    @if ($events->count() == 0)
    <tr>
        <td colspan="7" style="text-align: center; color:red">Event is not Created By you.</td>
    </tr>
    @endif
   

    @foreach ($events as $event)
    <tr>
        
        <td>{{ $event->title }}</td>
        <td>{{ $event->from }}</td>
        <td>{{ $event->To}}</td>
        <td>{{ $event->date}}</td>
        <td>{{ $event->time}}</td>
        <td>{{ $event->vehicle_type}}</td>
      
        @if($event->status == '0')
            <td>Event Not Approved</td>
        @else
        <td>Event Approved</td>
        @endif

        
           
       
        <td>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal-{{$event->id}}">Edit Event</button>
            
        </td>
       <div class="modal fade" id="editModal-{{$event->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" style="color: green; text-align:centre">Carpool Event</h2>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to edit your event!</p>
                        </div>
                        <div class="modal-footer">
                            <form method="GET" action="{{ url('event/edit'.$event->id)}}" role="button">
                            <a class="btn btn-success" href="{{ url('event/edit'. '/'.$event->id)}}" role="button">{{$event->id}} Edit Event</a>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal-{{$event->id}}">Delete Event</button>
        
            <div class="modal fade" id="delModal-{{$event->id}}">
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
                            <a class="btn btn-danger" href='{{ url('event/delete'. '/'.$event->id)}}' role="button">Confirm Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        

        </td>
        
      
    @endforeach
</table>