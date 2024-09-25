<div class="modal fade" id="UploadExcelAppointed" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Upload Excel File</h5>
            </div>
            <form action="{{ route('import-appointed') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-6 mt-2">
                            <input class="form-control" type="file" id="formFile" name="file" accept=".xlsx,.xls">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reload" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

