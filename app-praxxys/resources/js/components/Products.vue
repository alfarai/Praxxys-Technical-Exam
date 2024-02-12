
<template>
    <div>
        <div>
            <input type="text" placeholder="Search" v-model="search">
        </div>
        <table border="2" class="table">

            <thead>
                <tr>
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

            <tbody class="searchable tbody">
                <tr v-for="product in products.data">
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
                        <a :href="`/product/${product.id}/edit`">Edit</a>
                    </td>

                    <td>
                        <!-- <form method="post" :action="`/product/${product.id}/delete`">
                                    <input type="submit" value="DELETE"/>
                                </form> -->
                        <!-- <a :href="`/product/${product.id}/edit`">Edit</a> -->
                        <button @click="deleteProduct(product.id)">DELETE</button>
                    </td>

                    <!-- @endforeach -->
                </tr>

            </tbody>

        </table>
        <div>
            <label for="category">Category</label>

            <select name="category" id="category" v-model="selectedCategory">
                <option value="none">No Filter</option>
                <option value="fruit">Fruit</option>
                <option value="vegetable">Vegetable</option>
                <option value="pork">Pork</option>
                <option value="beef">Beef</option>
                <option value="chicken">Chicken</option>
                <option value="others">Others</option>
            </select>
        </div>
        <div>
            <button v-for="page in pages" :key="page" @click="getProducts(page,this.selectedCategory)" href="#">{{ page }}</button>


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
            search:''
        }
    },
    watch:{
        selectedCategory(newCategory,oldCategory){
            if(oldCategory != this.selectedCategory){
                this.selectedCategory = newCategory;
                this.getProducts(this.currentPage,this.selectedCategory);
            }
        },
        search(newText,oldText){
            if(newText != ''){
                this.getProducts(this.currentPage,this.selectedCategory,this.search);
            }
            else if(newText == ''){
                this.search = undefined;
            }
        }
    },
    methods: {
        getProducts(page, category= 'none',search) {

            //if No Filter option is selected, dont put category params in url
            let url = `/api/products?page=${page}`;
            
            if(category != 'none'){
                //url += `?category=${category}`
                url = `/api/products?category=${this.selectedCategory}&page=${page}`;
                //console.log(category);
            }
            if(search != undefined){
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