@extends('layouts.master')

@section('title', 'test')

@section('content')

    <div class="input-group">
        <div class="input-group-prepend custom">
            <div class="input-group-text p-0" style="border: none">

                <select class="custom-select" style="border: none;">
                    <option selected>All Categories</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

            </div>
        </div>
        <input type="text" class="form-control p-0" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">

        <div class="input-group-append p-0" style="border: none">

            <button class="input-group-text">
                <i class="fas fa-search"></i>
            </button>
        </div>

    </div>

@endsection

