<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { onMounted, reactive, defineProps } from 'vue';
import axios from 'axios';

const props = defineProps({
    product: {
        type: Object,
        required: true,
    },
});

const form = reactive({
    product_code: '',
    product_name: '',
    description: '',
    price: null,
    quantity: null
});


onMounted(() => {
    form.product_code = props.product.product_code;
    form.product_name = props.product.product_name;
    form.description = props.product.description;
    form.price = props.product.price;
    form.quantity = props.product.quantity;
});


function submitForm() {
    if(confirm('ต้องการแก้ไขสินค้านี้หรือไม่')) {
        axios.put(`/products/${form.product_code}`, form)
        .then(response => {
            if (response.status === 200) {
                alert('แก้ไขสินค้าสำเร็จ');
                window.location.href = '/products'; 
        }});
    }
}

</script>

<template>
    <AppLayout title="Update">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols- md:grid-cols-1 gap-6 lg:gap-78p-6 lg:p-10 p-9"> 
                        <p class="text-2xl ...">แก้ไขสินค้า</p>
                        <div class="mt-5 text-gray-500 text-sm leading-relaxed" >
                            <form @submit.prevent="submitForm" method="post" action="/products/{product_code}" class="space-y-4">
                                <div >
                                    <label for="product_name" class="block text-sm font-medium text-gray-700">ชื่อสินค้า</label>
                                    <input v-model="form.product_name" type="text" id="product_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">รายละเอียด</label>
                                    <textarea v-model="form.description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                </div>
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">ราคา</label>
                                    <input v-model="form.price" type="number" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="quantity" class="block text-sm font-medium text-gray-700">จำนวน</label>
                                    <input v-model="form.quantity" type="number" id="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>

                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    บันทึก
                                </button>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </AppLayout>
</template>
