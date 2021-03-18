@extends('layouts.general')
@section('content')
<section class="account-section">
    <div class="row">
        <div class="account">
            <div class="acc" style="width:20%;">
                <p>Shop Name</p>
            </div>
            <div class="my-content" style="width:80%;">
                <div class="name">
                    <h4>{{$table->name}}</h4>
                </div>
                <div class="name">
                    <h4>{{$table->address}}</h4>
                </div>
                <div class="post">
                    <div class="image">
                        @if ($table->image == 'default.jpg')
                            <img src="{{asset('img/default.png')}}" alt="image">
                        @else
                            <img src="{{asset('uploads/shoptype/'.$table->image)}}" alt="image">
                        @endif
                    </div>
                    <div class="button">
                       <a href="{{action('User\HomeController@add_coffee',['id' => $table->id, 'slug' => Str::slug($table->name)])}}">Add Coffee!</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="account">
            <table class="table" id="ads">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1;
                  @endphp
                  @foreach ($coffees as $item)
                      <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>
                        @if($item->image=='default.jpg')
                            <img width="50" height="40" src="{{asset('img/default.png')}}" alt="ad-image">
                        @else
                            <img width="50" height="40" src="{{asset('uploads/coffee/'.$item->image)}}" alt="blog-image">
                        @endif
                      </td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->price}} tk</td>
                    <td class="text-right">
                    <a onclick="return confirm('Are you sure to delete?')" href="" class="btn btn-sm btn-success">Del</a>
                    </td>
                  </tr>
                  @endforeach
                      
                </tbody>
              </table>
        </div>

    </div>

</section>
@endsection