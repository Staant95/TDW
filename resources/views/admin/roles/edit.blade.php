@extends('admin.master')


@section('main-content')

<form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-row">

        <div class="form-group col-md-6">
          <label for="name">Role name</label>
          <input type="text" class="form-control" id="name" value="{{ $role->name }}" name="name">
        </div>  
  
    </div>




    <div class="form-row">

      <div class="form-group col-md-4">
        <label for="permission">Permissions</label>
        <select id="permission" class="form-control" name="permissions[]" multiple size="8">
            @foreach ($permissions as $permission)
                
                <option value="{{ $permission->id }}"> {{ $permission->action }}</option>

            @endforeach
        </select>
      </div>
     
    </div>


   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Edit role</button>
   </div>


  </form>


@endsection