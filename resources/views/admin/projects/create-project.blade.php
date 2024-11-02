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
                    <h1 class="m-0" style="color: #16423C; font-weight: 600;">Create New Project</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2" style="border-color: #6A9C89 !important;">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #C4DAD2;">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" 
                 style="background-color: #6A9C89; color: #E9EFEC; border: none;">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-text="true">&times;</span>
                </button>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger" style="background-color: #16423C; color: #E9EFEC; border: none;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-body" style="background-color: #E9EFEC; border-radius: 15px;">
                <form action="{{ route('admin.store-project') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label" style="color: #16423C;">Name</label>
                                <input type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    style="border-color: #6A9C89; border-radius: 8px;">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color: #16423C;">Status</label>
                                <select name="status" id="status"
                                    class="form-select form-control @error('status') is-invalid @enderror"
                                    style="border-color: #6A9C89; border-radius: 8px;">
                                    <option value="">Select Status</option>
                                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="On-hold" {{ old('status') == 'On-hold' ? 'selected' : '' }}>On-Hold</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Project Type</label>
                                <select name="project_type" id="project_type_dd"
                                    class="form-select form-control @error('project_type') is-invalid @enderror">
                                    <option value="">Visualization of Type of Projects</option>
                                    <option value="Vertical Type"
                                        {{ old('project_type') == 'Vertical Type' ? 'selected' : '' }}>Vertical Type
                                    </option>
                                    <option value="Horizontal Type"
                                        {{ old('project_type') == 'Horizontal Type' ? 'selected' : '' }}>Horizontal Type
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="selected_category_val" id="selected_category_val"
                                    class="form-select form-control  @error('selected_category_val') is-invalid @enderror">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 d-none" id="for-length">
                            <div class="form-group">
                                <label class="" for="">Lenght / km</label>
                                <input type="text" name="length"
                                    class="form-control @error('length') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="col-md-6 d-none" id="for-storey">
                            <div class="form-group">
                                <label class="" for="">Storey Clasification</label>
                                <select name="storey" id="storey-dropdown"
                                    class="form-control form-select @error('storey') is-invalid @enderror">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="budget">
                            <div class="form-group">
                                <label for="">Overall/ Total Budget</label>
                                <input type="number" name="budget"
                                    class="form-control @error('budget') is-invalid @enderror">
                                @error('budget')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Start Date</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    autocomplete="off" name="start_date" value="">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">End Date</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    autocomplete="off" name="end_date" value="">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="control-label">Project Manager</label>
                                <select class="form-control select2 @error('manager_id') is-invalid @enderror"
                                    name="manager_id">
                                    <option value="">Select Project Manager</option>
                                    @foreach ($users as $row)
                                        <option value="{{ $row->id }}">{{ $row->fullname }}</option>
                                    @endforeach
                                </select>
                                @error('manager_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="control-label">Project Owner</label>
                                <select class="form-control select2  @error('owner_id') is-invalid @enderror"
                                    name="owner_id">
                                    <option value="">Select Project Owner</option>
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->fullname }}</option>
                                    @endforeach
                                </select>
                                @error('owner_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Project Members</label>
                                <select class="form-control form-select @error('user_ids[]') is-invalid @enderror"
                                    multiple="multiple" name="user_ids[]" id="projectMembersSelect">
                                    <option value="">Select Project Members</option>
                                    @foreach ($members as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->fullname }} /
                                        {{ $row->type == 2 ? 'Project Manager' : ($row->type == 3 ? 'Project Member' : 'Other') }}
                                    </option>
                                @endforeach
                                </select>
                                @error('user_ids[]')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="3"
                                    class="summernote form-control @error('description') is-invalid @enderror">

                                </textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="" class="control-label">Project Location</label>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <select name="region" id="region"
                                            class="form-control form-select @error('region') is-invalid @enderror">

                                        </select>
                                        <input type="hidden" name="region_text" id="region-text">
                                        <input type="hidden" name="region_code" id="region-code">
                                        @error('region')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <select name="province" id="province"
                                            class="form-control form-select @error('province') is-invalid @enderror">

                                        </select>
                                        <input type="hidden" name="province_text" id="province-text">
                                        <input type="hidden" name="province_code" id="province-code">
                                        @error('province')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <select name="city" id="city"
                                            class="form-control form-select @error('city') is-invalid @enderror">

                                        </select>
                                        <input type="hidden" name="city_text" id="city-text">
                                        <input type="hidden" name="city_code" id="city-code">
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <select name="barangay" id="barangay"
                                            class="form-control form-select @error('barangay') is-invalid @enderror">

                                        </select>
                                        <input type="hidden" name="barangay_text" id="barangay-text">
                                        <input type="hidden" name="barangay_code" id="barangay-code">
                                        @error('barangay')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer" style="background-color: #6A9C89; border-radius: 0 0 15px 15px;">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <button type="submit" class="btn text-white" 
                            style="background-color: #16423C; border-radius: 20px;">
                        <i class="fas fa-save me-1"></i> Save</button>
                </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

    <style>
        /* Form Control Styling */
        .form-control, .form-select {
            border-color: #6A9C89 !important;
            border-radius: 8px !important;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #16423C !important;
            box-shadow: 0 0 0 0.2rem rgba(106, 156, 137, 0.25) !important;
        }

        /* Label Styling */
        label {
            color: #16423C !important;
            font-weight: 500;
        }

        /* Select2 Styling */
        .select2-container--default .select2-selection--single,
        .select2-container--default .select2-selection--multiple {
            border-color: #6A9C89 !important;
            border-radius: 8px !important;
        }

        .select2-container--default .select2-selection--single:focus,
        .select2-container--default .select2-selection--multiple:focus {
            border-color: #16423C !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #6A9C89 !important;
            color: #E9EFEC !important;
        }

        /* Summernote Styling */
        .note-editor {
            border-color: #6A9C89 !important;
            border-radius: 8px !important;
        }

        .note-toolbar {
            background-color: #E9EFEC !important;
            border-bottom: 1px solid #C4DAD2 !important;
        }

        /* Invalid Feedback Styling */
        .invalid-feedback {
            color: #16423C !important;
        }

        /* Alert Styling */
        .alert-success {
            background-color: #6A9C89 !important;
            color: #E9EFEC !important;
            border: none !important;
            border-radius: 8px !important;
        }

        .alert-danger {
            background-color: #16423C !important;
            color: #E9EFEC !important;
            border: none !important;
            border-radius: 8px !important;
        }
    </style>
@endsection