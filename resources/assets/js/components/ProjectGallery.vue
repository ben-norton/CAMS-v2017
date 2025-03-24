<template>
    <div class="container-fluid gallery-wrapper">
		<div class="row filter-wrapper form-inline">
			<div class="form-group">
				<label for="query">Search</label>
				<input name="query" class="form-control" v-model="search">
			</div>
		</div>
		<div class="gallery-inner-wrapper">
`			<div class="row gallery" id="links" v-for="results in filteredResults">
				<div class="col-lg-3 col-md-3 col-sm-12" v-for="result of results">
					<a :href="result.imgpath_lg" :title="result.title" class="gallery-item" data-gallery>
						<div class="image">
							<img :src="result.imgpath_md" :alt="result.title" :title="result.title" class="img-responsive" />
						</div>
					</a>
					  <div class="meta">
						  <strong>{{ result.title }}</strong><br>
						<a :href="'/public/assets/' + result.asset_id">View Asset</a>
					  </div>
				 </div>
			</div>
`        <div class="row">
            <div class="col-xs-12">



                <nav class="center-block">
                    <ul class="pagination">
                        <li v-if="pagination.current_page > 1">
                            <button class="btn btn-primary btn-large pull-left" @click.prevent="changePage(pagination.current_page - 1)">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li v-for="page in pagesNumber"
                            :class="[ page == isActived ? 'active' : '']">
                            <a href="#" @click.prevent="changePage(page)" class="page-number">{{ page }}</a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <button class="btn btn-default btn-large" @click.prevent="changePage(pagination.current_page + 1)">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
					</div>

    </div>

</template>

<script>

    function buildUrl (url) {
        return '/api/v1/images/project/' + resource_id;
    }
    import _ from 'lodash'
    export default {
        data() {
            return {
                search: '',
                results: [],
                counter: 0,
                pagination: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 4,
            };
        },
        mounted() {
            this.getImages(this.pagination.current_page);
            console.log('Component mounted.')
        },
        computed: {
            filteredResults:function()
            {
                var self=this;
                var chunk = this.results.filter(function(result){return result.title.toLowerCase().indexOf(self.search.toLowerCase())>=0;});
                return _.chunk(_.toArray(chunk), 4);
            },
            chunkedResults () {
                return _.chunk(_.toArray(this.results), 4);
            },
            isActived: function () {
                return this.pagination.current_page;
            },
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods: {
            getImages(page) {
                let url = buildUrl();
                var self = this;
                console.log(url);
                axios.get(url + '?page=' + page)
                    .then(function(response) {
                        self.results = response.data.data.data;
                        self.pagination = response.data.pagination;
                    });
                console.log(this.results);
//                console.log(this.pagination);
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.getImages(page);
            }
        }
    }

</script>
<style>
				.gallery-wrapper {
					padding: 0 10px 10px 10px;
				}

    .gallery-wrapper .row.filter-wrapper.form-inline {
						margin: 0;
						width: fit-content;
						position: relative;
						padding: 15px 10px;
					border-bottom: 1px solid #616161;

    }
				.gallery-wrapper .row.filter-wrapper.form-inline label {
					padding: 0 10px 0 0;
					font-weight: 700;
					font-size: 14px;
					letter-spacing: 0.05em;
					text-transform: uppercase;
					color: #434a54;
				}
				.gallery-wrapper .row.filter-wrapper.form-inline label,
				.gallery-wrapper .row.filter-wrapper.form-inline input {
					display: inline-block;
				}
				.gallery-wrapper .row.filter-wrapper.form-inline input {
					height: 30px;
				}
				.gallery-inner-wrapper {
					padding: 10px;
				}
    ul.img-properties {
        list-style-type: none;
        padding-left: 0;
        margin-left: 0;
    }
    .form-group label {
        line-height: 20px;
        font-size: 16px;
    }
    .form-group .btn {
        vertical-align: top;
        margin-left: 15px;
    }
    .form-group .btn,
    .form-group select.form-control {
        display: inline-block;
        width: auto;
    }
</style>