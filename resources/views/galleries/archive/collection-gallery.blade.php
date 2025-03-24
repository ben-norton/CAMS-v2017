@extends('layouts.master')
@section('title','Collection Gallery')
@section('content')
    <div class="page-title">
        <h2>Project Gallery</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="filter-wrapper">
                    <form method="POST" id="filter-form" class="form-inline filter-form" role="form">
                        <div class="form-group">
                            <label for="collection">Collection: </label>
                            <select class="form-control input-sm" id="collection_id" name="collection_id">
                                <option value=""></option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection->id }}">{{ $collection->collection_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                    </form>
                </div>
                @if(count($images) > 0)
                    <div class="gallery-wrapper container-fluid">
                            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter">
                                <table id="imagesTable">
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="paginator-wrapper">
                        {{ $images->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $("#filter-form").on('submit', function(e){
            console.log("submitted");
            e.preventDefault();
            var collectionId = $("#collection_id").val();
            console.log(collectionId);
            $.ajax({
                dataType: "json",
                url: '{{ url('galleries/collections/paged') }}',
                type: "POST",
                data: {
                    "collectionId" : collectionId,
                },
                success: function (data) {
                    console.log(data);
                    jQuery.each(data.images, function (index, value) {
                    var response = data;
                    $.each(response, function(i, item) {
                        console.log(item);
                    });
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                },
            })
        });
    });
</script>
@endpush

