@extends('admin.master')

@section('main-content')

<h2 class="text-center mb-5">Create an order</h2>

  <form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf

    <div class="form-row">


      <div class="form-group col-md-4">
        <label for="user">User</label>
        <select id="user" class="form-control" name="user">
            @foreach ($users as $user)
                
                <option value="{{ $user->id }}"> {{ $user->name }}</option>

            @endforeach
        </select>
      </div>
  
  
  
    </div>




    <div class="form-row">

      {{-- <div class="form-group col-md-4">
        <label for="role">Role</label>
        <select id="role" class="form-control" name="role">
            @foreach ($roles as $role)
                
                <option value="{{ $role->id }}"> {{ $role->name }}</option>

            @endforeach
        </select>
      </div> --}}
     
    </div>


   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Create order</button>
   </div>


  </form>




@endsection