<!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <div class="image_upload_div">
                        <form action="upload.php" class="dropzone">
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <span onclick="reload_and_close_modal(this.id);"
    class="close" title="Close Modal" id="manu">&times;</span>
                    <button type="button" onclick="reload_and_close_modal(this.id);" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>