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
                                    <a :class="{ active: isActive(category.id) }" class="nav-link" data-toggle="tab" :href="'#' + category.name" role="tab">{{ category.name }}</a>
                                </li>

                            </ul>
                            <!--/ End Tab Nav -->
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-single">
                                <div class="row">
                                    <!-- iterate here -->
<!--                                    <div  class="tab-pane fade show active" :id="category.name" role="tabpanel">-->
<!--                                            <trending-product v-bind:category-id="category.id"></trending-product>-->
<!--                                    </div>-->
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
    import TrendingProduct from "./TrendingProduct";
    export default {
        mounted() {
            console.log('Hello world');
            this.getCategories();

        },
        components: {
            'trending-product' : TrendingProduct,
        },
        methods : {
            getCategories: function() {
                axios.get('http://localhost:8000/api/categories')
                    .then(res => {
                        this.categories = res.data;
                        this.currentCategory = res.data[0];
                    });
            },
            isActive: function(category) {
                return this.currentCategory.id === category;
            },
            updatedCurrent: function(category) {
                this.currentCategory = category
            }

        },
        data: function() {
            return {
                categories: [],
                products: [],
                currentCategory: {},
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
