<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps, reactive } from 'vue';
import axios from 'axios';

const props = defineProps({
    products: {
        type: Array,
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

function submitForm() {
    axios.post('/products', form)
    .then(response => {
        if (response.status === 200 || response.status === 201) {
            alert('เพิ่มสินค้าสำเร็จ'); 
            window.location.reload();
        }
    })
}

function deleteProduct(productId) {
    if(confirm('ต้องการลบสินค้านี้หรือไม่')) {
        axios.delete(`/products/${productId}`)
            .then(() => {
                alert('ลบสินค้าสำเร็จ');
                props.products = props.products.filter(product => product.product_code !== productId);
                window.location.reload();
            })
    }
}

function editProduct(productCode) {
    window.location.href = `/products/edit/${productCode}`;
}
</script>

<template>
    <AppLayout title="Products">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols- md:grid-cols-1 gap-6 lg:gap-78p-6 lg:p-10 p-9"> 
                        <p class="text-2xl ...">เพิ่มรายการสินค้า</p>
                        <div class="mt-5 text-gray-500 text-sm leading-relaxed" >
                            <form @submit.prevent="submitForm" class="space-y-4" method="post" action="/products">
                                <div>
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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div><p class="text-4xl p-6 m-6">แสดงรายการสินค้า</p></div>
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols- md:grid-cols-2 gap-8 lg:gap-78p-6 lg:p-10 p-9"> 
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" v-for="(product, index) in props.products" :key="index">
                            <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <strong> ลำดับ : {{ index+1 }}</strong>  <br>
                                รหัสสินค้า : {{ product.product_code }} <br>
                                ชื่อสินค้า : {{ product.product_name }} <br>
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" >
                                คำอธิบาย : {{ product.description }} <br>
                                ราคา : {{ product.price }} <br>
                                จำนวน : {{ product.quantity }} <br>
                            </p>
                            <div class="space-x-4">
                            <button @click="deleteProduct(product.product_code)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                ลบ 
                            </button>
                            <button @click="editProduct(product.product_code)" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                แก้ไข
                            </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </AppLayout>
</template>
