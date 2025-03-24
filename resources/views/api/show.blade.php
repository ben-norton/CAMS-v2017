@extends('layouts.master')
@section('title', 'API Information')
@section('content')
    <?php $model = 'API Information'; ?>

    @include('includes.header')
    <div class="col-lg-10 col-md-12">
        <div class="panel panel-primary panel-specimens">
            <div class="panel-heading">
                <h3 class="panel-title">API Information</h3>
                <ul class="panel-controls">
                    <li><a target="_blank" href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a target="_blank" href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <p>The following table contains a list of URLs to access publically available digital assets through this application/</p>
                <div class="table-wrapper">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed">
                            <caption>Collections/Projects</caption>
                            <tbody>
                                <tr>
                                    <th>All Collections</th>
                                    <td><a target="_blank" href="{{ url('/api/v1/collections') }}">{{ url('/api/v1/collections') }}</a></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Single Collections</th>
                                    <td><a target="_blank" href="{{ url('/api/v1/collection') }}">{{ url('/api/v1/collections/') }}</a>/(id)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/collection/3') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>Single Collection Links</th>
                                    <td><a target="_blank" href="{{ url('/api/v1/collection/links') }}">{{ url('/api/v1/collection/links') }}</a>/(id)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/collection/links/1') }}">Test</a></td>
                                </tr>

                                <tr>
                                    <th>Search Collections</th>
                                    <td><a target="_blank" href="{{ url('/api/v1/collections/search/{term}') }}">{{ url('/api/v1/collections/search') }}</a>/(term)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/collections/search/Herp') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>All Projects</th>
                                    <td><a target="_blank" href="{{ url('/api/v1/projects') }}">{{ url('/api/v1/projects') }}</a></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>All Projects with Assets</th>
                                    <td><a target="_blank" href="{{ url('/api/v1/projects/assets') }}">{{ url('/api/v1/projects/assets') }}</a></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table-wrapper">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed">
                            <caption>Assets</caption>
                            <tbody>
                                <tr>
                                    <th>Single Asset</th>
                                    <td>{{ url('/api/v1/asset') }}/(id)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/asset/1') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>25 Most Recently Updated Assets</th>
                                    <td>{{ url('/api/v1/assets/recent') }}</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/assets/recent') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>Collection Images</th>
                                    <td>{{ url('/api/v1/images/collection') }}/(collection id)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/images/collection/4') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>Collections Keys</th>
                                    <td>{{ url('/api/v1/collections/keys') }}</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/collections/keys') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>Collection Object Assets</th>
                                    <td>{{ url('/api/v1/assets/object') }}/(collection id)/(collection key type)/(key value)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/assets/object/3/1/79040') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>Collection Object Images</th>
                                    <td>{{ url('/api/v1/images/object') }}/(collection id)/(collection key type)/(key value)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/images/object/3/1/79040') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>Project Assets</th>
                                    <td>{{ url('/api/v1/assets/project') }}/(project id)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/images/project/1') }}">Test</a></td>
                                </tr>
                                <tr>
                                    <th>Project Images</th>
                                    <td>{{ url('/api/v1/images/project') }}/(project id)</td>
                                    <td><a target="_blank" href="{{ url('/api/v1/images/project/1') }}">Test</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection