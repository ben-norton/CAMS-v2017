<!-- Sidebar -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{ url('/dashboard') }}" class="logo-text">Collections Asset Manager</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-openable">
            <a href="{{ url('/') }}"><i class="icon ti ti-home"></i> <span class="xn-text">Public Portal</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><i class="icon ti ti-files"></i> <span class="xn-text">Assets</span></a>
            <ul>
                <li><a href="{{ url('assets') }}"><i class="fa fa-file-text"></i> All Assets</a></li>
                <li><a href="{{ url('assets/create') }}"><i class="fa fa-file-text"></i> Create an Asset</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><i class="icon ti ti-circle-letter-c"></i> <span class="xn-text">Collections</span></a>
            <ul>
                <li><a href="{{ url('collections') }}"><i class="icon fa ion-ios-book-outline"></i> All Collections</a></li>
                <li><a href="{{ url('collections/create') }}"><i class="icon fa ion-ios-book-outline"></i> Create a Collection</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><i class="icon ti ti-circle-letter-p"></i> <span class="xn-text">Projects</span></a>
            <ul>
                <li><a href="{{ url('projects') }}"><i class="icon fa ion-ios-book-outline"></i> All Projects</a></li>
                <li><a href="{{ url('projects/create') }}"><i class="icon fa ion-ios-book-outline"></i> Create a Project</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><i class="icon ti ti-library-photo"></i> <span class="xn-text">Galleries</span></a>
            <ul>
                <li><a href="{{ url('galleries/select-project') }}">Project Galleries</a></li>
                <li><a href="{{ url('galleries/select-collection') }}">Collection Galleries</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><i class="icon ti ti-database-cog"></i> <span class="xn-text">Meta</span></a>
            <ul>
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Asset Types</span></a>
                    <ul>
                        <li><a href="{{ url('asset-types') }}">View All</a></li>
                        <li><a href="{{ url('asset-types/create') }}">Create New</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Collection Keys</span></a>
                    <ul>
                        <li><a href="{{ url('collection-key-types') }}">View All</a></li>
                        <li><a href="{{ url('collection-key-types/create') }}">Create New</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Parameter Keys</span></a>
                    <ul>
                        <li><a href="{{ url('parameter-keys') }}">View All</a></li>
                        <li><a href="{{ url('parameter-keys/create') }}">Create Parameter New</a></li>
                    </ul>
                </li>
            </ul>
        </li>
            <li class="xn-openable">
            	<a href="{{ url('api') }}"><span class="api-icon"></span> <span class="xn-text">API Info</span></a>
            </li>
            <li class="xn-openable">
            	<a href="{{ url('user') }}"><i class="icon ti ti-user-circle"></i> <span class="xn-text">User Profile</span></a>
            </li>
            <li class="xn-openable">
                <a href="{{ url('admin/users') }}"><i class="icon ti ti-users"></i> <span class="xn-text">Users</span></a>
            </li>
    </ul>
