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
                    <!-- DELETE /cart/$item->id, CHANGE THE ACTION-->
                    <form method="POST" action="/cart/1">
<!--                        @csrf-->
<!--                        @method('delete')-->
                        <button class="remove" type="submit">
                            <i class="fa fa-remove"></i>
                        </button>

                    </form>

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
                    <span class="total-amount"> {{ total }} $</span>
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
                        price: 99.00,
                        quantity: 1
                    }
                ]
            }
        },

        computed: {
            total: function () {
                // return this.producs.reduce((acc, curr) => acc.price + curr.price);
                return 99;
            }

        }
    }
</script>

<style scoped>

</style>
