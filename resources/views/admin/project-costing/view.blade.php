@extends('templates.admin.header')
<style>
    .main-header {
        background-color: #6A9C89 !important;
        border: none !important;
    }
    
    .main-header .navbar-nav .nav-link {
        color: #E9EFEC !important;
    }

    .main-header .navbar-nav .nav-link:hover {
        color: #ffffff !important;
    }

    /* Brand Logo Area */
    .brand-link {
        background-color: #6A9C89 !important;
        color: #E9EFEC !important;
        border-bottom: 1px solid #C4DAD2 !important;
    }

    /* Sidebar Styling */
    .main-sidebar {
        background-color: #6A9C89 !important;
    }

    /* Sidebar Menu Items */
    .nav-sidebar .nav-item .nav-link {
        color: #E9EFEC !important;
    }

    .nav-sidebar .nav-item .nav-link:hover {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    /* Active Menu Item */
    .nav-sidebar .nav-item.menu-open > .nav-link,
    .nav-sidebar .nav-item .nav-link.active {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    /* Sidebar User Panel */
    .user-panel {
        border-bottom: 1px solid #C4DAD2 !important;
    }

    .user-panel .info a {
        color: #E9EFEC !important;
    }

    /* Sidebar Search */
    .sidebar-search-results .list-group-item {
        background-color: #C4DAD2 !important;
        color: #E9EFEC !important;
    }

    .form-control-sidebar {
        background-color: #C4DAD2 !important;
        border: 1px solid #E9EFEC !important;
        color: #E9EFEC !important;
    }

    .form-control-sidebar:focus {
        border: 1px solid #E9EFEC !important;
    }

    .form-control-sidebar::placeholder {
        color: #E9EFEC !important;
        opacity: 0.8;
    }

    /* Sidebar Sub-menus */
    .nav-treeview > .nav-item > .nav-link {
        color: #E9EFEC !important;
        padding-left: 2rem;
    }

    .nav-treeview > .nav-item > .nav-link:hover {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    .nav-treeview > .nav-item > .nav-link.active {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    /* Main Content Background */
    .content-wrapper {
        background-color: #C4DAD2 !important;
    }

    /* Custom Scrollbar for Sidebar */
    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: #6A9C89;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: #C4DAD2;
        border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: #E9EFEC;
    }

    /* Dropdown Menus */
    .dropdown-menu {
        background-color: #E9EFEC !important;
    }

    .dropdown-item {
        color: #6A9C89 !important;
    }

    .dropdown-item:hover {
        background-color: #C4DAD2 !important;
        color: #ffffff !important;
    }

    /* Control Sidebar (Right Sidebar if present) */
    .control-sidebar {
        background-color: #6A9C89 !important;
    }
</style>
@section('content')
    <div class="content-header" style="background-color: #E9EFEC;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #16423C;">Project Costing</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2" style="border-color: #6A9C89 !important;">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card" style="border-radius: 15px; background-color: #E9EFEC;">
                <div class="card-header" style="background-color: #6A9C89; border-radius: 15px 15px 0 0;">
                    <h4 class="text-center text-white">ESTIMATED PROJECT COSTING</h4>
                </div>
                <div class="card-body">
                    <form id="projectForm">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="projectName" style="color: #16423C;">Project Name:</label>
                                <input type="text" class="form-control" id="projectName" required style="border-color: #C4DAD2;">
                            </div>
                            <div class="col-md-5">
                                <label for="totalArea" style="color: #16423C;">Total Area (m<sup>2</sup>):</label>
                                <input type="number" class="form-control" id="totalArea" step="0.01" required style="border-color: #C4DAD2;">
                            </div>
                            <div class="col-md-0">
                                <label for="">&nbsp;</label>
                                <button type="submit" class="btn" style="margin-top: 2em; background-color: #6A9C89; color: #E9EFEC;">Calculate</button>
                            </div>
                        </div>
                    </form>
                    <div id="result" class="mt-3"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid d-none" id="details_statis">
            <div class="card" style="border-radius: 15px; background-color: #E9EFEC;">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <h1 class="text-center mb-5" style="color: #6A9C89;" id="project_name"></h1>
                            <div class="row">
                                <div style="margin-top: 185px;" class="col-md-3">
                                    <label style="color: #16423C;" for=""><h4>Floor</h4></label><br>
                                    <label style="color: #16423C;" for=""><h4>Wall</h4></label><br>
                                    <label style="color: #16423C;" for=""><h4>Window</h4></label><br>
                                    <label style="color: #16423C;" for=""><h4>Ceiling</h4></label><br>
                                    <label style="color: #16423C;" for=""><h4>Amount</h4></label><br>
                                </div>
                                <div class="col-md-3">
                                    <img class="w-75" src="{{ asset('static/Capture1.JPG') }}" alt="{{ asset('static/Capture1.JPG') }}">
                                    <label style="color: #6A9C89;" for=""><h4>Bare</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Concrete</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Concrete</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Minimal</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>None</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4 id="first_amount"></h4></label><br>
                                </div>
                                <div class="col-md-3">
                                    <img class="w-75" src="{{ asset('static/Capture2.JPG') }}" alt="{{ asset('static/Capture1.JPG') }}">
                                    <label style="color: #6A9C89;" for=""><h4>Standard</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Tiles</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Paint</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Standard</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Gypsum</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4 id="second_amount"></h4></label><br>
                                </div>
                                <div class="col-md-3">
                                    <img class="w-75" src="{{ asset('static/Capture3.JPG') }}" alt="{{ asset('static/Capture1.JPG') }}">
                                    <label style="color: #6A9C89;" for=""><h4>Luxury</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Tiles</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Cladding</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>Full Window</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4>PVC</h4></label><br>
                                    <label style="color: #6A9C89;" for=""><h4 id="third_amount"></h4></label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection