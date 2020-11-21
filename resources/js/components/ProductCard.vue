<template>
    <div class="col-lg-4 col-md-6 col-12">
        <div
            v-if="showAlert"
            class="alert alert-success"
            style="position: fixed; left: 50%; top: 12%; width: 50%; transform: translate(-50%, -50%); z-index: 100;"
            role="alert"
        >
            <strong>Items has been added</strong>
        </div>

        <div class="single-product app-product">
            <div class="product-img">
                <a :href="'/products/' + this.product.id">
                    <img
                        class="default-img"
                        :src="this.imageURL"
                        alt="#"
                    />
                </a>
                <div class="button-head">
                    <div class="product-action" style="right: 18%!important;">
                        <button
                            style=" border: none; background-color: white; font-size: 1.3em;"
                            type="submit"
                            @click="addProductToWishlist(product.id)"
                        >
                            <i class=" ti-heart "></i>
                        </button>
                    </div>
                    <div class="product-action-2" style="top:0!important">
                        <button
                            class="btn"
                            style="border: none; height: 100%; margin: 0;"
                            @click="emitAddToCartEvent(product)"
                        >
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
            <div class="product-content">
                <h3>
                    <a :href="'/products/' + this.product.id">
                        {{ this.product.name }}
                    </a>
                </h3>
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
        product: Object,
        wishlistId: String,
        image: String
    },
    mounted() {
        this.imageURL = this.image
            ? this.image
            : "https://via.placeholder.com/550x750";
    },
    methods: {
        emitAddToCartEvent: function(product) {
            EventBus.$emit("add-to-cart", product);
            this.showAlert = true;
            setTimeout(() => (this.showAlert = false), 1500);
        },
        addProductToWishlist(product) {
            axios
                .post(
                    `http://localhost:8000/api/wishlists/${this.wishlistId}/products`,
                    {
                        product: product
                    }
                )
                .then(res => {
                    console.log(res.data);
                    this.showAlert = true;
                    setTimeout(() => (this.showAlert = false), 1500);
                });
        }
    },
    data: function() {
        return {
            showAlert: false,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            imageURL: ""
        };
    }
};
</script>

<style></style>
