<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps } from 'vue';

const props = defineProps({
    customers: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <AppLayout title="Customers">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Customers
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols- md:grid-cols-1 gap-6 lg:gap-78p-6 lg:p-10 p-9"> 
                        <p class="text-2xl ...">แสดงรายการสินค้า</p>
                        <div class="mt-5 text-gray-500 text-sm leading-relaxed" v-for=" (customer,index ) in customers" :key="index"><h6></h6>
                        <strong>ลำดับ : {{ index+1 }}</strong>  <br>
                        <strong>
                            รหัสประจำตัว : {{ customer.person_code }} <br>
                            ชื่อ : {{ customer.first_name }} <br>
                            นามสกุล : {{ customer.last_name }} <br>
                            เพศ : {{ customer.gender }} <br>
                            อายุ : {{ customer.age }} <br>
                            วันเกิด : {{ customer.birthday }} <br>
                            ที่อยู่ : {{ customer.address }} <br>
                            อาชีพ : {{ customer.job }} <br>
                            อีเมล : {{ customer.email }} <br>
                            เบอร์โทร : {{ customer.phone }} <br>
                        </strong> 
        
                        รหัสลูกค้า : {{ customer.customers_code }} <br>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
