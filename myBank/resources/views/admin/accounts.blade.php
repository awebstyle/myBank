@extends('admin.template.index')

@section('title')
    Management accounts
@endsection

@section('content')
    <div class="container">
      <div class="card w-100 text-center shadowBlue">
        <div class="card-header">
          All Staff Accounts <button class="btn btn-outline-success btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Add New Account</button>
        </div>

        <div class="card-body bg-dark text-white">
          @if(Session::has('status'))
            <div class="alert alert-success">
              {{ Session::get('status') }}
            </div>
          @endif
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Email</th>
                <th>Account Type</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cashiers as $cashier)
                <tr>
                  <td>{{$cashier->email}}</td>
                 
                  <td>{{$cashier->accounttype}}</td>
                  <td class="d-flex justify-content-around">
                    <a href='' class='btn btn-primary btn-sm' data-toggle="modal" data-target="#exampleModalUpdate{{$cashier->id}}">Edit</a>
                    <form style="max-width: 25%;" action="{{route('deletecashier', [$cashier->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" id="delete" class="btn btn-danger btn-sm" value="">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach   
            </tbody>
          </table>
        </div>
        <div class="card-footer text-muted">
          MCB Bank  
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-white">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Cashier Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action={{{ route('addcashier')}}}>
                @csrf
                <div class="form-group">
                  <input class="form-control w-75 mx-auto" type="email" name="email" required placeholder="Email">
                </div>
                <div class="form-group">
                  <input class="form-control w-75 mx-auto" type="password" name="password" required placeholder="Password" minlength="8">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="saveAccount" class="btn btn-primary">Save Account</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Update -->
    @foreach($cashiers as $cashier)
      <div class="modal fade" id="exampleModalUpdate{{$cashier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-dark text-white">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Cashier Account</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('updatecashier' , [$cashier->id]) }}">
                @csrf
                  <input type="hidden" name="id" id="id" value= {{ $cashier->id }}>
                  <div class="form-group">
                    <input class="form-control w-75 mx-auto" type="email" name="email" required placeholder="Email" value="{{ $cashier->email }}">
                  </div>
                  <div class="form-group">
                    <input class="form-control w-75 mx-auto" type="password" name="password" required placeholder="Password" value="{{ $cashier->password }}" minlength="8">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="saveAccount" class="btn btn-primary">Update Account</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection