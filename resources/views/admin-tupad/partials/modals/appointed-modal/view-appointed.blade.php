<div class="modal fade" id="fullscreenModal{{ $official->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="modalFullTitle"><b>{{ $official->name }}
                        {{ $official->surname }}</b> Infomation</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <img class="card-img " style="height: 500px;"
                                            src="{{ asset('storage/uploads/image/' . $official->image) }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="{{ $official->name }}" />
                                                <label for="nameWithTitle">Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6 mt-2">
                                            <div class="form-floating form-floating-outline">
                                                @if ($official->middle_name)
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        disabled value="{{ $official->middle_name }}" />
                                                    <label for="nameWithTitle">Initial</label>
                                            </div>
                                        @else
                                            <input type="text" id="nameWithTitle" class="form-control" disabled
                                                value="-" />
                                            <label for="nameWithTitle">Initial</label>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-6 mt-2">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="nameWithTitle" class="form-control" disabled
                                                value="{{ $official->surname }}" />
                                            <label for="nameWithTitle">Surname</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-6 mt-2">
                                        @if ($official->suffix)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="{{ $official->suffix }}" />
                                                <label for="nameWithTitle">Suffix</label>
                                            </div>
                                        @else
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="-" />
                                                <label for="nameWithTitle">Suffix</label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-6 mt-2">
                                        @if ($official->position == 5)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="Barangay Treasurer" />
                                                <label for="nameWithTitle">Position</label>
                                            </div>
                                        @elseif ($official->position == 6)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="Barangay Secretary" />
                                                <label for="nameWithTitle">Position</label>
                                            </div>
                                        @elseif ($official->position == 7)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="SK Treasuser" />
                                                <label for="nameWithTitle">Position</label>
                                            </div>
                                        @elseif ($official->position == 8)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="SK Secretary" />
                                                <label for="nameWithTitle">Position</label>
                                            </div>
                                        @elseif ($official->position == 9)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="BHW" />
                                                <label for="nameWithTitle">Position</label>
                                            </div>
                                        @elseif ($official->position == 10)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control" disabled
                                                    value="BHW" />
                                                <label for="nameWithTitle">Position</label>
                                            </div>
                                        @elseif ($official->position == 11)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control"
                                                    disabled value="Lupon" />
                                                <label for="nameWithTitle">Position</label>
                                            </div>
                                        @elseif ($official->position == 12)
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nameWithTitle" class="form-control"
                                                    disabled value="Tanod" />
                                                <label for="nameWithTitle">Position</label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-6 mt-2">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="nameWithTitle" class="form-control"
                                                placeholder="Fill Surname" name="barangay" disabled
                                                value="{{ $official->barangay }}" />
                                            <label for="nameWithTitle">Barangay</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
        </div>
    </div>
</div>
</div>
