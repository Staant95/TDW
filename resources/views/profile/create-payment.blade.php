@extends('profile.master')

@section('panel-content')

<div class="app-tab-content">



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('profile.payments.store', ['redirect' => request('redirect')]) }}" >
        @csrf  
        <label class="mr-sm-2" for="payments">Choose your payment method</label>
        <select name="payment_id" class="custom-select" id="payments">
            @foreach ($payments as $payment)
                <option value="{{ $payment->id }}">{{ $payment->type }}</option>
            @endforeach
          </select>
        <div class="form-group mt-3">
            <label for="card_number">Card Number</label>
            <input type="text" class="form-control" id="card_number" name="card_number" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="expiration_date">Expiration date</label>
            <input type="date" class="form-control" id="expiration_date" name="expiration_date" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="security_code">Security code</label>
            <input type="text" class="form-control" id="security_code" name="security_code" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>

@endsection