@extends('client.template.index')

@section('title')
    Feedback
@endsection

@section('content')
<div class="container">
      <div class="card  w-75 mx-auto">
        <div class="card-header text-center">
          Help Card
        </div>
        @if(Session::has('status'))
        <div class="alert alert-success">
          {{ Session::get('status') }}
        </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('clientmessage')}}">
              @csrf
                <div class="alert alert-success w-50 mx-auto">
                  <h5>Enter your message</h5>
                  <textarea class="form-control" name="message" required placeholder="Write your message"></textarea>
                  <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
                </div>
            </form>
          <br>
        </div>
        <div class="card-footer text-muted">
        MCB Bank  
        </div>
      </div>
    </div>
@endsection