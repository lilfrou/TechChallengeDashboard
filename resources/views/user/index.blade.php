@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h1>Users List</h1></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>

                            <th> Name</th>
                            <th> Email </th>
                            <th> Auth </th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                @forelse ($users as $user)

                <tr>

                      <td> {{$user->name}} </td>
                      <td> {{$user->email}} </td>
                      <td> {{$user->auth}} </td>
                      <td class="text-center">
                        <div class="btn-group">
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#info{{$user->id}}">
                        Info

                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="info{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="info{{$user->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="info{{$user->id}}">User Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" id="name" value="{{$user->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" value="{{$user->email}}" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="auth">Auth</label>
                                    <input type="text" class="form-control" id="auth" value="{{$user->auth}}" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="create">Created at</label>
                                    <input type="text" class="form-control" id="create" value="{{$user->created_at}}" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="update">Updated_at</label>
                                    <input type="text" class="form-control" id="update" value="{{$user->updated_at}}" readonly>
                                  </div>

                              </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                        </div>


                        </div>

                            <div class="btn-group">
                           <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{$user->id}}">
    Edit
  </button>

  <!-- Modal -->
  <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit{{$user->id}}">Change User Authority</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="auth">Authority</label>
                <select class="form-control" name="auth" id="auth">
                  <option value="guest" {{ old('auth',$user->auth) == 'guest' ? 'selected' : '' }}>guest</option>
                  <option value="participant" {{ old('auth',$user->auth) == 'participant' ? 'selected' : ''}}>participant</option>
                  <option value="admin"  {{ old('auth',$user->auth) == 'admin' ? 'selected' : '' }}>admin</option>
                 <option value="operator" {{ old('auth',$user->auth) == 'operator' ? 'selected' : ''}}>operator</option>
                </select>
              </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success">Save changes</button>

          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
        </div>


  </div>
<div class="btn-group">
                           <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete{{$user->id}}">
    Delete
  </button>

  <!-- Modal -->
  <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="delete{{$user->id}}">User Destroy</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <h1>Are you sure you want to Delete the User {{$user->name}}?</h1>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger">Confirm</button>

          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
        </div>


  </div>

                        </td>

                </tr>
                @empty
                <td class="text-center" colspan="5">{{ __('NO USers Available')}}</td>

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
