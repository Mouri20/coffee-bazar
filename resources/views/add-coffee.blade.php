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
                <h4>fill in the Coffee details</h4>
            </div>
            <div class="form-main">
                <form action="{{action('User\HomeController@store_coffee')}}"  method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="shop_type_id" value="{{$table->id}}">
                    <div class="shop-form">
                        <div class="shop">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                            <small>Error message</small>
                        </div>
                        <div class="shop">
                            <label for="ad">Price</label>
                            <input type="number" id="ad" name="price" value="0" min="0" required>
                            <small>Error message</small>
                        </div>
                        <div class="image-upload ">
                            <p>Add a photo</p>
                            <input type="file" id="image" name="image">
                            <small>Error message</small>
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
                        <button type="submit">Add Coffee</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
@endsection
