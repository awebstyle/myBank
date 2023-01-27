<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
      <img src={{ asset("assets/images/logo.png") }} width="30" height="30" class="d-inline-block align-top" alt="">
      MCB Bank  
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link {{ request()->is('client/home') ? 'active' : ''}}" href="{{ route('clienthome') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{ request()->is('client/account') ? 'active' : ''}}">  <a class="nav-link" href="{{ route('clientaccount') }}">Accounts</a></li>
          <li class="nav-item {{ request()->is('client/statements') ? 'active' : ''}}">  <a class="nav-link" href="{{ route('clientstatements') }}">Account Statements</a></li>
          <li class="nav-item {{ request()->is('client/transfer') ? 'active' : ''}}">  <a class="nav-link" href="{{ route('clienttransfer') }}">Funds Transfer</a></li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="" class="btn btn-outline-success" data-toggle="tooltip" title="Your current Account Balance">Acount Balance : ${{ Session::get('client')->balance}}</a>  
            <a href="{{ route('clientaccount') }}" data-toggle="tooltip" title="Account Summary" class="btn btn-outline-primary mx-1" ><i class="fa fa-book fa-fw"></i></a> 
            <a href="{{ route('clientnotice') }}" data-toggle="tooltip" title="View Notice" class="btn btn-outline-primary mx-1" ><i class="fa fa-envelope fa-fw"></i></a> 
            <a href="{{ route('clientfeedback') }}" data-toggle="tooltip" title="Help?" class="btn btn-outline-info mx-1" ><i class="fa fa-question fa-fw"></i></a> 
            <a href="{{ route('clientlogout') }}" data-toggle="tooltip" title="Logout" class="btn btn-outline-danger mx-1" ><i class="fa fa-sign-out fa-fw"></i></a>    
        </form>    
      </div>
    </nav><br><br><br>