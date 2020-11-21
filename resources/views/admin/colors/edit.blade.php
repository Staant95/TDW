@extends('admin.master')


@section('main-content')

<h2 class="text-center mb-5">Edit color</h2>

<form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-row" style="display: flex; justify-content: center;">

        <div class="form-group col-md-6">
          <label for="name">Color name</label>
          <input type="text" class="form-control" id="name" value="{{ $color->type }}" name="type">
        </div> 
    </div>


   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Edit color</button>
   </div>


  </form>


@endsection