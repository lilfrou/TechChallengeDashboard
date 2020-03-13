@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h1>Challenges</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="btn-group">
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add Challenge
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Add Challenge</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
         <div class="form-group">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title">
              </div>
           </div>
           <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" rows="5" name="description"></textarea>
          </div>

     </div>
     <div class="modal-footer">
         <button type="submit" class="btn btn-success">Save changes</button>

       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     </div>
   </div>
     </div>
</div>
                    </div>
                </div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-vcenter">
    <thead>
        <tr>

            <th> Title</th>
            <th> Description </th>
            <th> Deadline </th>
            <th> Status</th>
            <th> Action</th>

        </tr>
    </thead>
    <tbody>
@forelse ($challenges as $challenge)

<tr>

      <td> {{$challenge->title}} </td>
      <td> {{$challenge->description}} </td>
      <td> {{$challenge->deadline}} </td>
      <td> {{$challenge->status}} </td>
      <td class="text-center">
            <div class="btn-group">
           <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Change User Authority</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="form-group">
<label for="auth">Authority</label>
<select class="form-control" id="auth">
  <option>Guest</option>
  <option>Participant</option>
  <option>Admin</option>
  <option>Organizer</option>
</select>
</div>
</div>
{{-- <form  action="{{route(user.update)}}" method="post"> --}}
@method('PATCH')
@csrf
<div class="modal-footer">
<button type="button" class="btn btn-success">Save changes</button>

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>


</div>
<div class="btn-group">
           <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal2">
delete
</button>

<!-- Modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="model2" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="model2">User Destroy</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<h1>Are you sure you want to Delete the User {{$challenge->id}}?</h1>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-warning">Confirm</button>

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>


</div>



        </td>

</tr>
@empty
<td class="text-center" colspan="5">{{ __('NO Challenges Available')}}</td>

        @endforelse

</tbody>


</table>

</div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
