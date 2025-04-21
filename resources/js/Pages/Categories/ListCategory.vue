<script setup>
import { onMounted, computed } from 'vue';
import Mainlayout from '../Layouts/Mainlayout.vue';
import { Link, router, useForm, usePage } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();
const flash = computed(() => usePage().props.flash);

const props = defineProps({
    categories: Object
});

const deleteBrand = (id) => {
    if (confirm('Are you sure, you want to delete this ?')) {
        router.delete(`/categories/${id}`, {
            onSuccess: () => {
                flash.value.success && toast.success(flash.value.success);
                flash.value.error && toast.error(flash.value.error);
            },
            onError: () => {
                toast.error('Failed to delete Category. Please try again.');
            }
        });
    }
};

</script>

<template>
    <Mainlayout>
        <!-- Main Content -->
        <main class="ml-64 p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Categories</h2>
                <Link href="/categories/create" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Categorie</Link>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Image</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b" v-for="(category, index) in categories" :key="index">
                        <td class="p-3">{{ category.name }}</td>
                            
                        <td class="p-3">
                            <div v-if="category.image != ''">
                                <img :src="category.image" alt="Categorie Image" class="w-10 h-10 rounded-full">
                            </div>
                            <div v-else>
                                <img src="https://dummyimage.com/80x80/000/fff&text=category" alt="Categorie Image" class="w-10 h-10 rounded-full">
                            </div>
                        </td>
                        <td class="p-3 space-x-2">
                        <Link :href="`/categories/${category.id}/edit`" class="bg-yellow-500 text-white px-2 py-1 rounded-md cursor-pointer">Edit</Link>
                        <button @click="deleteBrand(category.id)" class="bg-red-500 text-white px-2 py-1 rounded-md cursor-pointer">Delete</button>
                        </td>
                    </tr>
                    <!-- Repeat for other Category -->
                    </tbody>
                </table>
            </div>
        </main>
    </Mainlayout>
</template>

<style></style>