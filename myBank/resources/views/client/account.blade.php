@extends('client.template.index')

@section('title')
    Client account
@endsection

@section('content')
    <div class="container">
      <div class="card  w-75 mx-auto">
        <div class="card-header text-center">
          Your account Information
        </div>
        <div class="card-body">
          <div class="text-center">
              <img src="/storage/account_images/{{$account->photo}}" height="150" width="150" alt="" class="rounded-circle m-2" style="border : 5px solid #555;">
          </div>
          <table class="table table-striped table-dark w-75 mx-auto">
            <thead>
              <tr>
                <td scope="col">Account No.</td>
                <th scope="col">{{ $account->accountNumber }}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Branch</th>
                <td>{{ $account->branchName }}</td>
              </tr>
              <tr>
                <th scope="row">Branch Code</th>
                <td>100101</td>
              </tr>
              <tr>
                <th scope="row">Account Type</th>
                <td>{{ $account->branchCode }}</td>
              </tr>
              <tr>
                <th scope="row">Account Created</th>
                <td>{{ $account->created_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer text-muted">
            MCB Bank  
        </div>
      </div>
    </div>
@endsection