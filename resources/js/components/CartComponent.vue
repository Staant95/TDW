<template>
    <div>

        <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"> {{ products.length }} </span></a>
        <!-- Shopping Item -->
        <div class="shopping-item">
            <div class="dropdown-cart-header">
                <!-- \Cart::getContent()->count() -->
                <span> {{ products.length }} </span>
                <!-- change link  -->
                <a href="#">View Cart</a>
            </div>
            <ul class="shopping-list">

                <li v-for="item in products" :key="item.id">

                        <button class="remove" @click="removeItem(item.id)">
                            <i class="fa fa-remove"></i>
                        </button>

                    <a class="cart-img" href="#">
                        <img src="https://via.placeholder.com/70x70" alt="#">
                    </a>
                    <h4><a href="#">{{ item.name }}</a></h4>
                    <p class="quantity">{{ item.quantity }} - <span class="amount"> {{ item.price }} </span></p>
                </li>

            </ul>
            <div class="bottom">
                <div class="total">
                    <span>Total</span>
                    <!-- \Cart::getTotal() -->
                    <span class="total-amount"> {{ calcTotal }} $</span>
                </div>
                <!-- route('checkout') -->
                <a href="checkout.html" class="btn animate">Checkout</a>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            userId: String
        },
        mounted() {
            console.log('Daje ', this.userId);
        },
        data: function() {
            return {
                products: [
                    {
                        id: 1,
                        name: 'Nikes',
                        price: 99,
                        quantity: 2
                    },
                    {
                        id: 2,
                        name: 'Sneakers',
                        price: 120,
                        quantity: 1
                    }
                ],
                total: 0
            }

        },

        computed: {
            calcTotal: function () {

                return this.products.length > 1 ?
                this.products.reduce((acc, cur) => {
                    let temp = acc.price * acc.quantity;
                    temp += cur.price * cur.quantity
                    return temp;
                })
                :
                this.products[0].price;

            }

        },

        methods: {
            removeItem: function(productId) {
                this.products = this.products.filter(el => el.id !== productId);
            }
        }
    }
</script>

<style scoped>

</style>
