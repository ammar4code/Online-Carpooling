
@include('admin.dashboard.aheader')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
    h1{
                color: green;
                text-align: center;
                margin-top:20px;
                margin-bottom:20px;
            }
</style>
@if(session()->has('message'))
<div class="alert alert-success" style="text-align: center">
    {{ session()->get('message') }}
</div>
@endif
<h1>Carpool Events Created By Driver</h1>

<table class="table table-bordered table-hover " id="Events-table" name="Events-table" style="text-align: center; content-justify:center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
    <tr>
        
        <th>Title</th>
        <th>From City</th>
        <th>To City</th>
        <th>Date</th>
        <th>Time</th>
        <th>Driver Name</th>
        <th>Vehicle Name</th>
        <th>Event Status</th>
        <th>Delete Event</th>
       
       
    </tr>
    @if ($events->count() == 0)
    <tr>
        <td colspan="9" style="text-align: center; content-justify:center; color:red;">No Event to display.</td>
    </tr>
    @endif
   

    @foreach ($events as $event)
    <tr>
        
        <td>{{ $event->title }}</td>
        <td>{{ $event->from }}</td>
        <td>{{ $event->To}}</td>
        <td>{{ $event->date}}</td>
        <td>{{ $event->time}}</td>
        <td>{{ $event->DriverName}}</td>
        <td>{{ $event->vehicle_type}}</td>
        <td>
            <input type="checkbox" class="toggle-class" data-id="{{$event->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="confirmed" data-off="denied" name="" id=""
            {{$event->status ? 'checked' : ''}}
            >
        </td>

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
                            <a class="btn btn-danger" href='{{ url('admin/eventdelete'. '/'.$event->id)}}' role="button">Confirm Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        

        </td>
    @endforeach
</table>

<script>
    $(function() {
  $('.toggle-class').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0; 
      var event_id = $(this).data('id'); 
       
      $.ajax({
          type: "GET",
          dataType: "json",
          url: '/eventStatus',
          data: {'status': status, 'event_id': event_id},
          success: function(data){
            console.log(data.success)
          }
      });
  })
})
</script>