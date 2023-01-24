@extends('.admin.template.index')
@section('title')
    Managment home
@endsection

@section('content')
    <div class="container">
        <div class="card w-100 text-center shadowBlue">
            <div class="card-header">
            All accounts
            </div>
            <div class="card-body">
            <table class="table table-bordered table-sm bg-dark text-white">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Holder Name</th>
                    <th scope="col">Account No.</th>
                    <th scope="col">Branch Name</th>
                    <th scope="col">Current Balance</th>
                    <th scope="col">Account type</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">2</th>
                    <td>Fayyaz Khan</td>
                    <td>1513410739</td>
                    <td>Dera Ghazi Khan</td>
                    <td>Rs.234034</td>
                    <td>saving</td>
                    <td>03356910260</td>
                    <td>
                    <a href="{{ route('adminshowaccount') }}" class='btn btn-success btn-sm' data-toggle='tooltip' title="View More info">View</a>
                    <a href="{{ route('adminnotice') }}" class='btn btn-primary btn-sm' data-toggle='tooltip' title="Send notice to this">Send Notice</a>
                    <a href="{{ route('admindeleteaccount') }}" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this account">Delete</a>
                    </td>
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