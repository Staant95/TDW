@extends('admin.master')


@section('main-content')

<form id="create-form" style="width: 50%; margin: 0 auto;" action="{{ $url }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-row">  
       

        <div class="form-group col-md-12">
          <label for="address_id">User Address</label>
          <select id="address_id" class="form-control" name="address_id">
              @foreach ($addresses as $address)
                  
                  <option value="{{ $address->id }}"> {{ $address->street }}, {{ $address->city }}, {{ $address->zip }}</option>
  
              @endforeach
          </select>
        </div>
  
    </div>


    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="code">Order Code</label>
        <input type="code" class="form-control" id="code" name="code" value="{{ $order->code }}">
      </div>


      <div class="form-group col-md-6">
        <label for="expected ">Expected date of delivery</label>
        <input type="date" class="form-control" id="expected" value="{{ $order->expected }}" name="expected">
      </div>

    </div>

   


{{-- 
    <div class="form-row">

      <div class="form-group col-md-4">
        <label for="role_id">Role</label>
        <select id="role_id" class="form-control" name="role_id">
            @foreach ($roles as $role)
                
                <option value="{{ $role->id }}"> {{ $role->name }}</option>

            @endforeach
        </select>
      </div>
     
    </div> --}}


   <div class="mt-5" style="display: flex; justify-content: center">
       <button type="submit" 
       style="background-color: #28a745; border: 1px solid #28a745; border-radius: 5%; color: white; padding: 1em">
       Edit user</button>
   </div>


  </form>


@endsection