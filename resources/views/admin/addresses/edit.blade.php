@extends('admin.master')


@section('main-content')

<form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf
    @method('PUT')


    <div class="form-row">

        <div class="form-group col-md-6">
          <label for="city">City</label>
          <input type="text" class="form-control" id="city" placeholder="City" name="city">
        </div>
  
  
        <div class="form-group col-md-6">
          <label for="street">Street</label>
          <input type="text" class="form-control" id="street" placeholder="Street name" name="street">
        </div>  
  
    </div>


    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="zip">Zip</label>
        <input type="text" class="form-control" id="zip" placeholder="Zip code" name="zip">
      </div>

      <div class="form-group col-md-6">
        <label for="user_id">User</label>
        <select id="user_id" class="form-control" name="user_id">
            @foreach ($users as $user)
                
                <option value="{{ $user->id }}"> {{ $user->name }}</option>

            @endforeach
        </select>
      </div>


    </div>

   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Edit address</button>
   </div>


  </form>


@endsection