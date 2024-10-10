<div class="modal fade" id="edit{{ $gear->id }}" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <form class="modal-content" action="{{ route('fishing-gear.update', $gear->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">{{ $gear->owner }} Registration Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8 mb-6 mt-2">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="name" class="form-control" placeholder="Enter Name"
                                name="owner" value="{{ $gear->owner }}" disabled>
                            <label for="name">Name of Owner</label>
                        </div>
                    </div>
                    <div class="col-4 mb-6 mt-2">
                        <div class="form-floating form-floating-outline form-floating-select2">
                            <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true"
                                name="address">
                                <option value="{{ $gear->address }}"  selected>{{ $gear->address }}
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
                                placeholder="Enter tax certificate number" name="tax_cert"
                                value="{{ $gear->tax_cert_no }}" disabled>
                            <label for="tax_cert">Tax Certificate Number</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="date" id="dobBackdrop" class="form-control" name="date_issued"
                                value="{{ $gear->date_issued }}" disabled>
                            <label for="dobBackdrop">Date Issued</label>
                        </div>
                    </div>
                    <div class="col-4 mb-6 ">
                        <div class="form-floating form-floating-outline form-floating-select2">
                            <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true"
                                name="place_issued">
                                <option value="{{ $gear->place_issued }}"  selected>{{ $gear->place_issued }}
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
                                placeholder="Enter name of the fishing gear" name="fishing_gear"
                                value="{{ $gear->fishing_gear }}" disabled>
                            <label for="fishing_gear">Name of Fishing Gear</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="specs" class="form-control"
                                placeholder="Enter fishing gear specifications" name="specs"
                                value="{{ $gear->specs }}" disabled>
                            <label for="specs">Fishing Gear Specifications</label>
                        </div>
                    </div>
                </div>
                <strong class="display 4">If Nets:</strong>
                <div class="row">
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="net_length" class="form-control"
                                placeholder="Enter exact net length" name="net_length"
                                value="{{ $gear->net_length }}" disabled>
                            <label for="net_length">Length</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="net_heigth" class="form-control"
                                placeholder="Enter exact net heigth/depth" name="net_heigth"
                                value="{{ $gear->net_depth }}" disabled>
                            <label for="net_heigth">Heigth/Depth</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="net_mesh" class="form-control"
                                placeholder="Enter exact net mesh" name="net_mesh"
                                value="{{ $gear->net_mesh_size }}" disabled>
                            <label for="net_mesh">Mesh Sized</label>
                        </div>
                    </div>
                </div>
                <strong class="display 4">If Traps:</strong>
                <div class="row">
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="trap_length" class="form-control"
                                placeholder="Enter exact trap length" name="trap_length"
                                value="{{ $gear->trap_length }}" disabled>
                            <label for="trap_length">Length(feet)</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="trap_heigth" class="form-control"
                                placeholder="Enter trap heigth/depth" name="trap_heigth"
                                value="{{ $gear->trap_height }}" disabled>
                            <label for="trap_heigth">Heigth/Depth(feet)</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="trap_width" class="form-control"
                                placeholder="Enter exact trap width" name="trap_width"
                                value="{{ $gear->trap_width }}" disabled>
                            <label for="trap_width">Width(feet)</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="trap_mesh" class="form-control"
                                placeholder="Enter exact trap mesh size" name="trap_mesh"
                                value="{{ $gear->trap_mesh_size }}" disabled>
                            <label for="trap_mesh">Mesh Sized</label>
                        </div>
                    </div>
                </div>
                <strong class="display 4">If Hooks and Line:</strong>
                <div class="row">
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="nylon" class="form-control"
                                placeholder="Enter exact nylon number" name="nylon" value="{{ $gear->nylon }}"
                                disabled>
                            <label for="nylon">Number of Nylon</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="hook_size" class="form-control"
                                placeholder="Enter exact hook size" name="hook_size" value="{{ $gear->hook_size }}"
                                disabled>
                            <label for="hook_size">Size of Hooks</label>
                        </div>
                    </div>
                    <div class="col mb-6">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="hook_no" class="form-control"
                                placeholder="Enter exact hooks number" name="hook_no" value="{{ $gear->hook_no }}"
                                disabled>
                            <label for="hook_no">Number of Hooks</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit and Save Buttons -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" id="edit-btn{{ $gear->id }}" class="btn btn-info">Edit</button>
                <button type="submit" id="save-btn{{ $gear->id }}" class="btn btn-primary d-none">Save</button>
            </div>
            <!-- Script to toggle edit mode -->
            <script>
                document.getElementById('edit-btn{{ $gear->id }}').addEventListener('click', function() {
                    // Enable all input fields
                    document.querySelectorAll('input, select').forEach(function(element) {
                        element.removeAttribute('disabled');
                    });

                    // Toggle visibility of buttons
                    document.getElementById('edit-btn{{ $gear->id }}').classList.add('d-none');
                    document.getElementById('save-btn{{ $gear->id }}').classList.remove('d-none');
                });
            </script>
        </form>
    </div>
</div>
