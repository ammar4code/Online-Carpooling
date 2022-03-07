@include('admin.dashboard.aheader')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    h1{
                color: green;
                text-align: center;
                margin-top:20px;
                margin-bottom:20px;
            }
</style>

<body>
    @if(session()->has('message'))
    <div class="alert alert-success" style="text-align: center">
        {{ session()->get('message') }}
    </div>
@endif
    <h1>Accepting Application from recently registered drivers</h1>

<table class="table table-bordered table-hover " id="Events-table" name="Events-table" style="content-justify:center; text-align:center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
    <tr>
        
        <th>Name</th>
        <th>Email</th>
        <th>Grant Permission</th>
        
       
       
    </tr>
    
    @if ($accounts->count() == 0)
    <tr>
        <td colspan="9" style="text-align: center; color:red;">No Application pending.</td>
    </tr>
    @endif
   

    @foreach ($accounts as $account)
    <tr>
        
        <td>{{ $account->name }}</td>
        <td>{{ $account->email }}</td>
        <td>
            <input type="checkbox" class="toggle-class" data-id="{{$account->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="confirmed" data-off="denied" name="" id=""
            {{$account->loginauth ? 'checked' : ''}}
            >
        </td>
            
        
        
     

       
    @endforeach


</table>


<script>
    $(function() {
  $('.toggle-class').change(function() {
      var loginauth = $(this).prop('checked') == true ? 1 : 0; 
      var user_id = $(this).data('id'); 
       
      $.ajax({
          type: "GET",
          dataType: "json",
          url: '/driverStatus',
          data: {'loginauth': loginauth, 'user_id': user_id},
          success: function(data){
            console.log(data.success)
          }
      });
  })
})
</script>
</body>