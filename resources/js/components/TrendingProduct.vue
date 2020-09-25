<template>


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


</template>

<script>
    export default {
        mounted() {
            this.getProducts(this.categoryId);
        },
        props: [
            'categoryId'
        ],
        data: function() {
            return {
                products: []
            }
        },
        methods: {
            getProducts: function(category) {
                let categoryId = parseInt(category);
                axios.get(`http://localhost:8000/api/category/${categoryId}/products`)
                .then(res => {
                    this.products = res.data;
                    console.log(this.products)
                });
            }
        },
        computed: {
            getProductsOfSelectedTab: function() {
                console.log('changed')
            }
        }
    }
</script>

<style scoped>

</style>
