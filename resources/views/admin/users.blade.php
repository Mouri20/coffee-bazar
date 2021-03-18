@extends('layouts.master')
@section('content')
<section class="content mt-2">

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Users</h3>
                </div>
                <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>UserRole</th>
                              <th class="text-right">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($table as $key => $item)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->userRole}}</td>
                                <td class="text-right">
                                    @if ($item->id != Auth::user()->id)
                                    @if ($item->userRole == 'Admin')
                                    <a href="{{action('Admin\UserController@make_user',$item->id)}}" onclick="return confirm('Sure to make user?')" class="btn btn-danger btn-sm">Make User</a>
                                    @else
                                        <a href="{{action('Admin\UserController@make_admin',$item->id)}}" onclick="return confirm('Sure to make admin?')" class="btn btn-success btn-sm">Make Admin</a>
                                    @endif
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                </div>
                <!-- /.card-footer-->
              </div>
        </div>
    </div>

  </section>
@endsection