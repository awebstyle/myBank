@extends('admin.template.index')

@section('title')
    Client details
@endsection

@section('content')
    <div class="container">
      <div class="card w-100 text-center shadowBlue">
        <div class="card-header">
          Account profile for {{ $account->name }}<kbd>{{ $account->accountNumber }}</kbd>  
        </div>
        <div class="card-body bg-dark text-white">
          <div class="text-center">
            <img src="/storage/account_images/{{$account->photo}}" height="100" width="100" alt="" class="rounded-circle m-2" style="border : 2px solid #FFF;">
          </div>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>Name</td>
                <th>{{ $account->name }}</th>
                <td>Account No</td>
                <th>{{ $account->accountNumber }}</th>
              </tr><tr>
                <td>Branch Name</td>
                <th>{{ $account->branchName }}</th>
                <td>Branch Code</td>
                <th>{{ $account->branchCode }}</th>
              </tr><tr>
                <td>Current Balance</td>
                <th>$ {{ $account->balance }}</th>
                <td>Account Type</td>
                <th>{{ $account->accountType }}</th>
              </tr><tr>
                <td>Cnic</td>
                <th>{{ $account->cmic }}</th>
                <td>City</td>
                <th>{{ $account->city }}</th>
              </tr><tr>
                <td>Contact Number</td>
                <th>{{ $account->phone }}</th>
                <td>Address</td>
                <th>{{ $account->address }}</th>
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