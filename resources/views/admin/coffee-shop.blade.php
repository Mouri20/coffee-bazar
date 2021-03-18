@extends('layouts.master')
@extends('admin.box.box')
@section('content')
<section class="content mt-2">

    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Coffee Shop</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($types as $key => $item)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if($item->image=='default.jpg')
                        <img width="50" height="40" src="{{asset('img/default.png')}}" alt="ad-image">
                        @else
                        <img width="50" height="40" src="{{asset('uploads/shoptype/'.$item->image)}}" alt="blog-image">
                        @endif
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td class="text-right">
                                  <a href="#" data-id="{{$item->id}}" data-name="{{$item->name}}" class="btn btn-success btn-sm viewBtn"><i class="fa fa-eye"></i></a>
                                  <a href="{{action('Admin\ShopTypeController@del',$item->id)}}" onclick="return confirm('Sure to delete?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            @endforeach
                      </tbody>
                    </table>
            </div>
                <!-- /.card-footer-->
              </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Coffee List of <span id="shop_name" class="text-success"></span></h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody id="coffee_list">
                        
                      </tbody>
                    </table>
            </div>
                <!-- /.card-footer-->
              </div>
        </div>
    </div>

  </section>
@endsection
@section('script')
<script src="{{asset('asset/')}}/vendors/js/jquery.min.js"></script>
<script>
    $(function(){
        $('.viewBtn').click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
                $.ajax({
                url : "{{action('Admin\ShopTypeController@shop_wise_coffee')}}",
                type : 'GET',
                data: {shop_type_id:id},
                success : function(data){
                    //console(data)
                    $('#shop_name').html(name);
                    $('#coffee_list').empty().html(data);
                    
                }
            });
        });
    });
</script>
@endsection