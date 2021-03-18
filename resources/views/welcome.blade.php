@extends('layouts.user-main')
@section('content')
<section class="main-section js-maina">
    <div class="row">
        <div class="main">
            <div class="left-side">
                <div class="search-area">
                    <form action="{{action('User\HomeController@search_shop')}}" method="GET">
                        <input type="text" placeholder="search here.." name="serachkey">
                        <input class="search-button" type="submit" value="search here">
                    </form>
                </div>
                <div class="title">
                    <h2> Coffee Shops</h2>
                </div>
                <div class="category-box">
                    <div class="category-name">
                        @foreach ($types as $item)
                            <div class="items-box">
                                <div class="image">
                                    @if ($item->image == 'default.jpg')
                                        <img src="{{asset('img/default.png')}}" alt="">
                                    @else
                                        <img src="{{asset('uploads/shoptype/'.$item->image)}}" alt="">
                                    @endif
                                    
                                    
                                </div>
                                <div class="details">
                                    <p style="
                                    font-size: 16px;
                                    margin-top: 10px;
                                "><span style="
                                        color: indianred;
                                        margin-right: 4px;
                                        margin-left: 10px;
                                    ">Address:</span> <span>{{$item->address}}</span></p>
                                </div>
                                <div class="button">
                                    <a href="{{action('User\HomeController@type_wise',['id' => $item->id, 'slug' => Str::slug($item->name)])}}">{{$item->name}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="right-side">
                <div class="division-box">
                    <div class="division">
                        <h3>city</h3>
                    </div>
                    <div class="division-name">
                        <ul>
                            @foreach ($cities as $item)
                                <li> 
                                    <a href="{{action('User\HomeController@city_wise',['id' => $item->id, 'slug' => Str::slug($item->name)])}}" class="slider-city"> <i
                                        class="fas fa-map-marker-alt"></i>{{$item->name}}
                                    </a>
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection