<script setup>
import { defineProps, ref, computed, reactive, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Mainlayout from '../Layouts/Mainlayout.vue';
import { useToast } from 'vue-toastification';

const toast = useToast();
const flash = computed(() => usePage().props.flash);

const images = reactive({
    image: null,
    img1: null,
    img2: null,
    img3: null,
    img4: null,
});

const props = defineProps({
    categories: Array,
    brands: Array,
    product: Object,
});

const form = useForm({
    title: '',
    short_des: '',
    price: '',
    discount_price: '',
    is_discount: 0,
    image: null,
    in_stock: 1,
    stock: '',
    remark: 'regular',
    category: '',
    brand: '',
    img1: null,
    img2: null,
    img3: null,
    img4: null,
    description: '',
    color: '',
    size: '',
    '_method': 'PUT',
});

const handleImageChange = (event, field) => {
    const file = event.target.files[0];
    if (file) {
        form[field] = file;
        images[field] = URL.createObjectURL(file);
    }
}

const submitForm = () => {
    form.post(`/products/${props.product.id}`, {
        onSuccess: () => {
            flash.value.success && toast.success(flash.value.success);
            flash.value.error && toast.error(flash.value.error);
        },
    });
}


onMounted(() => {
    if (props.product) {
        form.title = props.product.title;
        form.short_des = props.product.short_des;
        form.price = props.product.price;
        form.discount_price = props.product.discount_price;
        form.is_discount = props.product.is_discount;
        form.in_stock = props.product.in_stock;
        form.stock = props.product.stock;
        form.remark = props.product.remark;
        form.category = props.product.category_id;
        form.brand = props.product.brand_id;
        form.description = props.product.details.description;
        form.color = props.product.details.color;
        form.size = props.product.details.size;
        images.image = props.product.image;
        images.img1 = props.product.details.img1;
        images.img2 = props.product.details.img2;
        images.img3 = props.product.details.img3;
        images.img4 = props.product.details.img4;
    }
});

</script>
<template>
    <Mainlayout>
        <div class="flex ">
            <main class="ml-64 p-8">
                <h2 class="text-2xl font-bold mb-6">Update Product</h2>
                <form class="bg-white shadow-md rounded-lg p-6" @submit.prevent="submitForm">
                    <!-- Product Details -->
                    <div class="mb-4">
                        <label for="product-title" class="block text-gray-700 font-bold mb-2">Product Title</label>
                        <input type="text" id="product-title" class="w-full p-2 border rounded-md"
                            placeholder="Enter product title" v-model="form.title" required>
                    </div>
                    <div class="mb-4">
                        <label for="short-description" class="block text-gray-700 font-bold mb-2">Short
                            Description</label>
                        <textarea id="short-description" class="w-full p-2 border rounded-md" rows="2"
                            placeholder="Enter short description (max 500 characters)" maxlength="500"
                            v-model="form.short_des" required></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                            <input type="number" step="0.01" id="price" class="w-full p-2 border rounded-md"
                                placeholder="Enter price" v-model="form.price" required>
                        </div>
                        <div>
                            <label for="discount-price" class="block text-gray-700 font-bold mb-2">Discount
                                Price</label>
                            <input type="number" step="0.01" id="discount-price" class="w-full p-2 border rounded-md"
                                placeholder="Enter discount price (optional)" v-model="form.discount_price">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="is-discount" class="block text-gray-700 font-bold mb-2">Is Discounted?</label>
                        <select id="is-discount" class="w-full p-2 border rounded-md" v-model="form.is_discount">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Main Image</label>
                        <input type="file" id="image" class="w-full p-2 border rounded-md" @change="event => handleImageChange(event, 'image')">
                        <div v-if="images.image != null">
                            <img :src="images.image" alt="Main Image" class="w-20 h-20 rounded-md">
                        </div>
                        <div v-else>
                            <img src="https://placehold.co/100x100?text=Product+Image" alt="Main Image" class="w-20 h-20 rounded-md">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="in-stock" class="block text-gray-700 font-bold mb-2">In Stock?</label>
                            <select id="in-stock" class="w-full p-2 border rounded-md" v-model="form.in_stock">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div>
                            <label for="stock" class="block text-gray-700 font-bold mb-2">Stock Quantity</label>
                            <input type="number" id="stock" class="w-full p-2 border rounded-md"
                                placeholder="Enter stock quantity" min="0" v-model="form.stock">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="remark" class="block text-gray-700 font-bold mb-2">Remark</label>
                        <select id="remark" class="w-full p-2 border rounded-md" v-model="form.remark">
                            <option value="regular">Regular</option>
                            <option value="popular">Popular</option>
                            <option value="new">New</option>
                            <option value="top">Top</option>
                            <option value="special">Special</option>
                            <option value="trending">Trending</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="category" class="block text-gray-700 font-bold mb-2">Category</label>
                            <select id="category" class="w-full p-2 border rounded-md" v-model="form.category">
                                <option value="">Select Category</option>
                                <option v-for="(category, index) in props.categories" :key="index" :value="category.id">{{ category.name }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="brand" class="block text-gray-700 font-bold mb-2">Brand</label>
                            <select id="brand" class="w-full p-2 border rounded-md" v-model="form.brand">
                                <option value="">Select Brand</option>
                                <option v-for="(brand, index) in props.brands" :key="index" :value="brand.id">{{ brand.name }}</option>
                            </select>
                        </div>
                    </div>

                    <!-- Product Details Section -->
                    <h3 class="text-xl font-bold mb-4">Product Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="img1" class="block text-gray-700 font-bold mb-2">Image 1</label>
                            <input type="file" id="img1" class="w-full p-2 border rounded-md" @change="event => handleImageChange(event, 'img1')">
                            <div v-if="images.img1 != null">
                                <img :src="images.img1" alt="Image 1" class="w-20 h-20 rounded-md">
                            </div>
                            <div v-else>
                                <img src="https://placehold.co/100x100?text=Image+1" alt="Image 1" class="w-20 h-20 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="img2" class="block text-gray-700 font-bold mb-2">Image 2</label>
                            <input type="file" id="img2" class="w-full p-2 border rounded-md" @change="event => handleImageChange(event, 'img2')">
                            <div v-if="images.img2 != null">
                                <img :src="images.img2" alt="Image 2" class="w-20 h-20 rounded-md">
                            </div>
                            <div v-else>
                                <img src="https://placehold.co/100x100?text=Image+2" alt="Image 2" class="w-20 h-20 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="img3" class="block text-gray-700 font-bold mb-2">Image 3</label>
                            <input type="file" id="img3" class="w-full p-2 border rounded-md" @change="event => handleImageChange(event, 'img3')">
                            <div v-if="images.img3 != null">  
                                <img :src="images.img3" alt="Image 3" class="w-20 h-20 rounded-md">
                            </div>
                            <div v-else>
                                <img src="https://placehold.co/100x100?text=Image+3" alt="Image 3" class="w-20 h-20 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="img4" class="block text-gray-700 font-bold mb-2">Image 4</label>
                            <input type="file" id="img4" class="w-full p-2 border rounded-md" @change="event => handleImageChange(event, 'img4')">
                            <div v-if="images.img4 != null">
                                <img :src="images.img4" alt="Image 4" class="w-20 h-20 rounded-md">
                            </div>
                            <div v-else>
                                <img src="https://placehold.co/100x100?text=Image+4" alt="Image 4" class="w-20 h-20 rounded-md">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Full Description</label>
                        <textarea id="description" class="w-full p-2 border rounded-md" rows="6"
                            placeholder="Enter full description" v-model="form.description"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="color" class="block text-gray-700 font-bold mb-2">Color</label>
                            <input type="text" id="color" class="w-full p-2 border rounded-md"
                                placeholder="Enter color" v-model="form.color">
                        </div>
                        <div>
                            <label for="size" class="block text-gray-700 font-bold mb-2">Size</label>
                            <input type="text" id="size" class="w-full p-2 border rounded-md" placeholder="Enter size" v-model="form.size">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md cursor-pointer">Update Product</button>
                </form>
            </main>
        </div>
    </Mainlayout>
</template>

<style></style>