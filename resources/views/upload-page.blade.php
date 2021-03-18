@extends('layouts.general')
@section('content')
<section class="upload-section">
    <div class="row">
        <div class="form">
            <div class="form-title">
                @if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
                <h4>fill in the Coffee shop details</h4>
            </div>
            <div class="form-main">
                <form action="{{action('User\AdController@store_ad')}}"  method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="shop-form">
                        <div class="shop">
                            <label for="name">Shop name</label>
                            <input type="text" id="name" name="name" required>
                            <small>Error message</small>
                        </div>
                        <div class="shop">
                            <label for="ad">Shop address</label>
                            <input type="text" id="ad" name="address" required>
                            <small>Error message</small>
                        </div>

                        <div class="shop">
                            <label for="contactNo">Contact No</label>
                            <input type="text" id="contactNo" name="contactNo" required>
                            <small>Error message</small>
                        </div>

                        <div class="shop">
                            <label for="website">Website (optional)</label>
                            <input type="text" id="website" name="website">
                            <small>Error message</small>
                        </div>

                        <div class="shop">
                            <label for="avilability">Availablity</label>
                            <input type="text" id="avilability" name="avilability">
                            <small>Error message</small>
                        </div>

                        <div class="image-upload ">
                            <p>add a upload photo</p>
                            <input type="file" id="image" name="image">
                            <small>Error message</small>
                        </div>
                        <div class="select-division">
                            <p>Your city</p>
                            <select name="city_id">
                                @foreach ($cities as $item)
                                    <option value="{{$item->id}}"> {{$item->name}}</option>
                                @endforeach
                                
                            </select>      
                        </div>

                        <div class="description">
                            <div class="label">
                                <label for="description">Description</label>
                            </div>
                            <textarea name="description" id="description" name="description"></textarea>
                            <small>Error message</small>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit">Add Coffee Shop</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
@endsection
