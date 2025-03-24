<template>
  <div class="container-fluid gallery-wrapper">
    <div class="row gallery" id="links" v-for="results in chunkedResults">
      <div class="col-lg-3 col-md-3 col-sm-12" v-for="result of results">
        <a :href="result.imgpath_lg" :title="result.title" class="gallery-item" data-gallery>
          <div class="image">
            <img :src="result.imgpath_md" :alt="result.title" :title="result.title" class="img-responsive" />
          </div>
        </a>
        <div class="meta">
          <strong>{{ result.title }}</strong><br>
          <span>{{ result.original_filename }}</span><br>
          <a :href="'/public/assets/' + result.id">View Asset</a>
        </div>
      </div>
    </div>
    <div class="row">
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
</template>

<script>

function buildUrl (url) {
  return '/api/v1/images/assetType/' + asset_type_id;
}

import _ from 'lodash'
export default {
  data() {
    return {
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
    this.loading = false;
    this.getImages(this.pagination.current_page);
    console.log('Component mounted.')
  },
  computed: {
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
      axios.get(url + '?page=' + page)
          .then(function(response) {
            self.results = response.data.data.data;
            self.pagination = response.data.pagination;
          });
    },

    changePage: function (page) {
      this.pagination.current_page = page;
      this.getImages(page);
    }
  }
}
</script>
<style>
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