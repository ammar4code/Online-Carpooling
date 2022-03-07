@include('driver.dashboard.dheader');

<style>
   body{
      background-color: green;
   }

   strong{
      color: white
   }
   
   h2{
      color: yellow;
      text-align: center;
   }

</style>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
   {{ session('status') }}
</div>
@endif
<div class="container mt-2">
    <div class="row">
       <div class="col-lg-12 margin-tb">
          <div class="pull-left mb-2">
             <h2>Edit Event</h2>
          </div>
          <br>

          <div class="pull-right">
             <a class="btn btn-info" href="{{ route('driver.index') }}"> Back</a>
          </div>
       </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
       {{ session('status') }}
    </div>
    @endif

    <br>
    
    
    <form action="{{ url('event/update/'.$events->id) }}" method="POST">
       @csrf
       
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Event Title:</strong>
                <input type="text" name="title" style="" id="title" class="form-control" value="{{$events->title}}" placeholder="Event Title" >
              
           
             </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>From City</strong>
                <input type="text" name="from" id="from" class="form-control" value="{{$events->from}}" placeholder="From City" >
             </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>To City</strong>
               <input type="text" name="To" id="To" class="form-control" value="{{$events->To}}" placeholder="To City" >
            </div>
         </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Event Date</strong>
                <input class="date form-control" type="date" id="date" name="date" value="{{$events->date}}" placeholder="Event Date">
                
                </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Event Time</strong>
               <input class="date form-control" type="time" id="date" name="time" value="{{$events->time}}" placeholder="Event Time">
               </div>
         </div>
                
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Event Price (PKR):</strong>
                <input type="text" name="price" id="price" value="{{$events->price}}" class="form-control" placeholder="Booking Price">
          </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Vehicle Type:</strong>
                <select class="form-control" value="{{$events->vehicle_type}}" name="vehicle_type">
                  @foreach ($vehicles as $vehicle)

                  <option value="{{$vehicle->vehicle_type}}">{{$vehicle->vehicle_type}}</option>
               
                  @endforeach
                </select>

             </div>
          </div>
         <button type="submit" class="btn btn-primary ml-3">Submit</button>
       </div>
  
    </form>
   