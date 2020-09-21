<template>
    <div>
        <button @click="emitProductAdd">Emit</button>
    </div>
</template>

<script>
    import { EventBus } from '../app'
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function() {
            return {
                product: {
                    id: 3,
                    name: 'Pantaloni',
                    price: 55
                }
            }
        },
        methods: {
            emitProductAdd: function() {
                EventBus.$emit('add-to-cart', this.product);
                console.log("event send");
            }
        }
    }
</script>

<style scoped>

</style>
