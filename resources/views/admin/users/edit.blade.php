@extends('admin.master')


@section('main-content')

<form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-row">

        <div class="form-group col-md-6">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name">
        </div>
  
  
        <div class="form-group col-md-6">
          <label for="lastname">Lastname</label>
          <input type="text" class="form-control" id="lastname" value="{{ $user->lastname }}" name="lastname">
        </div>  
  
    </div>


    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
      </div>

      <div class="form-group col-md-4">
        <label for="role_id">Role</label>
        <select id="role_id" class="form-control" name="role_id">
            @foreach ($roles as $role)
                
                <option value="{{ $role->id }}"> {{ $role->name }}</option>

            @endforeach
        </select>
      </div>


    </div>





   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Edit user</button>
   </div>


  </form>


@endsection