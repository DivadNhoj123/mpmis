@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <hr class="my-6" />
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">MPMIS Accounts</h4>

                            <div class="ms-auto">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-success waves-effect" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasScroll" aria-controls="offcanvasScroll"> <i
                                            class="ri-user-add-line ri-16px me-1_5"></i>Add
                                        Accounts
                                    </button>
                                </div>
                            </div>
                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                tabindex="-1" id="offcanvasScroll" aria-labelledby="offcanvasScrollLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasScrollLabel" class="offcanvas-title">
                                        Add MPMIS Accounts
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('accounts.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        name="name" placeholder="Full name" required />
                                                    <label for="nameWithTitle">Fullname</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="email" id="emailWithTitle" class="form-control"
                                                        name="email" placeholder="Email" required />
                                                    <label for="emailWithTitle">Email or Username</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <label for="defaultFormControlInput" class="form-label">Department</label>
                                                <select id="largeSelect" class="form-select form-select-md text-center"
                                                    name="role" required>
                                                    <option selected disabled>Select Department</option>
                                                    <option value="1">TUPAD / PESO</option>
                                                    <option value="2">DEPARTMENT OF AGRICULTURE</option>
                                                    <option value="3">ACAP</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <label for="defaultFormControlInput" class="form-label">Password
                                                    Credentials</label>
                                                <select id="largeSelect" class="form-select form-select-md text-center"
                                                    name="password" required>
                                                    <option selected disabled>Select Default Password Credentials</option>
                                                    <option value="mpmis_tupad">TUPAD / PESO</option>
                                                    <option value="mpmis_agriculture">DEPARTMENT OF AGRICULTURE</option>
                                                    <option value="mpmis_acap">ACAP</option>
                                                </select>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success mb-2 d-grid w-100">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Department | Office</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Department | Office</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center user-name">
                                                    <div class="avatar-wrapper">
                                                        @if ($user)
                                                            <div class="avatar me-2"><img
                                                                    src="{{ asset('storage/uploads/images/' . $user->image) }}"
                                                                    alt="title" class="imagecheck-image">
                                                            </div>
                                                        @elseif($user === null)
                                                            <div class="avatar me-2"><img
                                                                    src="{{ asset('storage/uploads/images/1.png') }}"
                                                                    alt="title" class="imagecheck-image">
                                                            </div>
                                                        @else
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                                <br>
                                                Added by:
                                                <span class="badge bg-label-danger">{{ $user->name }}</span>

                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->role == 1)
                                                    <span class="badge bg-label-success"> TUPAD | ADMIN</span>
                                                @elseif($user->role == 2)
                                                    <span class="badge bg-label-success"> AGRICULTURE | ADMIN</span>
                                                @elseif($user->role == 3)
                                                    <span class="badge bg-label-success"> ACAP | ADMIN</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-icon btn-warning " data-bs-toggle="modal"
                                                    data-bs-target="#edit-modal{{ $user->id }}">
                                                    <i class="ri-edit-box-line"></i>
                                                </a>
                                                @include('admin.partials.modals.account-modal.edit-account')
                                                <a type="button" class="btn btn-icon btn-danger delete"
                                                    data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                                                    <i class="ri-delete-bin-fill"></i>
                                                </a>
                                                {{-- @include('admin.partials.scripts.users-scripts.success-users')
                                                @include('admin.partials.scripts.users-scripts.delete-users') --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection
