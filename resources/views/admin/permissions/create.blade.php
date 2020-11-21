@extends('admin.master')

@section('main-content')

<h2 class="text-center mb-5">Create a permission</h2>

  <form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf

    <div class="form-row" style="display: flex; justify-content: center">

        <div class="form-group col-md-6">
          <label for="action">Define an action</label>
          <input type="text" class="form-control" id="action" placeholder="Action" name="action">
        </div>
  
    </div>



   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Create permission</button>
   </div>


  </form>




@endsection