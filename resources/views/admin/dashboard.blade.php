@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        @auth
            @if (Auth::user()->role == 0)
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <div class="card card-border-shadow-primary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            <i class="ri-group-line ri-24px"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-0">{{$tupad}}</h4>
                                </div>
                                <h6 class="mb-0 fw-bold">MPIMS TUPAD</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <div class="card card-border-shadow-warning h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-warning"><i
                                                class="ri-group-line ri-24px"></i></span>
                                    </div>
                                    <h4 class="mb-0">{{$agriculture}}</h4>
                                </div>
                                <h6 class="mb-0 fw-bold">MPIMS AGRICULTURE </h6>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <div class="card card-border-shadow-warning h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="ri-group-line ri-24px"></i></span>
                                    </div>
                                    <h4 class="mb-0">{{$acap}}</h4>
                                </div>
                                <h6 class="mb-0 fw-bold">MPIMS ACAP </h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (Auth::user()->role == 1)
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-primary h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="ri-user-search-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0">{{ $new }}</h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">NEWLY APPLICANT</h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-warning h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-warning"><i
                                                    class="ri-group-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0">{{ $elected }}</h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">ELECTED OFFICIALS</h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-danger h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-danger"><i
                                                    class="ri-shield-user-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0">{{ $appointed }}</h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">APPOINTED OFFICIALS</h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-info h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-info"><i
                                                    class="ri-hand-coin-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0">{{ $recent }}</h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">TOTAL TUPAD APPLICANT</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">TUPAD Workers Chart</div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <canvas id="barChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->
                @include('admin-tupad.partials.scripts.chart-scripts.chart')
                <div class="content-backdrop fade"></div>
            @endif
            @if (Auth::user()->role == 2)
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-primary h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="ri-ship-2-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0">{{ $motorized }}</h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">MOTORIZED</h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-warning h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-warning"><i
                                                    class="ri-sailboat-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0">{{ $non_motorized }}</h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">NON - MOTORIZED</h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-danger h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-danger"><i
                                                    class="ri-pass-valid-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0">0</h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">FISHING GEAR</h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-info h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-info"><i
                                                    class="ri-hand-coin-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0"></h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">FISH CAGE</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card card-border-shadow-info h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded bg-label-info"><i
                                                    class="ri-hand-coin-line ri-24px"></i></span>
                                        </div>
                                        <h4 class="mb-0"></h4>
                                    </div>
                                    <h6 class="mb-0 fw-bold">PAYAO</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    </div>
@endsection
