<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function index() {
        return view('profile.payments')
        ->with(['payments' => Auth::user()->payments]);
    }

    public function store(Request $request) {
        $request->validate([
            'payment_id' => 'required|max:255',
            'card_number' => 'required|max:32',
            'expiration_date' => 'required|date',
            'security_code' => 'required|max:3',
        ]);
        
        
        $expiration = Carbon::createFromFormat('Y-m-d', $request->input('expiration_date'))->toFormattedDateString();
        
        $user = Auth::user();
        $payment = $request->input('payment_id');

        $user->payments()->attach($payment, [
            'card_number' => $request->input('card_number'),
            'expiration_date' => $expiration,
            'security_code' => $request->input('security_code')
        ]);

        if($request->has('redirect')) return redirect()->route('checkout.index');
        
        return redirect()->route('profile.payments.index');
    }

    public function create(){
        return view('profile.create-payment')
        ->with(['payments' => Payment::all()]);
    }

    public function destroy(Payment $payment) {
        $user = Auth::user();
        $user->payments()->detach($payment);
        return redirect()->route('profile.payments.index');
    }
}
