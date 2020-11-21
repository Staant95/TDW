@extends('admin.master')

@section('main-content')

<h2 class="text-center mb-5">Create a role</h2>

  <form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf

    <div class="form-row">

        <div class="form-group col-md-12">
          <label for="role">Role name</label>
          <input type="text" class="form-control" id="role" placeholder="Role" name="name">
        </div>

       
  
    </div>


    <div class="form-row" >
      <div class="form-group col-md-6">
        <label for="permission">Select one or more permissions for this role</label>
        <select id="permission" class="form-control" size="8" name="permissions[]" multiple>
            @foreach ($permissions as $permission)
                
                <option value="{{ $permission->id }}"> {{ $permission->action }}</option>

            @endforeach
        </select>
      </div>


      <div class="form-group col-md-6">
        <label for="description">Description</label>
        <textarea class="form-control rounded-0" id="description" rows="6" name="description"></textarea>
      </div>
    </div>






   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Create role</button>
   </div>


  </form>




@endsection