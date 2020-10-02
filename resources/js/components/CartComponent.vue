<template>
    <div>

        <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"> {{ products.length }} </span></a>
        <!-- Shopping Item -->
        <div class="shopping-item">
            <div class="dropdown-cart-header">
                <!-- \Cart::getContent()->count() -->
                <span> {{ products.length }} </span>
                <!-- change link  -->
                <a :href="'/carts/'+parseInt(this.cartId)+'/products'">View Cart</a>
            </div>
            <ul class="shopping-list">

                <li v-for="item in products" :key="item.id">

                       <input type="hidden" name="_token" :value="csrf">

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
                    <span class="total-amount"> {{ totalCart }} $</span>
                </div>
                <!-- route('checkout') -->
                <a href="checkout.html" class="btn animate">Checkout</a>
            </div>
        </div>

    </div>
</template>

<script>
    import { EventBus } from '../app';
    export default {
        props: {
            userId: String,
            cartId: String
        },
        mounted() {
            console.log(this.userId);
            axios.get(`http://127.0.0.1:8000/api/users/${this.userId}/cart`)
            .then(res => {
                res.data.forEach(el => this.products.push((({id, name, price, pivot: {quantity}}) => ({id, name, price, quantity}))(el)))
            }).catch(error => console.log(error.message));

        },
        data: function() {
            return {
                products: [
                ],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }

        },
        computed: {
            totalCart: function() {
                let sum = 0;
                if(this.products.length === 0) return 0;

                if(this.products.length > 1) {
                    this.products.forEach(el => sum += el.quantity * el.price)
                } else {
                    sum = this.products[0].price;
                }
                sum = parseFloat(sum).toFixed(2);
                return sum;
            }
        },

        methods: {
            removeItem: function(productId) {
                axios.delete(`http://127.0.0.1:8000/api/users/${this.userId}/cart/${productId}`)
                .then(res => {
                    this.products = [];
                    res.data.forEach(el => this.products.push((({id, name, price, pivot: {quantity}}) => ({id, name, price, quantity}))(el)))
                });
            },
            addItem: function(productId) {
                console.log(`Product id being added: ${productId.id}`)
                axios.post(`http://localhost:8000/api/users/${this.userId}/cart/`, {
                    'product_id' : productId.id
                })
                .then(res => {
                    this.products = [];
                    res.data.forEach(el => this.products.push((({id, name, price, pivot: {quantity}}) => ({id, name, price, quantity}))(el)))
                })
                .catch(err => console.log(`error in adding item ${err}`));
            }
        },
        created: function() {
            EventBus.$on('add-to-cart', data => {
                let {id, name, price} = data;
                let product = {id, name, price, quantity: 1};

                let index = this.products.findIndex(el => el.id === data.id);

                if(index !== -1) {
                    this.products[index].quantity = this.products[index].quantity + 1;
                }
                else {
                    this.addItem(product);
                    this.products.push(product);
                }
            })
        }
    }
</script>

<style scoped>

</style>
