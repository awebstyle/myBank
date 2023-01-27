@extends('admin.template.index')

@section('title')
    Notice
@endsection

@section('content')
    <div class="container">
      <div class="card w-100 text-center shadowBlue">
        <div class="card-header">
          Send Notice to {{ $account->name }}  
        </div>
        @if(Session::has('status'))
          <div class="alert alert-success">
            {{ Session::get('status') }}
          </div>
        @endif
        <div class="card-body">
          <form method="POST" action="{{ route('sendnotice')}}">
            @csrf
            <div class="alert alert-success w-50 mx-auto">
              <h5>Write notice for {{ $account->name }}</h5>
              
              <input type="hidden" name="accountNumber" value={{ $account->accountNumber }}>
              <textarea class="form-control" name="notice" required placeholder="Write your message"></textarea>
              <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
            </div>
          </form>  
        </div>
        <div class="card-footer text-muted">
          MCB Bank  
        </div>
      </div>
    </div>
@endsection