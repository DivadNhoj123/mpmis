<div class="modal fade" id="fullscreenModal{{ $register->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="card-text text-uppercase text-muted small">About</small>
                                <small class="card-text text-uppercase text-muted small">
                                    <button type="button" class="btn btn-info btn-sm" id="editBtn{{ $register->id }}">
                                        <i class="ri-file-edit-line ri-24px me-2"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm d-none done"
                                        id="doneBtn{{ $register->id }}" data-id="{{ $register->id }}">
                                        <i class="ri-check-line ri-24px me-2"></i>
                                        Done
                                    </button>
                                </small>
                            </div>
                            <ul class="list-unstyled my-3 py-1">
                                <li class="d-flex align-items-center mb-4">
                                    <i class="ri-user-3-line ri-24px me-2"></i>
                                    <div class="form-floating form-floating-outline w-100">
                                        <input type="text" id="owner{{ $register->id }}" class="form-control"
                                            name="owner" placeholder="Fill owner" required
                                            value="{{ $register->owner }}" disabled />
                                        <label for="owner">Owner</label>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-4">
                                    <i class="ri-map-pin-line ri-24px me-2"></i>
                                    <div class="form-floating form-floating-outline w-100">
                                        <input type="text" id="address{{ $register->id }}" class="form-control"
                                            name="address" placeholder="Fill address" required
                                            value="{{ $register->address }}" disabled />
                                        <label for="address">Address</label>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-4">
                                    <i class="ri-article-line ri-24px me-2"></i>
                                    <div class="form-floating form-floating-outline w-100">
                                        <input type="text" id="registration_number{{ $register->id }}"
                                            class="form-control" name="registration_number"
                                            placeholder="Fill registration number" required
                                            value="{{ $register->registration_no }}" disabled />
                                        <label for="registration_number">Registration Number</label>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-4">
                                    <i class="ri-pass-valid-line ri-24px me-2 pb-3"></i>
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline w-100">
                                                <input type="number" id="fisherfolk_id{{ $register->id }}"
                                                    class="form-control" name="fisherfolk_id"
                                                    placeholder="Fill fisherfolk's ID" required
                                                    value="{{ $register->fisherfolk_id }}" disabled />
                                                <label for="fisherfolk_id">Fisherfolk's ID</label>
                                            </div>
                                        </div>
                                        <div class="col mb-6 mt-2">
                                            <select id="remarks{{ $register->id }}"
                                                class="form-select form-select-md text-center" name="remarks" required
                                                disabled>
                                                <option disabled>Select Status</option>
                                                <option value="unissued"
                                                    {{ $register->remarks == 'unissued' ? 'selected' : '' }}>
                                                    Unissued</option>
                                                <option value="issued"
                                                    {{ $register->remarks == 'issued' ? 'selected' : '' }}>Issued
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <input type="hidden" name="date_registered" id="date_registered{{ $register->id }}"
                                    value="{{ $register->date_registered }}">
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
