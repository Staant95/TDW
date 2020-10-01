<template>
    <div class="product-area section">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Item</h2>
                    </div>
                </div>
            </div>

            <div v-if="showAlert" class="alert alert-success"
                 style="position: fixed; left: 50%; top: 12%; width: 50%; transform: translate(-50%, -50%); z-index: 100;"
                 role="alert">
                <strong>Items has been added to your cart</strong>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item" v-for="category in categories" :key="category.id" @click="updatedCurrent(category)">
                                    <a @click="getProductsOfCategory(category.id)" :class="{ active: isActive(category.id) }" class="nav-link" data-toggle="tab" :href="'#' + category.name" role="tab">{{ category.name }}</a>
                                </li>

                            </ul>
                            <!--/ End Tab Nav -->
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">

                                        <div v-for="product in products" class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <!--       CHANGE LINK      -->
                                                    <a :href="'/products/' + product.id">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head" >
                                                        <div class="product-action" style="right: 18%!important;">
                                                            <form 
                                                            :action="'/wishlists/'+parseInt(wishlistId)+'/products'" 
                                                            method="post">
                                                                <input type="hidden" name="_token" :value="csrf">
                                                                <input type="hidden"  name="product" :value="product.id"> 
                                                                <button 
                                                                style=" border: none; background-color: white; font-size: 1.3em"
                                                                type="submit"
                                                                >
                                                                    <i class=" ti-heart "></i>
                                                                    
                                                                </button>
                                                                
                                                            </form>
                                                            
                                                        </div>

                                                        <div class="product-action-2" style="top:0!important">
                                                            <button class="btn"
                                                                    style="border: none; height: 100%; margin: 0;"
                                                                    @click="emitAddToCartEvent(product)">
                                                                Add to cart
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h5>{{ product.name }}</h5>
                                                    <div class="product-price">
                                                        <span>$ {{ product.price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import { EventBus } from "../app";

    export default {
        props: {
            wishlistId: String
        },
        mounted() {
            console.log('wishlist id ' + this.wishlistId)
            this.getCategories();
        },
        methods : {
            getCategories: function() {
                axios.get('http://localhost:8000/api/categories')
                    .then(res => {
                        this.categories = res.data;
                        this.currentCategory = res.data[0];
                        this.getProductsOfCategory(this.currentCategory.id);
                    });
            },
            getProductsOfCategory: function(categoryId) {
                  axios.get(`http://localhost:8000/api/categories/${categoryId}/products`)
                  .then(res => this.products = res.data);
            },
            isActive: function(category) {
                return this.currentCategory.id === category;
            },
            updatedCurrent: function(category) {
                this.currentCategory = category
            },
            emitAddToCartEvent: function(product) {
                EventBus.$emit('add-to-cart', product);
                this.showAlert = true;
                setTimeout(() => this.showAlert = false, 1500);
            }

        },
        data: function() {
            return {
                categories: [],
                products: [],
                currentCategory: {},
                test : 5,
                showAlert: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        computed: {
            activeTab: function() {
                return this.currentCategory.id;
            }
        }
    }
</script>

<style scoped>

</style>
