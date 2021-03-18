@foreach ($table as $key => $item)
<tr>
    <td>{{$key+1}}</td>
    <td>
        @if($item->image=='default.jpg')
            <img width="50" height="40" src="{{asset('img/default.png')}}" alt="ad-image">
        @else
            <img width="50" height="40" src="{{asset('uploads/coffee/'.$item->image)}}" alt="blog-image">
        @endif
    </td>
    <td>{{$item->name}}</td>
    <td>{{$item->price}} tk</td>
</tr>
@endforeach