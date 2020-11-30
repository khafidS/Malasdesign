@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">Transaction List</h4>
        </div>
        <div class="card-body">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>uuid</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Transaction Total</th>
                  <th>Transaction Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection