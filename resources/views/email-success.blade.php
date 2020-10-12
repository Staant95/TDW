@extends('layouts.master')

@section('title', 'Email sent')

@section('content')

<section class="mail-success section page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="mail-inner">
                    <h2><span>Sent</span> Successfully</h2>
                    <p>Thank you so much for your message. We check e-mail frequently and will try our best to respond to your inquiry.</p>
                    <div class="button">
                        <a class="btn primary" href="{{ route('home.index') }}">Go Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection