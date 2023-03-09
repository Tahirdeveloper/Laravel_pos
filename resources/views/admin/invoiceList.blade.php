@extends('admin.layout')
@section('page_name','Invoice List')
@section('container')
<div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Customer Name</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th>Grant Amount</th>
                      <th>Dues</th>
                      <th>Change</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Khan</td>
                      <td>4304809</td>
                      <td>Update software</td>
                      <td>3/4/2023</td>
                      <td>40000</td>
                      <td>300000</td>
                      <td>10000</td>
                      <td>00</td>
                      <td><span class="badge bg-danger">Unpaid</span></td>
                      <td><span class="badge bg-info">View Invoice</span></td>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Khan</td>
                      <td>4304809</td>
                      <td>Update software</td>
                      <td>3/4/2023</td>
                      <td>40000</td>
                      <td>300000</td>
                      <td>10000</td>
                      <td>00</td>
                      <td><span class="badge bg-danger">Unpaid</span></td>
                      <td><span class="badge bg-info">View Invoice</span></td>
                    </tr> <tr>
                      <td>1.</td>
                      <td>Khan</td>
                      <td>4304809</td>
                      <td>Update software</td>
                      <td>3/4/2023</td>
                      <td>40000</td>
                      <td>300000</td>
                      <td>10000</td>
                      <td>00</td>
                      <td><span class="badge bg-danger">Unpaid</span></td>
                      <td><span class="badge bg-info">View Invoice</span></td>
                    </tr> <tr>
                      <td>1.</td>
                      <td>Khan</td>
                      <td>4304809</td>
                      <td>Update software</td>
                      <td>3/4/2023</td>
                      <td>40000</td>
                      <td>300000</td>
                      <td>10000</td>
                      <td>00</td>
                      <td><span class="badge bg-danger">Unpaid</span></td>
                      <td><span class="badge bg-info">View Invoice</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            @endsection