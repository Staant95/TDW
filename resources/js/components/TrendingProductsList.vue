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
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" @click="emitAddToCartEvent(product)">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">{{ product.name }}</a></h3>
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
        mounted() {

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
            }

        },
        data: function() {
            return {
                categories: [],
                products: [],
                currentCategory: {},
                test : 5,
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
