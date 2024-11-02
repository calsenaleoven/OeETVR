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
<style>
    .input-field {
        position: relative;
    }
    .input-field::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #6A9C89;
        bottom: 2px;
        left: 0;
    }
    input {
        border: none;
        outline: none;
    }
    .card {
        background-color: #E9EFEC;
        border: none;
        border-radius: 15px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .card-header, .modal-header {
        background-color: #6A9C89;
        color: #E9EFEC;
        border-radius: 15px 15px 0 0;
    }
    .text-primary, h1, h4, h5 {
        color: #16423C !important;
    }
    .btn-primary, .btn-danger {
        color: #E9EFEC;
        border-radius: 20px;
    }
    .btn-primary {
        background-color: #6A9C89;
    }
    .btn-primary:hover, .btn-danger {
        background-color: #16423C;
    }
    .table {
        background-color: #E9EFEC;
    }
    .table thead th {
        background-color: #6A9C89;
        color: #E9EFEC;
        border-color: #C4DAD2;
    }
    .form-control {
        background-color: #E9EFEC;
        border: 1px solid #C4DAD2;
        color: #16423C;
    }
    .form-control:focus {
        border-color: #6A9C89;
        box-shadow: 0 0 0 0.2rem rgba(106, 156, 137, 0.25);
    }
</style>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Project Estimator</h1>
            </div>
        </div>
        <hr class="border-2 border-primary">
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="text-center">ESTIMATED BILL OF QUANTITIES</h4>
                <button type="submit" class="btn btn-primary" id="pdfForm">Print as PDF</button>
            </div>

            <div class="card-body">
                <label>Project Name:</label>
                <div class="input-field">
                    <input type="text" class="form-control text-only">
                </div>

                <h5 class="text-primary mt-4">Site Construction</h5>
                <table class="table table-bordered table-sm" id="first_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="product_tbody">
                        <tr>
                            <td><input type="text" readonly name="number[]" class="form-control number"></td>
                            <td><input type="text" required name="description[]" class="form-control description"></td>
                            <td><input type="text" required name="qty[]" class="form-control qty"></td>
                            <td><input type="text" required name="unit[]" class="form-control unit"></td>
                            <td><input type="text" required name="rate[]" class="form-control rate"></td>
                            <td><input type="text" required name="amount[]" class="form-control amount"></td>
                            <td><button type="button" class="btn btn-danger btn-sm btn-row-remove">x</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">TOTAL AMOUNT</td>
                            <td><input type="text" name="grand_total" id="grand_total" class="form-control" required></td>
                            <td><button type="button" class="btn btn-primary btn-sm" id="btn-add-row">+ Add Row</button></td>
                        </tr>
                    </tfoot>
                </table>

                <button type="button" class="btn btn-primary mt-3" id="addNewTableBtn" data-toggle="modal" data-target="#headerModal">Add New Table</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="headerModal" tabindex="-1" aria-labelledby="headerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enter New Header Text</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="newHeaderText" placeholder="New Header Text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="generateNewTableBtn">Generate New Table</button>
            </div>
        </div>
    </div>
</div>
@endsection
