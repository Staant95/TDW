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

                                <li class="nav-item" v-for="category in categories" :key="category.id" @click="setCurrent(category.name)">
                                    <a v-bind:class="{ active: activeTab(category.name)}" class="nav-link" data-toggle="tab" :href="'#' + category.name" role="tab">{{ category.name }}</a>
                                </li>
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <!--  Iterate over all tab panes and put some products   -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        <!-- iterate here -->
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">

                                            <div class="single-product">
                                                <div class="product-img">
                                                    <!-- change href-->
                                                    <a href="product-details.html">
                                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                        </div>
                                                        <div class="btn">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Women Hot Collection</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Hello world');
            this.getCategories();

        },
        methods : {
            getCategories: function() {
                axios.get('http://localhost:8000/api/categories')
                .then(res => {
                    this.categories = res.data;
                    // this.current = this.categories[0];
                    this.setCurrent(this.categories[0]);
                });
            },
            setCurrent: function(category) {
                this.current = category;
                console.log(this.current);
            },
            activeTab: function(category) {
                return this.current === category;
            }
        },
        data: function() {
            return {
                categories: [],
                products: [],
                current: '',
            }
        },
        computed: {

        }
    }
</script>

<style scoped>

</style>
