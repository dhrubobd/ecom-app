<script setup>
    import { onMounted, computed } from 'vue';
    import Mainlayout from '../Layouts/Mainlayout.vue';
    import { useForm, usePage } from '@inertiajs/vue3';
    import { useToast } from 'vue-toastification';
    const props = defineProps({
        settings: Object
    });  

    const form = useForm({
        email: '',
        password: '',
    });

    const toast = useToast();
    const flash = computed(() => usePage().props.flash);
 /*
    const submitForm = () => {
        form.post(`/login`, {
            onSuccess: () => {
                //toast.success('Settings saved successfully!');
                flash.value.success && toast.success(flash.value.success || 'Login Success!');
            },
            onError: () => {
                //toast.error('Failed to save settings!');
                flash.value.error && toast.error(flash.value.error || 'Failed Login!');
            }
        });
    };
*/
const submitForm = () => {
    form.post('/login', {
        onSuccess: () => {
            flash.value.success && toast.success(flash.value.success);
            flash.value.error && toast.error(flash.value.error);
        }
    });
};
    

</script>
<template>
    <Mainlayout>
        <!-- Main Content -->
        <main class="ml-64 p-8">
            <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Brands</h2>
            <a href="/add-brand.html" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Brand</a>
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
                <tr class="border-b">
                    <td class="p-3">Samsung</td>
                    <td class="p-3"><img src="https://dummyimage.com/80x80/000/fff&text=Brand" alt="Brand Image" class="w-10 h-10 rounded-full"></td>
                    <td class="p-3 space-x-2">
                    <a href="/edit-brand.html" class="bg-yellow-500 text-white px-2 py-1 rounded-md">Edit</a>
                    <button class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</button>
                    </td>
                </tr>
                <!-- Repeat for other brands -->
                </tbody>
            </table>
            </div>
        </main>
    </Mainlayout>
</template>



<style>

</style>