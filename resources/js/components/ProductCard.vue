<template>

<div class="col-lg-4 col-md-6 col-12" >

    <div v-if="showAlert" class="alert alert-success"
            style="position: fixed; left: 50%; top: 12%; width: 50%; transform: translate(-50%, -50%); z-index: 100;"
            role="alert">
        <strong>Items has been added</strong>
    </div>

    <div class="single-product app-product">
        <div class="product-img">
            <a :href="'/products/' + this.product.id ">
                <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
            </a>
            <div class="button-head">
                <div class="product-action">
                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                </div>
                <div class="product-action-2">
                    <a title="Add to cart" href="#">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="product-content">
            <h3><a href="product-details.html"> {{ this.product.name }} </a></h3>
            <div class="product-price">
                <span> {{ this.product.price }} </span>
            </div>
        </div>
    </div>

</div>
  
</template>

<script>
import { EventBus } from "../app";

    export default {
        props: {
            product: Object
        },
        mounted() {
            
        },
        methods : {            
            emitAddToCartEvent: function(product) {
                EventBus.$emit('add-to-cart', product);
                this.showAlert = true;
                setTimeout(() => this.showAlert = false, 1500);
            }

        },
       data: function() {
            return {
                showAlert: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        
    }
</script>

<style>

</style>