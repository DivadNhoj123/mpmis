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
                            <h5 class="card-title fw-bold text-uppercase">Fishing Gear Records</h5>
                            <div class="ms-auto">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-success waves-effect" data-bs-toggle="modal"
                                        data-bs-target="#register"> <i
                                            class="ri-add-circle-line ri-16px me-1_5"></i>Register
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="register" data-bs-backdrop="static">
                                <div class="modal-dialog modal-xl">
                                    <form class="modal-content" action="{{ route('fishing-gear.store') }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Fishing Gear Registration</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-8 mb-6 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="name" class="form-control"
                                                            placeholder="Enter Name" name="owner">
                                                        <label for="name">Name of Owner</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 mb-6 mt-2">
                                                    <div class="form-floating form-floating-outline form-floating-select2">
                                                        <select id="select2Basic" class="select2 form-select form-select-lg"
                                                            data-allow-clear="true" name="address">
                                                            <option value="" disabled selected>Select Barangay
                                                            </option>
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
                                                        <label for="select2Basic">Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="taxt_cert" class="form-control"
                                                            placeholder="Enter tax certificate number" name="tax_cert">
                                                        <label for="tax_cert">Tax Certificate Number</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="date" id="dobBackdrop" class="form-control"
                                                            name="date_issued">
                                                        <label for="dobBackdrop">Date Issued</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 mb-6 ">
                                                    <div class="form-floating form-floating-outline form-floating-select2">
                                                        <select id="select2Basic"
                                                            class="select2 form-select form-select-lg"
                                                            data-allow-clear="true" name="place_issued">
                                                            <option value="" disabled selected>Select Barangay
                                                            </option>
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
                                                        <label for="select2Basic">Place Issued</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="fishing_gear" class="form-control"
                                                            placeholder="Enter name of the fishing gear"
                                                            name="fishing_gear">
                                                        <label for="fishing_gear">Name of Fishing Gear</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="specs" class="form-control"
                                                            placeholder="Enter fishing gear specifications"
                                                            name="specs">
                                                        <label for="specs">Fishing Gear Specifications</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <strong class="display 4">If Nets:</strong>
                                            <div class="row">
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="net_length" class="form-control"
                                                            placeholder="Enter exact net length" name="net_length">
                                                        <label for="net_length">Length</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="net_heigth" class="form-control"
                                                            placeholder="Enter exact net heigth/depth" name="net_depth">
                                                        <label for="net_heigth">Heigth/Depth</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="net_mesh" class="form-control"
                                                            placeholder="Enter exact net mesh" name="net_mesh">
                                                        <label for="net_mesh">Mesh Sized</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <strong class="display 4">If Traps:</strong>
                                            <div class="row">
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="trap_length" class="form-control"
                                                            placeholder="Enter exact trap length" name="trap_length">
                                                        <label for="trap_length">Length(feet)</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="trap_heigth" class="form-control"
                                                            placeholder="Enter trap heigth/depth" name="trap_height">
                                                        <label for="trap_heigth">Heigth/Depth(feet)</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="trap_width" class="form-control"
                                                            placeholder="Enter exact trap width" name="trap_width">
                                                        <label for="trap_width">Width(feet)</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="trap_mesh" class="form-control"
                                                            placeholder="Enter exact trap mesh size" name="trap_mesh">
                                                        <label for="trap_mesh">Mesh Sized</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <strong class="display 4">If Hooks and Line:</strong>
                                            <div class="row">
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="nylon" class="form-control"
                                                            placeholder="Enter exact nylon number" name="nylon">
                                                        <label for="nylon">Number of Nylon</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="hook_size" class="form-control"
                                                            placeholder="Enter exact hook size" name="hook_size">
                                                        <label for="hook_size">Size of Hooks</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="hook_no" class="form-control"
                                                            placeholder="Enter exact hooks number" name="hook_no">
                                                        <label for="hook_no">Number of Hooks</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary waves-effect"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Save</button>
                                        </div>
                                    </form>
                                </div>
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
                                        <th>Commu. Tax Cert_no</th>
                                        <th>Fishing Gear</th>
                                        <th>Gear Specs.</th>
                                        <th>Date Issued</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Owner</th>
                                        <th>Address</th>
                                        <th>Commu. Tax Cert_no</th>
                                        <th>Fishing Gear</th>
                                        <th>Gear Specs.</th>
                                        <th>Date Issued</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($gears as $gear)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $gear->owner }}</td>
                                            <td>{{ $gear->address }}</td>
                                            <td>{{ $gear->tax_cert_no }}</td>
                                            <td>{{ $gear->fishing_gear }}</td>
                                            <td>{{ $gear->specs }}</td>
                                            <td>{{ $gear->date_issued }}</td>
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
                                                            <a class="dropdown-item waves-effect" data-bs-toggle="modal"
                                                                data-bs-target="#edit{{$gear->id}}">
                                                                <i class="tf-icons ri-eye-line text-primary me-1"></i>
                                                                View| Edit
                                                            </a>
                                                            <hr class="dropdown-divider">
                                                            <a class="dropdown-item waves-effect"
                                                                href="{{ route('print-registration',$gear->id)}}">
                                                                <i class="tf-icons ri-printer-line text-info me-1"></i>
                                                                Print
                                                            </a>
                                                            <hr class="dropdown-divider">
                                                            <a class="dropdown-item waves-effect delete" data-id="{{$gear->id}}" href="javascript:void(0);">
                                                                <i class="tf-icons ri-delete-bin-line text-danger me-1"></i>
                                                                Delete
                                                            </a>
                                                        </div>
                                                        @include('admin-agriculture.partials.modals.fishing-gear.fishing-gear')
                                                    </div>
                                                </div>
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
        @include('admin-agriculture.partials.scripts.fishing-gear')
        @include('admin-tupad.partials.scripts.officials-scripts.success-officials')
        <div class="content-backdrop fade"></div>
    </div>
@endsection
