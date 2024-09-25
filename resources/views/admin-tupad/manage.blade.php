@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-align-top">
                        <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link waves-effect waves-light active" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages"
                                    aria-controls="navs-pills-justified-messages" aria-selected="false" tabindex="-1">
                                    <i class="tf-icons ri-database-2-line me-1_5"></i> Clean Database
                                </button>
                            </li>
                            <li class="nav-item mb-1 mb-sm-0" role="presentation">
                                <button type="button" class="nav-link waves-effect waves-light" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home"
                                    aria-controls="navs-pills-justified-home" aria-selected="true">
                                    <i class="tf-icons ri-group-line me-1_5"></i> My Account
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="navs-pills-justified-home" role="tabpanel">
                                <!-- Account -->
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-6">
                                        <img src="../assets/img/avatars/1.png" alt="user-avatar"
                                            class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                                        <div class="button-wrapper">
                                            <label for="upload"
                                                class="btn btn-sm btn-primary me-3 mb-4 waves-effect waves-light"
                                                tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="ri-upload-2-line d-block d-sm-none"></i>
                                                <input type="file" id="upload" class="account-file-input"
                                                    hidden="" accept="image/png, image/jpeg">
                                            </label>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger account-image-reset mb-4 waves-effect">
                                                <i class="ri-refresh-line d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>
                                            @if (Auth::user())
                                                <div><span class="badge bg-label-info">SYSTEM ADMIN</span></div>
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
                                                        name="firstName" value="{{ Auth::user()->name }}" autofocus="">
                                                    <label for="firstName">Account name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input class="form-control" type="text" name="lastName"
                                                        id="lastName" value="{{ Auth::user()->email }}">
                                                    <label for="lastName">Username</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input class="form-control" type="text" id="email" name="email"
                                                        value="" placeholder="Fill your new password">
                                                    <label for="email">Entry New Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-6">
                                            <button type="submit"
                                                class="btn btn-primary me-3 waves-effect waves-light">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /Account -->
                            </div>
                            <div class="tab-pane fade active show" id="navs-pills-justified-messages" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-4 mb-6">
                                        <div class="card card-border-shadow-primary h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="avatar me-4">
                                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                                class="ri-group-line ri-24px"></i></span>
                                                    </div>
                                                    <h4 class="mb-0 me-2">{{$tupad}}</h4>
                                                    <h6 class="mb-0">
                                                        <script>
                                                            document.write(new Date().getFullYear());
                                                        </script> TUPAD
                                                    </h6>
                                                </div>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger  mb-4 waves-effect float-end emptyTupad">
                                                    <i class="ri-delete-bin-line d-block me-1"></i>
                                                    <span class="d-none d-sm-block">Clean</span>
                                                </button>
                                                <p class="mb-0">
                                                    <small class="text-muted">Clicking this button will clean system
                                                        account.</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 mb-6">
                                        <div class="card card-border-shadow-primary h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="avatar me-4">
                                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                                class="ri-team-line ri-24px"></i></span>
                                                    </div>
                                                    <h4 class="mb-0 me-2">{{$elected}}</h4>
                                                    <h6 class="mb-0">TOTAL ELECTED OFFICIALS</h6>
                                                </div>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger  mb-4 waves-effect float-end emptyElected">
                                                    <i class="ri-delete-bin-line d-block me-1"></i>
                                                    <span class="d-none d-sm-block">Clean</span>
                                                </button>
                                                <p class="mb-0">
                                                    <small class="text-muted">Clicking this button will clean all elected
                                                        officials.</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 mb-6">
                                        <div class="card card-border-shadow-primary h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="avatar me-4">
                                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                                class="ri-shield-user-line ri-24px"></i></span>
                                                    </div>
                                                    <h4 class="mb-0 me-2">{{$appointed}}</h4>
                                                    <h6 class="mb-0">TOTAL APPOINTED OFFICIALS</h6>
                                                </div>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger  mb-4 waves-effect float-end emptyAppointed">
                                                    <i class="ri-delete-bin-line d-block me-1"></i>
                                                    <span class="d-none d-sm-block">Clean</span>
                                                </button>
                                                <p class="mb-0">
                                                    <small class="text-muted">Clicking this button will clean all appointed
                                                        officials.</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @include('admin-tupad.partials.scripts.manage-scripts.clean-database')
                                </div>
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
