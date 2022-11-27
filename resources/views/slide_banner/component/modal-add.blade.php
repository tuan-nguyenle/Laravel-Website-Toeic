<div class="modal" id="modalAddBanner">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="post" id="addNewBanner" action="{{ route('slide_banner.add') }}" name="addNewBanner"
                enctype="multipart/form-data">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-3 mt-2">
                            <label for="txtTitle">Title</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="txtTitle" id="txtTitle" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 mt-2">
                            <label for="txtContent">Content</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="txtContent" id="txtContent" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 mt-2">
                            <label for="fileImage">Image Banner</label>
                        </div>
                        <div class="col-9">
                            <input type="file" name="fileImage" id="fileImage" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div id="slideBanner" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-inner" id="previewAdd">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block text-white"
                                        style="background: rgba(0,0,0,.8);">
                                        <strong>First slide label</strong>
                                        <br>
                                        <i>Some representative placeholder content for the first slide.</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    const input = document.getElementById('fileImage');
    const previewAdd = $('#slideBanner');
    const image = $('#previewAdd div img');
    const title = $('#previewAdd div div strong');
    const content = $('#previewAdd div div i');
    input.addEventListener('change', (e) => {
        var reader = new FileReader();

        reader.onload = function(e) {
            image.attr('src', e.target.result);
            content.text($('#txtContent').val());
            title.text($('#txtTitle').val());
            previewAdd.show();
        };

        reader.readAsDataURL(input.files[0]);
    });

    $(document).ready(function($) {
        $('#addNewBanner').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('slide_banner.add') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (response) => {
                    alert('Add New Slide Banner Success');
                    this.reset();
                },
                error: function(response) {
                    alert(response.status);
                }
            });
        })
    });
</script>
