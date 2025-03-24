
@extends('layouts.gallery')
@section('title','Collection Object Gallery')
@section('content')
    <div class="page-title">
        <h2>Project Gallery</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="v-gallery-app">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Path</th>
                                <th>Thumb</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="image in images" is="gallery" :image="image"></tr>
                        </tbody>
                    </table>
                    <pre>@{{ $data }}</pre>
                </div>
            </div>
        </div>
    </div>
    <template id="template-gallery-row">
        <td>@{{ asset.id }}</td>
        <td>@{{ asset.title }}</td>
        <td>@{{ asset.s3path }}</td>
        <td>@{{ image.imgpath_thumb }}</td>
    </template>
@endsection