@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <hr class="my-6" />
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-end">
                            <h5 class="card-title fw-bold">TUPAD APPLICANT</h5>
                            <div class="mt-4 ms-auto">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-round  btn-secondary waves-effect"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-external-link-line ri-16px me-1_5"></i>
                                        Export
                                        <i class="ri-arrow-down-s-line ri-16px mx-1_5"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item waves-effect"
                                                href="{{ route('tupad-applicant.print') }}">
                                                <i class="ri-printer-line ri-16px me-1_5 text-info"></i>
                                                Print
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item waves-effect" href="{{ url('/export-motorized') }}">
                                                <i class="ri-file-excel-line ri-16px me-1_5 text-success"></i>
                                                Excel
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item waves-effect text-dark removed" type="submit">
                                                <i class="ri-delete-bin-line ri-16px me-1_5 text-danger"></i>
                                                Remove
                                            </a>
                                        </li>
                                    </ul>
                                    @include('admin-tupad.partials.scripts.remove-scripts.remove')
                                    <button type="button" class="btn btn-success waves-effect waves-light"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScroll"
                                        aria-controls="offcanvasScroll">
                                        <i class="ri-user-add-line ri-16px me-1_5"></i>Add Applicant
                                    </button>
                                </div>
                            </div>
                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                tabindex="-1" id="offcanvasScroll" aria-labelledby="offcanvasScrollLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasScrollLabel" class="offcanvas-title">
                                        Add TUPAD Applicant
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                @include('admin-tupad.partials.scripts.officials-scripts.success-officials')
                                @include('admin-tupad.partials.scripts.verification.verify-applicant ')

                                <form action="{{ route('tupad-applicant.store') }}" method="POST">
                                    @csrf
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <div class="col mb-6">
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
                                                        name="initial"
                                                        placeholder="Fill the initials of the brgy. captain " />
                                                    <label for="nameWithTitle">Initial</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        name="surname"
                                                        placeholder="Fill the surname of the brgy. captain " required />
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

                                        <button type="submit" class="btn btn-success mb-2 d-grid w-100">Verify</button>
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
                                        <th>Name</th>
                                        <th>Initial</th>
                                        <th>Surname</th>
                                        <th>Suffix</th>
                                        <th>Barangay</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Initial</th>
                                        <th>Surname</th>
                                        <th>Suffix</th>
                                        <th>Barangay</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($applicants as $applicant)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $applicant->name }}</td>
                                            <td>
                                                @if ($applicant->initial)
                                                    {{ $applicant->initial }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $applicant->surname }}</td>
                                            <td>
                                                @if ($applicant->suffix)
                                                    {{ $applicant->suffix }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $applicant->barangay }}</td>
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
