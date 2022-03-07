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

@if(session()->has('message'))
<div class="alert alert-success" style="text-align: center">
    {{ session()->get('message') }}
</div>
@endif

<h1>All users on Carpooling System</h1>

<table class="table table-bordered table-hover " id="Events-table" name="Events-table" style="content-justify:center; text-align:center; background-color:white; width:70%; margin-left:auto;margin-right:auto;">
    <tr>
        
        <th>Name</th>
        <th>Email</th>
        <th>Role<br>(Click to change role)</th>
        <th>Status</th>
        <th>Delete Account</th>
        
       
       
    </tr>
    @if ($accounts->count() == 0)
    <tr>
        <td colspan="9" style="text-align: center; color:red;">No User Registered.</td>
    </tr>
    @endif
   

    @foreach ($accounts as $account)
    <tr>
        
        <td>{{ $account->name }}</td>
        <td>{{ $account->email }}</td>
        
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#statusModal-{{$account->id}}">{{$account->role}}</button>
            
                <div class="modal fade" id="statusModal-{{$account->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" style="color: red; text-align:centre">Change Account Role</h2>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Please Select Role</p>

                                <form action="{{ url('admin/changerole'. '/'.$account->id). '/' }}" method="POST">
                                    @csrf
                                    @if ($account->role == "Driver")
                                    <select class="form-control m-input" id="changerole" name="changerole">
                                        <option value="Passenger" >Passenger </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary ml-3" style="margin-top:15px;margin bottom:15px">Submit</button>
                                    @endif
                                    @if ($account->role == "Passenger")
                                    <select class="form-control m-input" id="changerole" name="changerole">
                                        <option value="Driver" >Driver</option>
                                    </select>
                                    <button type="submit" class="btn btn-danger ml-3" style="margin-top:15px;margin bottom:15px">Click to Change</button>
                                        @endif
                                    
                                      
                                    
                                </form>

                            </div>
                           
                        </div>
                    </div>
                </div>
            </td>
        </td>
        @if($account->loginauth == 1)
        <td>Account Activated</td>
    @else
    <td>Account Not active</td>
@endif
     
<td>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal-{{$account->id}}">Delete User</button>

    <div class="modal fade" id="delModal-{{$account->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" style="color: red; text-align:centre">Delete User</h2>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this user account!</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href='{{ url('admin/accountdelete'. '/'.$account->id)}}' role="button">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>


</td>
       
    @endforeach


</table>

