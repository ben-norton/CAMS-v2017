import './bootstrap';
import { createApp } from 'vue';

import ProjectGallery from './components/ProjectGallery.vue';
import CollectionGallery from './components/CollectionGallery.vue';
import AssetSearch from './components/AssetSearch.vue';
import AssetTypeGallery from './components/AssetTypeGallery.vue';

const app = createApp({})
app.component('vue-project-gallery', ProjectGallery)
app.component('vue-collection-gallery', CollectionGallery)
app.component('vue-asset-search', AssetSearch)
app.component('vue-asset-type-gallery', AssetTypeGallery)
app.mount('#v-app')
