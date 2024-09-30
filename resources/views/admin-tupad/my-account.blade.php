@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <h5 class="card-title fw-bold">My Account</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <!-- Account -->
                                        <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-6">
                                                <img src="{{ asset('storage/uploads/images/' . Auth::user()->image) }}"
                                                    alt="user-avatar" class="d-block w-px-100 h-px-100 rounded"
                                                    id="uploadedAvatar">
                                                <div class="button-wrapper">
                                                    <label for="upload"
                                                        class="btn btn-sm btn-primary me-3 mb-4 waves-effect waves-light"
                                                        tabindex="0">
                                                        <span class="d-none d-sm-block">Upload new photo</span>
                                                        <i class="ri-upload-2-line d-block d-sm-none"></i>
                                                        <input type="file" id="upload" class="account-file-input"
                                                            hidden="" accept="image/png, image/jpeg">
                                                    </label>
                                                    @if (Auth::user())
                                                        <div class="fw-bold">Role: <span class="badge bg-label-info">SYSTEM ADMIN</span></div>
                                                    @elseif (Auth::user()->role == 2)
                                                        <div>User</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                                <div class="row mt-1 g-5">
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="name" value="{{ Auth::user()->name }}"
                                                               disabled>
                                                            <label for="name">Account name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control" type="text" name="username"
                                                                id="username" value="{{ Auth::user()->email }}" disabled>
                                                            <label for="lastName">Username</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mt-6 d-flex align-items-start align-items-sm-center gap-6">
                                                        <div class="ms-auto">
                                                            <button type="submit"
                                                                class="btn btn-info waves-effect waves-light">Edit Information</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /Account -->
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection
