@extends('admin.master')

@section('main-content')

<h2 class="text-center mb-5">Create a Product</h2>

  <form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf

    <div class="form-row">

        <div class="form-group col-md-6">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
  
  
        <div class="form-group col-md-6">
          <label for="price">Price</label>
          <input type="text" class="form-control" id="price" placeholder="Price" name="price">
        </div>  

  
    </div>

    <div class="form-row"> 

      <div class="form-group col-md-6">
        <div>

          <label for="colors">Select one or more colors</label>
  
          <select id="colors" class="custom-select form-control" size="5" multiple name="colors[]">
            <option value="" selected>Please choose one or more colors</option>
            @foreach ($colors as $color)
              <option value="{{ $color->id }}">{{ $color->type }}</option>
            @endforeach
  
          </select>
        </div>

      </div>


      <div class="form-group col-md-6">
        <label for="sizes">Select one or more sizes</label>
        <select id="sizes" class="custom-select form-control" size="5" multiple name="sizes[]">
            <option value="" selected>Please choose one or more sizes</option>
          @foreach ($sizes as $size)
            <option value="{{ $size->id }}">{{ $size->size }}</option>
          @endforeach


        </select>
      </div>
      
      

    </div>

   

    <div class="form-row">

      <div class="form-group col-md-12">
        <label for="description">Description</label>
        <textarea class="form-control rounded-0" id="description" rows="5" name="description"></textarea>
      </div>

    </div>



    {{-- colors and sizes --}}

    {{-- <div class="form-row">

      <div class="form-group col-md-4">
        <label for="role">Role</label>
        <select id="role" class="form-control" name="role" multiple>
            @foreach ($roles as $role)
                
                <option value="{{ $role->id }}"> {{ $role->name }}</option>

            @endforeach
        </select>
      </div>
     
    </div> --}}


   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Create product</button>
   </div>


  </form>




@endsection