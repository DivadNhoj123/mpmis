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
                                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                                <div class="row mt-1 g-5">
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control" type="password"
                                                                name="currentPassword">
                                                            <label for="name">Current Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control" type="password" name="newpassword">
                                                            <label for="lastName">New Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mt-6 d-flex align-items-start align-items-sm-center gap-6">
                                                        <div class="ms-auto">
                                                            <button type="submit"
                                                                class="btn btn-info waves-effect waves-light">Save Changes</button>
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
