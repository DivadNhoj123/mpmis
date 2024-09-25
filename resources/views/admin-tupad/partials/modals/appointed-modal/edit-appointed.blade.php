<div class="modal fade" id="edit-modal{{ $official->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="modalFullTitle">Edit <b>{{ $official->name }}
                        {{ $official->surname }}</b>
                    Infomation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('appointed-officials.update', $official->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                                <label for="formFile" class="form-label">Upload New officials
                                                    Image</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="image">
                                                <input type="hidden" name="recent_image"
                                                    value="{{ $official->image }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        placeholder="Fill Name" name="name"
                                                        value="{{ $official->name }}" />
                                                    <label for="nameWithTitle">Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                @if ($official->middle_name)
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="nameWithTitle" class="form-control"
                                                            placeholder="Fill Initial" name="middle_name"
                                                            value="{{ $official->middle_name }}" />
                                                        <label for="nameWithTitle">Initial</label>
                                                    </div>
                                                @else
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="nameWithTitle" class="form-control"
                                                            placeholder="Fill Initial" name="middle_name"
                                                            value="-" />
                                                        <label for="nameWithTitle">Initial</label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        placeholder="Fill Surname" name="surname"
                                                        value="{{ $official->surname }}" />
                                                    <label for="nameWithTitle">Surname</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                @if ($official->suffix)
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="nameWithTitle" class="form-control"
                                                            placeholder="Fill Suffix" name="suffix"
                                                            value="{{ $official->suffix }}" />
                                                        <label for="nameWithTitle">Suffix</label>
                                                    </div>
                                                @else
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="nameWithTitle" class="form-control"
                                                            placeholder="Fill Suffix" name="suffix" value="-" />
                                                        <label for="nameWithTitle">Suffix</label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <select id="largeSelect" class="form-select form-select-md"
                                                        name="position" required>
                                                        @if ($official->position == 5)
                                                            <option value="5">Barangay Treasurer</option>
                                                            <option value="6" selected>Barangay Secretary</option>
                                                            <option value="7">SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9">BHW</option>
                                                            <option value="10">BNS</option>
                                                            <option value="11">Lupon</option>
                                                            <option value="12">Tanod</option>
                                                        @elseif ($official->position == 6)
                                                            <option value="5">Barangay Treasurer
                                                            </option>
                                                            <option value="6" selected>Barangay Secretary
                                                            </option>
                                                            <option value="7">SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9">BHW</option>
                                                            <option value="10">BNS</option>
                                                            <option value="11">Lupon</option>
                                                            <option value="12">Tanod</option>
                                                        @elseif ($official->position == 7)
                                                            <option value="5">Barangay Treasurer
                                                            </option>
                                                            <option value="6">Barangay Secretary
                                                            </option>
                                                            <option value="7" selected>SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9">BHW</option>
                                                            <option value="10">BNS</option>
                                                            <option value="11">Lupon</option>
                                                            <option value="12">Tanod</option>
                                                        @elseif ($official->position == 8)
                                                            <option value="5">Barangay Treasurer
                                                            </option>
                                                            <option value="6">Barangay Secretary
                                                            </option>
                                                            <option value="7" selected>SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9">BHW</option>
                                                            <option value="10">BNS</option>
                                                            <option value="11">Lupon</option>
                                                            <option value="12">Tanod</option>
                                                        @elseif ($official->position == 9)
                                                            <option value="5">Barangay Treasurer
                                                            </option>
                                                            <option value="6">Barangay Secretary
                                                            </option>
                                                            <option value="7">SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9" selected>BHW</option>
                                                            <option value="10">BNS</option>
                                                            <option value="11">Lupon</option>
                                                            <option value="12">Tanod</option>
                                                        @elseif ($official->position == 10)
                                                            <option value="5">Barangay Treasurer
                                                            </option>
                                                            <option value="6">Barangay Secretary
                                                            </option>
                                                            <option value="7">SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9">BHW</option>
                                                            <option value="10" selected>BNS</option>
                                                            <option value="11">Lupon</option>
                                                            <option value="12">Tanod</option>
                                                        @elseif ($official->position == 11)
                                                            <option value="5">Barangay Treasurer
                                                            </option>
                                                            <option value="6">Barangay Secretary
                                                            </option>
                                                            <option value="7">SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9">BHW</option>
                                                            <option value="10">BNS</option>
                                                            <option value="11"selected>Lupon</option>
                                                            <option value="12">Tanod</option>
                                                        @elseif ($official->position == 12)
                                                            <option value="5">Barangay Treasurer
                                                            </option>
                                                            <option value="6">Barangay Secretary
                                                            </option>
                                                            <option value="7">SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9">BHW</option>
                                                            <option value="10">BNS</option>
                                                            <option value="11">Lupon</option>
                                                            <option value="12" selected>Tanod</option>
                                                        @else
                                                            <option value="5">Barangay Treasurer
                                                            </option>
                                                            <option value="6">Barangay Secretary
                                                            </option>
                                                            <option value="7">SK Kagawad</option>
                                                            <option value="8">SK Secretary</option>
                                                            <option value="9">BHW</option>
                                                            <option value="10">BNS</option>
                                                            <option value="11">Lupon</option>
                                                            <option value="12">Tanod</option>
                                                        @endif
                                                    </select>
                                                    <label for="nameWithTitle">Position</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-6 mt-2">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        placeholder="Fill Surname" name="barangay"
                                                        value="{{ $official->barangay }}" />
                                                    <label for="nameWithTitle">Barangay</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary update">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
