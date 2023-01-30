@extends('cashier.template.index')

@section('title')
    Cashier home
@endsection

@section('content')
    <div class="row w-100" style="padding: 11px">
      <div class="col">
        <div class="card text-center w-75 mx-auto">
          <div class="card-header">
            Account Information
          </div>
          @if(Session::has('statusTr'))
          <div class="alert alert-danger">
            
              {{ Session::get('statusTr')}}
            
          </div>
          @endif
           @if(Session::has('status1'))
          <div class="alert alert-success">
            
              {{ Session::get('status1')}}
            
          </div>
          @endif
          <div class="card-body">
            <p class="card-text">      
              <form method="POST" action="{{ route('cashiertransaction') }}">
                @csrf
                <div class="alert alert-success w-50 mx-auto">
                  <h5>Enter Account Number</h5>
                  <div class="form-group">
                    <input type="text" name="accountNumber" class="form-control " placeholder="Enter  Account number" required>
                  </div>
                  <button type="submit" name="get" class="btn btn-primary btn-bloc btn-sm my-1">Get Account Info</button>
                </div>
              </form>
            </p>
          </div>
          <div class="card-footer text-muted">
            MCB Bank  
          </div>
        </div>
      </div>
    </div>
@endsection