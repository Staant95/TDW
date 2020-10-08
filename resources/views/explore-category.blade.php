@extends('layouts.master')

@section('title', 'Explore')


@section('content')



<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
    

            <div class="col-lg-12 col-md-8 col-12">


                <div class="row">
                    <div class="col-12">
                       
                        <div class="shop-top">
                            <div class="shop-shorter">

                             <div class="single-shorter">
                               

                                    <form class="form-inline" action="{{ route('category.sort', ['category' => request('category')]) }}" method="post">
                                        @csrf

                                        <label class="my-1 mr-2" for="filter">Sort by: </label>

                                        <select onchange="this.form.submit()" name="filterType" class="custom-select my-1 mr-sm-2" id="filter">
                                            <option 
                                            value="default" {{ old("filterType") == "default" ? 'selected' : '' }}> 
                                            Choose option
                                            </option>

                                            <option value="price" {{ old("filterType") == "price" ? 'selected' : '' }}>
                                                Price
                                            </option>

                                            <option value="name" {{ old("filterType") == "name" ? 'selected' : '' }}> 
                                                Name
                                            </option>

                                        </select>

                                    </form>

                                </div>


                            </div>                            
                        </div>
                        
                    </div>
                </div>



                <div class="row" id="productCard">
                    @foreach ($products as $product)
 

                    <product-card
                        wishlist-id={{ Auth::user()->wishlist->id }}
                        :product="{{ $product }} "
                        image={{$product->images->first()}}
                    >

                    </product-card>


                    @endforeach
                    

                </div>
            </div>
        </div>
    </div>
</section>




@endsection