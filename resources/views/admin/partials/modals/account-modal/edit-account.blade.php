<div class="modal fade" id="edit-modal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="modalFullTitle">Edit <b>{{ $user->name }}
                        {{ $user->surname }}</b>
                    Infomation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <img class="card-img " style="height:200px"
                                        src="{{ asset('storage/uploads/images/' . $user->image) }}"
                                        alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col mb-6 mt-2">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="nameWithTitle" class="form-control"
                                                placeholder="Fill Name" name="name" value="{{ $user->name }}" />
                                            <label for="nameWithTitle">Full name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-6 mt-2">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="nameWithTitle" class="form-control"
                                                placeholder="Fill Name" name="email" value="{{ $user->email }}" />
                                            <label for="nameWithTitle">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-6 mt-2">
                                        <div class="form-floating form-floating-outline">
                                            <select id="largeSelect" class="form-select form-select-md text-center"
                                                name="role" required>
                                                @if ($user->role == 1)
                                                <option value="{{ $user->role }}" selected>TUPAD / PESO</option>
                                                <option value="2">DEPARTMENT OF AGRICULTURE</option>
                                                <option value="3">ACAP</option>
                                                @elseif ($user->role == 2)
                                                <option value="{{ $user->role }}" selected>DEPARTMENT OF AGRICULTURE</option>
                                                <option value="1">TUPAD / PESO</option>
                                                <option value="3">ACAP</option>
                                                @elseif ($use->role == 3)
                                                <option value="{{ $user->role }}" selected>ACAP</option>
                                                <option value="2">>DEPARTMENT OF AGRICULTURE</option>
                                                <option value="1">>TUPAD / PESO</option>
                                                @endif
                                            </select>
                                            <label for="defaultFormControlInput" class="form-label">
                                                Department | Office
                                            </label>
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
