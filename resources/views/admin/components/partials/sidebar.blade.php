<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-sm tabler-sidebar d-none d-sm-block">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand my-3">
            <a href="#">
                {{ config('app.name') }}
                {{-- <img src="https://preview.tabler.io/static/logo-white.svg" width="110" height="32" alt="Tabler"
                    class="navbar-brand-image" /> --}}
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <x:sidebar.item label="Dashboard" icon="bx-grid-alt" link="{{ url('/') }}" :activeCondition="Route::is('admin.dashboard')" />

                <x:sidebar.menu-title title="Master Data" />
                <x:sidebar.dropdown label="Users" icon="bx-group" :activeCondition="Route::is('admin.users.*')">
                    <x:sidebar.dropdown-item label="Administrator" link="{{ route('admin.users.administrator.index') }}" :activeCondition="Route::is('admin.users.administrator.*')"/>
                    <x:sidebar.dropdown-item label="Staff" :activeCondition="Route::is('admin.users.staff.*')"/>
                    <x:sidebar.sub-dropdown label="Others" :activeCondition="Route::is('admin.users.others.*')">
                        <x:sidebar.dropdown-item label="Administrator" :activeCondition="Route::is('admin.users.administrator.*')"/>
                        <x:sidebar.dropdown-item label="Staff" :activeCondition="Route::is('admin.users.staff.*')"/>
                    </x:sidebar.sub-dropdown>
                </x:sidebar.dropdown>
            </ul>
        </div>
    </div>
</aside>
