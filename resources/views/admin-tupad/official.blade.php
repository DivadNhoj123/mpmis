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
                            <h5 class="card-title fw-bold">BARANGAY OFFICIALS RECORDS</h5>

                            <div class="ms-auto">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-toggle="modal"
                                        data-bs-target="#UploadExcelElected">
                                        <i class="ri-file-excel-line ri-16px me-1_5"></i>Upload Excel</button>
                                        @include('admin-tupad.partials.modals.upload-elected-excel')
                                    <button type="button" class="btn btn-success waves-effect" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasScroll" aria-controls="offcanvasScroll"> <i
                                            class="ri-user-add-line ri-16px me-1_5"></i>Add
                                        Record
                                    </button>
                                </div>
                            </div>
                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                tabindex="-1" id="offcanvasScroll" aria-labelledby="offcanvasScrollLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasScrollLabel" class="offcanvas-title">
                                        Add Barangay Captain
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('barangay-officials.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <div class="mb-4">
                                            <label for="formFile" class="form-label">
                                                Upload Avatar Image
                                            </label>
                                            <input class="form-control" type="file" id="formFile" name="image">
                                        </div>
                                        <div class="row">
                                            <div class="col  mt-2 mb-6">
                                                <div class="form-floating form-floating-outline form-floating-select2">
                                                    <select id="select2Basic" class="select2 form-select form-select-lg"
                                                        data-allow-clear="true" name="barangay">
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
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        name="name" placeholder="Fill the name of the brgy. captain "
                                                        required />
                                                    <label for="nameWithTitle">Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        name="middle_name"
                                                        placeholder="Fill the initials of the brgy. captain " />
                                                    <label for="nameWithTitle">Initial</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        name="surname" placeholder="Fill the surname of the brgy. captain "
                                                        required />
                                                    <label for="nameWithTitle">Surname</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        name="suffix"
                                                        placeholder="Fill the suffix of the brgy. captain " />
                                                    <label for="nameWithTitle">Suffix</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        name="barangay" placeholder="Fill the address of the brgy. captain "
                                                        required />
                                                    <label for="nameWithTitle">Barangay</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <select id="largeSelect" class="form-select form-select-md" name="position"
                                                    required>
                                                    <option disabled>Select Position</option>
                                                    <option value="1">Barangay Captain</option>
                                                    <option value="2">Barangay Kagawad</option>
                                                    <option value="3">SK Chairman</option>
                                                    <option value="4">SK Kagawad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-2 d-grid w-100">Save
                                        </button>
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
                                        <th>Name</th>
                                        <th>Initial</th>
                                        <th>Surname</th>
                                        <th>Suffix</th>
                                        <th>Position</th>
                                        <th>Barangay</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Initial</th>
                                        <th>Surname</th>
                                        <th>Suffix</th>
                                        <th>Position</th>
                                        <th>Barangay</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($officials as $official)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center user-name">
                                                    <div class="avatar-wrapper">
                                                        @if ($official)
                                                            <div class="avatar me-2"><img
                                                                    src="{{ asset('storage/uploads/images/' . $official->image) }}"
                                                                    alt="title" class="imagecheck-image">
                                                            </div>
                                                        @elseif($official === null)
                                                            <div class="avatar me-2"><img
                                                                    src="{{ asset('storage/uploads/image/1.jpg') }}"
                                                                    alt="title" class="imagecheck-image">
                                                            </div>
                                                        @else
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $official->name }}</td>
                                            <td>
                                                @if ($official->middle_name)
                                                    {{ $official->middle_name }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $official->surname }}</td>
                                            <td>
                                                @if ($official->suffix)
                                                    {{ $official->suffix }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($official->position == 1)
                                                    Barangay Captain
                                                @elseif ($official->position == 2)
                                                    Barangay Kagawad
                                                @elseif ($official->position == 3)
                                                    SK Chairman
                                                @elseif ($official->position == 4)
                                                    SK Kagawad
                                                @endif
                                            </td>
                                            <td>{{ $official->barangay }}</td>
                                            <td>
                                                <a type="button" class="btn btn-icon btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#fullscreenModal{{ $official->id }}">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                @include('admin-tupad.partials.modals.officials-modal.view-officials')
                                                <a type="button" class="btn btn-icon btn-warning "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit-modal{{ $official->id }}">
                                                    <i class="ri-edit-box-line"></i>
                                                </a>
                                                @include('admin-tupad.partials.modals.officials-modal.edit-officials')
                                                <a type="button" class="btn btn-icon btn-danger delete"
                                                    data-id="{{ $official->id }}" data-name="{{ $official->name }}">
                                                    <i class="ri-delete-bin-fill"></i>
                                                </a>
                                                @include('admin-tupad.partials.scripts.officials-scripts.success-officials')
                                                @include('admin-tupad.partials.scripts.officials-scripts.delete-officials')
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
