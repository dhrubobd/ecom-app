<script setup>
    import Mainlayout from './Layouts/Mainlayout.vue';
    const props = defineProps({
        totalProducts: Number,
        totalRevenue: Number,
        totalOrders: Number,
    });
</script>
<template>
    <Mainlayout>
        <main class="ml-64 p-8">
            <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow-md p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Total Products</h3>
                <p class="text-3xl text-blue-500">{{ totalProducts }}</p>
                </div>
                <div class="bg-white shadow-md p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Total Orders</h3>
                <p class="text-3xl text-green-500">{{ totalOrders }}</p>
                </div>
                <div class="bg-white shadow-md p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Total Revenue</h3>
                <p class="text-3xl text-red-500">${{ totalRevenue }}</p>
                </div>
            </div>
        </main>
    </Mainlayout>
</template>



<style>

</style>