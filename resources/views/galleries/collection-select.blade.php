@extends('layouts.gallery')
@section('title','Collection Gallery')
@section('content')
    <div class="page-title">
        <h2>Galleries - Select Collection</h2>
    </div>
    <div class="page-content-wrap">
        @foreach($collections->chunk(3) as $chunk)
            <div class="row project-panels">
                @foreach($chunk as $collection)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="hovereffect">
                                    <img src="https://placehold.co/600x400" alt="Collection Image" class="img-responsive">
                                    <div class="overlay">
                                        <h2>{{ $collection->collection_name }}</h2>
                                        <a href="{{ url('/galleries/collection/'.$collection->id) }}" class="info">VIEW GALLERY</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <style>
        .project-panels .panel .panel-body h3 {
            text-align: center;
        }
        .hovereffect {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default;
            background: #42b078;
        }
        .hovereffect .overlay {
            background: rgba(0,0,0,0.7);
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            padding: 50px 20px;
        }
        .hovereffect img {
            max-height: 300px;
            display: block;
            position: relative;
            max-width: none;
            width: calc(100% + 20px);
            -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
            transition: opacity 0.35s, transform 0.35s;
            -webkit-transform: translate3d(-10px,0,0);
            transform: translate3d(-10px,0,0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .hovereffect:hover img {
            opacity: 0.4;
            filter: alpha(opacity=40);
            -webkit-transform: translate3d(0,0,0);
            transform: translate3d(0,0,0);
        }

        .hovereffect h2 {
            text-transform: uppercase;
            color: #FFFFFF;
            text-align: center;
            position: relative;
            font-size: 17px;
            overflow: hidden;
            padding: 0.5em 0;
            background-color: transparent;
        }

        .hovereffect h2:after {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #fff;
            content: '';
            -webkit-transition: -webkit-transform 0.35s;
            transition: transform 0.35s;
            -webkit-transform: translate3d(-100%,0,0);
            transform: translate3d(-100%,0,0);
        }

        .hovereffect:hover h2:after {
            -webkit-transform: translate3d(0,0,0);
            transform: translate3d(0,0,0);
        }

        .hovereffect a.info {
            display: inline-block;
            text-decoration: none;
            padding: 7px 14px;
            border: 1px solid #fff;
            margin: 10px 0 0 0;
            background-color: transparent;
        }

        .hovereffect a.info:hover {
            box-shadow: 0 0 5px #fff;
        }

        .hovereffect a.info {
            -webkit-transform: scale(0.7);
            -ms-transform: scale(0.7);
            transform: scale(0.7);
            -webkit-transition: all 0.4s ease-in;
            transition: all 0.4s ease-in;
            opacity: 0;
            filter: alpha(opacity=0);
            color: #fff;
            text-transform: uppercase;
        }

        .hovereffect:hover a.info {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
        }
    </style>
@endsection
@push('scripts')
@endpush