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
                                        <form action="{{ route('update-account', ['id' => $id]) }}" method="POST">
                                            @method('PUT')
                                            @csrf
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
                                                                hidden="" name="image"
                                                                accept="image/png, image/jpeg">
                                                        </label>
                                                        @if (Auth::user())
                                                            <div class="fw-bold">Role: <span
                                                                    class="badge bg-label-info">SYSTEM ADMIN</span></div>
                                                        @elseif (Auth::user()->role == 2)
                                                            <div>User</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row mt-1 g-5">
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="name" value="{{ Auth::user()->name }}" disabled>
                                                            <label for="name">Account name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control" type="text" name="email"
                                                                id="username" value="{{ Auth::user()->email }}" disabled>
                                                            <label for="lastName">Username</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mt-6 d-flex align-items-start align-items-sm-center gap-6">
                                                        <div class="ms-auto">
                                                            <button type="button" id="editButton"
                                                                class="btn btn-info waves-effect waves-light">Edit
                                                                Information</button>
                                                            <button type="submit" id="saveButton"
                                                                class="btn btn-success waves-effect waves-light d-none">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                // Get references to elements
                                                const editButton = document.getElementById('editButton');
                                                const saveButton = document.getElementById('saveButton');
                                                const inputFields = document.querySelectorAll('input[disabled]');

                                                // Event listener for "Edit Information" button
                                                editButton.addEventListener('click', function() {
                                                    // Enable input fields
                                                    inputFields.forEach(input => input.removeAttribute('disabled'));

                                                    // Hide "Edit Information" button and show "Save Changes" button
                                                    editButton.classList.add('d-none');
                                                    saveButton.classList.remove('d-none');
                                                });
                                            </script>

                                        </form>
                                        <!-- /Account -->
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin-tupad.partials.scripts.officials-scripts.success-officials')
            </div>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection
