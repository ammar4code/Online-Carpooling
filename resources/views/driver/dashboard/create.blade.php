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



<div class="container mt-2">

  <div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

    <div class="row">
       <div class="col-lg-12 margin-tb">
          <div class="pull-left mb-2">
             <h2>Create Event</h2>
          </div>
          <br>

          <div class="pull-right">
             <a class="btn btn-info" href="{{ route('driver.index') }}"> Back</a>
          </div>
       </div>
    </div>
    <br>

    <form action="/store" method="POST">
       @csrf
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Event Title:</strong>
                <input type="text" name="title"  id="title" class="form-control" placeholder="Event Title" >
                <input type="text" name="DriverName" id="DriverName" class="form-control" value="{{Auth::user()->name}}" hidden>
                <input type="text" name="DriverId" id="DriverId" class="form-control" value="{{Auth::user()->id}}" hidden>
           
             </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>From City</strong>
                <input type="text" name="from" id="from" class="form-control" placeholder="From City" >
             </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>To City</strong>
               <input type="text" name="To" id="To" class="form-control" placeholder="To City" >
            </div>
         </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Event Date</strong>
                <input class="date form-control" type="date" id="date" name="date" placeholder="Event Date">
                
                </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Event Time</strong>
               <input class="date form-control" type="time" id="date" name="time" placeholder="Event Time">
               </div>
         </div>
                
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Event Price (PKR):</strong>
                <input type="text" name="price" id="price" class="form-control" placeholder="Booking Price">
          </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Vehicle Type:</strong>
                <select class="form-control" name="vehicle_type">
                  @foreach ($vehicles as $vehicle)

                    <option value="{{$vehicle->vehicle_type}}">{{$vehicle->vehicle_type}}</option>
                 
                    @endforeach
                  </select>
                    
                  

             </div>
          </div>
         <button type="submit" class="btn btn-primary ml-3">Submit</button>
       </div>
    </form>