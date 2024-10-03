@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <h5 class="card-title fw-bold">My Account - [Password Credentials]</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <!-- Account Password-->
                                        <div class="card-body pt-0">
                                            <form action="{{ route('my-account-change-password', ['id' => $id]) }}" method="POST">
                                                @csrf
                                                @method('PUT') <!-- This tells Laravel to treat the form as a PUT request -->

                                                <div class="row mt-1 g-5">
                                                    <!-- Current Password -->
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control @error('currentPassword') is-invalid @enderror" type="password" name="currentPassword" id="currentPassword" required>
                                                            <label for="currentPassword">Current Password</label>
                                                            @error('currentPassword')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- New Password -->
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control @error('newpassword') is-invalid @enderror" type="password" name="newpassword" id="newpassword" required>
                                                            <label for="newpassword">New Password</label>
                                                            @error('newpassword')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Confirm New Password -->
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control @error('newpassword_confirmation') is-invalid @enderror" type="password" name="newpassword_confirmation" id="newpassword_confirmation" required>
                                                            <label for="newpassword_confirmation">Confirm New Password</label>
                                                            @error('newpassword_confirmation')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mt-6 d-flex align-items-start align-items-sm-center gap-6">
                                                        <div class="ms-auto">
                                                            <button type="submit" class="btn btn-info waves-effect waves-light">Save Changes</button>
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
