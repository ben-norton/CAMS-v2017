<template>
    <div class="container">
        <div class="well well-sm">
            <div class="form-group">
                <div class="input-group input-group-md">
                    <div class="icon-addon addon-md">
                        <input type="text" placeholder="What are you looking for?" class="form-control" v-model="query">
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" @click="search()" v-if="!loading">Search!</button>
                        <button class="btn btn-default" type="button" disabled="disabled" v-if="loading">Searching...</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" role="alert" v-if="error">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            {{ error }}
        </div>
        <div id="assets" class="row">
            <ul class="list-group" v-for="result in results">
                <li class="list-group-item">
                    <a :href="'/asset/' + result.id + '/show'">{{ result.title }}</a>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>

    export default {
        data() {
            return {
                results: [],
                loading: false,
                error: false,
                query: ''
            }
        },
        methods: {
            search: function () {
                console.log("search");
                this.error = '';
                this.results = [];
                this.loading = true;

                // Making a get request to our API and passing the query to it.
                axios.get('/api/v1/assets/search?q=' + this.query)
                    .then((response) => {
                        this.results = response.data;
                        this.loading = false;
                        this.query = '';
                    });
                console.log(this.results);
            }
        }
    }
</script>