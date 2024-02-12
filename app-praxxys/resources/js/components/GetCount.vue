<template>

                <h1 class="display-2">{{ totalCount }}</h1>

                <h4 class="fw-light fs-7">Total Products</h4>
        
    
    <!-- <h5 class="display-6">TOTAL PRODUCTS: {{ totalCount }}</h5> -->
</template>

<script>
export default {
    data() {
        return {
            totalCount: 0,
        };
    },
    mounted() {
        this.getCount();
    },
    methods: {
        getCount() {
            axios.get('/api/getproducts')
                .then(response => {
                    this.totalCount = response.data.count;
                }).catch(error => {
                    console.error('Error fetching count:', error);
                });

        },
    },
};
</script>