@extends('client.template.index')

@section('title')
    Client statements
@endsection

@section('content')
    <div class="container">
      <div class="card  w-75 mx-auto">
        <div class="card-header text-center">
          Transaction made against you account
        </div>
        <div class="card-body">
          @foreach($statements as $statement)
            @if($statement->source == Session::get('client')->accountNumber)
              @if($statement->status == 0)
                <div class="alert alert-success">
                 

                  Dépôt de ${{ $statement->amount }} le {{ \Carbon\Carbon::parse($statement->created_at)->format('d/m/Y') }}
                </div>
              
              @elseif($statement->status == 1)
                 <div class="alert alert-primary">
                  Transfert de ${{ $statement->amount }} vers le compte {{ $statement->destination }} le {{ \Carbon\Carbon::parse($statement->created_at)->format('d/m/Y') }}
                 </div>
              
              @elseif($statement->status == 3)
                <div class="alert alert-warning">
                  Vous avez retiré ${{ $statement->amount }} le {{ \Carbon\Carbon::parse($statement->created_at)->format('d/m/Y') }}
                </div>
              @endif
            @elseif($statement->destination == Session::get('client')->accountNumber)
                @if($statement->status == 2)
                  <div class="div alert alert-success">
                    Versement de ${{ $statement->amount }} du compte {{ $statement->source }} le {{ \Carbon\Carbon::parse($statement->created_at)->format('d/m/Y') }}
                  </div>
                @endif
            @endif
          @endforeach
        </div>
        <div class="card-footer text-muted">
        MCB Bank  
        </div>
      </div>
    </div>
@endsection