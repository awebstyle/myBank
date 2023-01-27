<!DOCTYPE html>
<html>
  <head>
    <title>Banking</title>	
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
    <script src='assets/js/jquery-3.2.1.min.js'></script>
    <script src='assets/js/popper.min.js'></script>
    <script src='assets/js/bootstrap.min.js'></script>
  </head>
  
  <body style="background: url(assets/images/bg-login2.jpg);background-size: 100%">
  <h1 class="alert alert-success rounded-0">MCB Bank<small class="float-right text-muted" style="font-size: 12pt;"><kbd>Presented by:Tariq Fareed</kbd></small></h1>
  <br>
  <br>
  <div id="accordion" role="tablist" class="w-25 float-right shadowBlack" style="margin-right: 222px">
    <br><h4 class="text-center text-white">Select Your Session</h4>
    <div class="card rounded-0">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <button class="btn btn-outline-success btn-block">User Login</button>
          </a>
        </h5>
        @if(Session::has('status'))
          <div class="alert alert-danger">
            {{ Session::get('status') }}
          </div>
        @endif
      </div>

      <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
        <form method="POST" action="{{ route('clientlogin')}}">
          @csrf
          <input type="email" name="email" class="form-control" required placeholder="Enter Email">
          <input type="password" name="password" class="form-control" required placeholder="Enter Password">
          <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
        </form>
        </div>
      </div>
    </div>
    <div class="card rounded-0">
      <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
          <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Manager Login
          </a>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          <form method="POST">
          <input type="email"  name="email" class="form-control" required placeholder="Enter Email">
          <input type="password" name="password" class="form-control" required placeholder="Enter Password">
          <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="managerLogin">Enter </button>
        </form>
        </div>
      </div>
    </div>
    <div class="card rounded-0">
      <div class="card-header" role="tab" id="headingThree">
        <h5 class="mb-0">
          <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Cashier Login
          </a>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          <form method="POST">
          <input type="email" name="email" class="form-control" required placeholder="Enter Email">
          <input type="password" name="password" class="form-control" required placeholder="Enter Password">
          <button type="submit"  class="btn btn-primary btn-block btn-sm my-1" name="cashierLogin">Enter </button>
        </form>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>