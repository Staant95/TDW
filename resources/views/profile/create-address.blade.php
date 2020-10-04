@extends('profile.master')

@section('panel-content')
    <form method="POST" action="{{ route('profile.addresses.store') }}" >
        @csrf  
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection