@extends('layouts.general')
@section('content')
<section class="dhaka-section division">
    <div class="row">
        <div class="main-division">
            <div class="item-shop">
                <div class="left-title">
                    <div class="search-area">
                        <form action="{{action('User\HomeController@search_shop')}}" method="GET">
                            <input type="text" placeholder="search here.." name="serachkey" value="{{$searchKey}}">
                            <input class="search-button" type="submit" value="search here">
                        </form>
                    </div>
                    <div class="city-name">
                        <h3>Search Result for {{$searchKey}}</h3>
                    </div>
                </div>
                <div class="left-side">
                    <div class="title">
                        <h2> Coffee Shops</h2>
                    </div>
                    <div class="category-box">
                        <div class="category-name">
                            @foreach ($table as $item)
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
            </div>
            <div class="right-side">
                <div class="division-box box-margin">
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
        {{-- <div class="pagination">
            <ul id="paginate">
                <li>
                    <a href="#" class="prev"> <span>&#8592;</span>Previous</a>
                </li>
                <li>
                    <div class="pageNumber active"><a href="#">1</a></div>
                </li>
                <li>
                    <div class="pageNumber"><a href="#">2</a></div>
                </li>
                <li>
                    <div class="pageNumber"><a href="#">3</a></div>
                </li>
                <li>
                    <div class="pageNumber"><a href="#">4</a></div>
                </li>
                <li>
                    <div class="pageNumber"><a href="#">5</a></div>
                </li>
                <li>
                    <a href="#" class="next">next <span>&#8594;</span></a>
                </li>
            </ul>
        </div> --}}
    </div>
</section>
@endsection