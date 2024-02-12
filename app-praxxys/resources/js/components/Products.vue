<style>
table td {
    font-weight: bold;

}

table th {
    font-size: large;
}
</style>
<template>
    
    <div>
        
        <table class="table table-hover table-sm table-responsive table-striped table-borderless" >

            <thead>
                <tr class="text-center table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Product Image</th>
                    <th>Date and Time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody class="searchable tbody text-center ">
                <tr v-for="product in products.data" class="table-dark">
                    <!--@foreach($products as $product)--> <!--from controller-->

                    <td>{{ product.id }}</td>
                    <td>{{ product.Name }}</td>
                    <td>{{ product.Category }}</td>
                    <td>{{ product.Description }}</td>
                    <td><img :src="product.Image" width="200" height="112" /></td>
                    <td>{{ product.Date_and_Time }}</td>
                    <td>
                        <!--'product' is the parameter passed in url-->
                        <!-- <a href="{{route('product.edit',['product'=>product])}}">Edit</a> -->
                        <a :href="`/product/${product.id}/edit`"><button class="btn btn-primary">Edit</button></a>
                    </td>

                    <td>
                        <!-- <form method="post" :action="`/product/${product.id}/delete`">
                                    <input type="submit" value="DELETE"/>
                                </form> -->
                        <!-- <a :href="`/product/${product.id}/edit`">Edit</a> -->
                        <button @click="deleteProduct(product.id)" class="btn btn-primary">DELETE</button>
                    </td>

                    <!-- @endforeach -->
                </tr>

            </tbody>

        </table>
        
        <div class="button-group" style="padding-left:5px; padding-bottom:5px;">
            <button style="margin-right:5px;" class="btn btn-outline-light" v-for="page in pages" :key="page" @click="getProducts(page, this.selectedCategory)" href="#">{{ page
            }}</button>
        </div>
        <div style="position:relative;">
            <div class="input-group" style="width:30%;position:absolute;left:0;padding-top:5px;">
                <span class="input-group-text" id="basic-addon1">Search</span>
                <input type="text" placeholder="Search" v-model="search" class="form-control">
            </div>

            <div style="width:20%;position:absolute;padding-top:5px; right:0;">
                <select name="category" id="category" v-model="selectedCategory" class="form-select form-select-sm"
                    aria-label="Category">
                    <option value="none">No Filter</option>
                    <option value="fruit">Fruit</option>
                    <option value="vegetable">Vegetable</option>
                    <option value="pork">Pork</option>
                    <option value="beef">Beef</option>
                    <option value="chicken">Chicken</option>
                    <option value="others">Others</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { ref } from 'vue'



export default {
    data() {
        return {
            products: {},
            pages: [],
            currentPage: 1,
            selectedCategory: 'none',
            search: ''
        }
    },
    watch: {
        selectedCategory(newCategory, oldCategory) {
            if (oldCategory != this.selectedCategory) {
                this.selectedCategory = newCategory;
                this.getProducts(this.currentPage, this.selectedCategory);
            }
        },
        search(newText, oldText) {
            if (newText != '') {
                this.getProducts(this.currentPage, this.selectedCategory, this.search);
            }
            else if (newText == '') {
                this.search = undefined;
            }
        }
    },
    methods: {
        getProducts(page, category = 'none', search) {

            //if No Filter option is selected, dont put category params in url
            let url = `/api/products?page=${page}`;

            if (category != 'none') {
                //url += `?category=${category}`
                url = `/api/products?category=${this.selectedCategory}&page=${page}`;
                //console.log(category);
            }
            if (search != undefined) {
                url += `&search=${search}`
                //console.log(search);
            }
            axios.get(url).then((response) => {

                this.products = response.data;
                //filter out the links with label that isnt a number (for pages)
                this.pages = response.data.links
                    .filter(link => Number.isInteger(Number(link.label)))
                    .map(link => link.label);
                this.currentPage = response.data.currentPage;
                console.log(url);
            })
        },
        deleteProduct(productId) {

            axios.post(`/product/${productId}/delete`)
                .then(() => {
                    this.getProducts();
                })
                .catch((error) => {
                    console.error('Error deleting product:', error);
                });


        }
    },
    mounted() {
        this.getProducts(this.currentPage)
    }
}
</script>