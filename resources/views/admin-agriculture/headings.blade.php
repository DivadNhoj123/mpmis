@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <hr class="my-6" />
                @if ($headings)
                    <form action="{{ route('agriculture-headings.update', $headings->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf <!-- CSRF token for Laravel security -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold text-uppercase">Manage Print Headers</h5>
                                <button type="button" id="edit-btn" class="btn btn-info btn-sm">
                                    <i class="ri-edit-box-line"></i> Edit
                                </button>
                                <button type="submit" id="save-btn" class="btn btn-success btn-sm d-none">
                                    <i class="ri-save-line me-1"></i> Save Headings
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5>LEFT SIDE HEADER</h5>
                                            </div>
                                            <div class="card-body">
                                                <input id="file-input" type="file" class="dropify" data-height="300"
                                                    data-default-file="{{ asset('storage/uploads/images/' . $headings->left_img) }}"
                                                    disabled name="left_img">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5>RIGHT SIDE HEADER</h5>
                                            </div>
                                            <div class="card-body">
                                                <input id="file-input" type="file" class="dropify" data-height="300"
                                                    data-default-file="{{ asset('storage/uploads/images/' . $headings->right_img) }}"
                                                    disabled name="right_img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="{{ route('agriculture-headings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF token for Laravel security -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold text-uppercase">Manage Print Headers</h5>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="ri-add-circle-line me-1"></i> Add Headings
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5>RIGHT SIDE HEADER</h5>
                                            </div>
                                            <div class="card-body">
                                                <input id="file-input" type="file" class="dropify" data-height="300"
                                                    data-default-file="{{ asset('../assets/img/default-logo/no-logo.png') }}"
                                                    name="left_img" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5>RIGHT SIDE HEADER</h5>
                                            </div>
                                            <div class="card-body">
                                                <input id="file-input" type="file" class="dropify" data-height="300"
                                                    data-default-file="{{ asset('../assets/img/default-logo/no-logo.png') }}"
                                                    name="right_img" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
                <script>
                    $(document).ready(function() {
                        // Initialize Dropify
                        $('.dropify').dropify();

                        // Edit button click event
                        $('#edit-btn').click(function() {
                            // Enable file inputs
                            $('#file-input, #file-input').removeAttr('disabled');

                            // Reinitialize Dropify to update the inputs
                            $('#file-input, #file-input').dropify('destroy').dropify();

                            // Show the Save button and hide the Edit button
                            $(this).addClass('d-none');
                            $('#save-btn').removeClass('d-none');
                        });
                    });
                </script>

            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
