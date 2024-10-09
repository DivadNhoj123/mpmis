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
                            <h5 class="card-title fw-bold text-uppercase">Non - Motorized Fishing Boats Records</h5>
                            <div class="ms-auto">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="ri-external-link-line ri-16px me-1_5"></i>
                                        Export
                                        <i class="ri-arrow-down-s-line ri-16px mx-1_5"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item waves-effect" href="{{route('non-motorized-print')}}">
                                                <i class="ri-printer-line ri-16px me-1_5"></i>
                                                Print
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item waves-effect" href="{{ url('/export-non-motorized') }}">
                                                <i class="ri-file-excel-line ri-16px me-1_5"></i>
                                                Excel
                                            </a>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-success waves-effect" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasScroll" aria-controls="offcanvasScroll"> <i
                                            class="ri-add-circle-line ri-16px me-1_5"></i>Register
                                    </button>
                                </div>
                            </div>
                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                tabindex="-1" id="offcanvasScroll" aria-labelledby="offcanvasScrollLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasScrollLabel" class="offcanvas-title">
                                        Register Non - Motorized Boat
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <form id="nonMotorizedForm" action="{{ route('agriculture-non-motorized.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0"
                                        style="max-height: 90vh; overflow-y: auto;">
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        name="owner" placeholder="Fill owner / operetor" required />
                                                    <label for="nameWithTitle">Name of Owner / Operator</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col  mt-2 mb-6">
                                                <div class="form-floating form-floating-outline form-floating-select2">
                                                    <select id="select2Basic" class="select2 form-select form-select-lg"
                                                        data-allow-clear="true" name="address">
                                                        <option value="" disabled selected>Select Barangay</option>
                                                        <option value="Abgao">Abgao</option>
                                                        <option value="Aurora">Aurora</option>
                                                        <option value="Benit">Benit</option>
                                                        <option value="Caaga">Caaga</option>
                                                        <option value="Cabul-anonan">Cabul-anonan (Poblacion)
                                                        </option>
                                                        <option value="Cadaruhan">Cadaruhan</option>
                                                        <option value="Candatag">Candatag</option>
                                                        <option value="Cantamuac">Cantamuac</option>
                                                        <option value="Caraatan">Caraatan</option>
                                                        <option value="Concepcion">Concepcion</option>
                                                        <option value="Guinabonan">Guinabonan</option>
                                                        <option value="Iba">Iba</option>
                                                        <option value="Lambonao">Lambonao</option>
                                                        <option value="Maningning">Maningning</option>
                                                        <option value="Maujo">Maujo</option>
                                                        <option value="Pasil">Pasil (Poblacion)</option>
                                                        <option value="Sabang">Sabang</option>
                                                        <option value="San Antonio">San Antonio (Poblacion)</option>
                                                        <option value="San Isidro">San Isidro</option>
                                                        <option value="Santo Niño">Santo Niño</option>
                                                        <option value="San Jose">San Jose</option>
                                                        <option value="San Roque">San Roque</option>
                                                        <option value="San Vicente">San Vicente</option>
                                                        <option value="Sangahon">Sangahon</option>
                                                        <option value="Santa Cruz">Santa Cruz</option>
                                                        <option value="Taliwa">Taliwa (Poblacion)</option>
                                                        <option value="Tigbawan I">Tigbawan I</option>
                                                        <option value="Tigbawan II">Tigbawan II</option>
                                                        <option value="Timba">Timba</option>
                                                        <option value="Asuncion">Asuncion</option>
                                                        <option value="Cadaruhan Sur">Cadaruhan Sur</option>
                                                        <option value="Fatima">Fatima</option>
                                                        <option value="Juangon">Juangon</option>
                                                        <option value="Kauswagan">Kauswagan</option>
                                                        <option value="Mahayahay">Mahayahay</option>
                                                        <option value="New Katipunan">New Katipunan</option>
                                                        <option value="Pancil">Pancil</option>
                                                    </select>
                                                    <label for="select2Basic">Barangay</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="registrationNo"
                                                        class="form-control @error('registration_no') is-invalid @enderror"
                                                        name="registration_no" value="{{ old('registration_no') }}"
                                                        placeholder="Fill registration number" required />
                                                    <label for="registrationNo">Registration Number</label>
                                                    @error('registration_no')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="number" id="emailWithTitle" class="form-control"
                                                        name="fisherfolk_id" placeholder="Fill fisherfolks ID" required />
                                                    <label for="emailWithTitle">Fisherfolk's ID</label>
                                                </div>
                                            </div>
                                            <div class="col mb-6 mt-2">
                                                <select id="largeSelect" class="form-select form-select-md text-center"
                                                    name="remarks" required>
                                                    <option selected disabled>Select Status</option>
                                                    <option value="unissued">Unissued</option>
                                                    <option value="issued">Issued</option>
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
                                        <th>Owner</th>
                                        <th>Address</th>
                                        <th>Registration_No.</th>
                                        <th>Status</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Owner</th>
                                        <th>Address</th>
                                        <th>Registration_No.</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($registers as $register)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $register->owner }}</td>
                                            <td>{{ $register->address }}</td>
                                            <td>{{ $register->registration_no }}</td>
                                            <td>
                                                @php
                                                    $dateRegistered = \Carbon\Carbon::parse($register->date_registered);
                                                @endphp

                                                @if ($dateRegistered->year == now()->year)
                                                    <span class="badge bg-label-success text-uppercase">
                                                        Registered
                                                    </span>
                                                @else
                                                    <span class="badge bg-label-danger text-uppercase">
                                                        Expired
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group " role="group"
                                                    aria-label="Button group with nested dropdown">
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupDrop1" type="button"
                                                            class="btn btn-danger dropdown-toggle waves-effect btn-sm"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="d-none d-sm-block">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"
                                                            style="">
                                                            <a class="dropdown-item waves-effect"  data-bs-toggle="modal"
                                                            data-bs-target="#fullscreenModal{{ $register->id }}">
                                                                <i class="tf-icons ri-eye-line text-primary me-1"></i>
                                                                View| Edit
                                                            </a>
                                                            <hr class="dropdown-divider">
                                                            <a class="dropdown-item waves-effect renew"   data-id="{{$register->id}}"
                                                                data-owner="{{$register->owner}}"
                                                                data-registration="{{$register->registration_no}}"
                                                                data-serial="{{$register->engine_serial}}"
                                                                data-color="{{$register->color}}">
                                                                <i
                                                                    class="tf-icons ri-edit-box-line text-info me-1 "></i>
                                                                Renew
                                                            </a>
                                                        </div>
                                                        @include('admin-agriculture.partials.modals.boat-registration.non-boat-registration')

                                                    </div>
                                                </div>
                                            </td>
                                            @include('admin-agriculture.partials.scripts.non-motorized')
                                            @include('admin-tupad.partials.scripts.officials-scripts.success-officials')
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
