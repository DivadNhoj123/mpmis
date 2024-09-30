@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <h5 class="card-title fw-bold">Clean Databases</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 mb-6">
                                    <div class="card card-border-shadow-primary h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="avatar me-4">
                                                    <span class="avatar-initial rounded bg-label-primary"><i
                                                            class="ri-group-line ri-24px"></i></span>
                                                </div>
                                                <h4 class="mb-0 me-2">{{ $tupad }}</h4>
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
                                                <h4 class="mb-0 me-2">{{ $elected }}</h4>
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
                                                <h4 class="mb-0 me-2">{{ $appointed }}</h4>
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
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection
