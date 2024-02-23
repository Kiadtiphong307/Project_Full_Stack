<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout title="Cart">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cart</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg " >
                    <div><p class="text-4xl p-6 m-6">แสดงรายการสินค้า</p></div>
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols- md:grid-cols-2 gap-8 lg:gap-78p-6 lg:p-10 p-9 " > 
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </AppLayout>
</template>
