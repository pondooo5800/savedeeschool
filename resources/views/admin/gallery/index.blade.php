@extends('layouts.master')

@section('title')
ตั้งค่า Gallery | {{ config('settings.name', 'Laravel') }}
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
<style>
    .dropzone {
        border: 2px dashed #dedede;
        border-radius: 5px;
        background: #f5f5f5;
    }

    .dropzone i {
        font-size: 5rem;
    }

    .dropzone .dz-message {
        color: rgba(0, 0, 0, .54);
        font-weight: 500;
        font-size: initial;
        text-transform: uppercase;
    }
</style>
@endsection
@section('content')
<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('gallery-delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <input name="id" type="hidden" id="delete_id">
                <div class="modal-body">
                    คุณแน่ใจหรือว่าต้องการลบ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-darken">ตกลง</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <label>ลากและวางหลายภาพ (JPG, JPEG, PNG, .webp) <span class="text-danger">อัปโหลดสูงสุดได้ 10 ไฟล์</span></label>
                    <form action="{{ url('gallery-update') }}" method="POST" enctype="multipart/form-data"
                        class="dropzone" id="myDragAndDropUploader">
                        @csrf
                        <div class="dz-message d-flex flex-column">
                            <i class="material-icons text-muted">cloud_upload</i>
                            Drag &amp; Drop here or click
                        </div>
                    </form>
                    <h5 class="text-success" id="message"></h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="location.reload()">ปิด</button>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h2 class="card-title"><i class="material-icons">settings</i> Gallery</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-darken" data-toggle="modal" data-target="#addModal"
                        data-whatever="@mdo"><i class="material-icons">add</i> เพิ่ม Gallery</button>
                </div>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="row">
                    @foreach ($gallerys ?? '' as $row)
                   <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="card border shadow p-2 d-flex flex-column align-items-center" style="height: 250px;">
                        <img src="{{ asset($row->image) }}" class="img-fluid" style="object-fit: cover; max-width: 100%; height: 100%;"
                            alt="Img">
                            <br>
                        <a href="#" type="button" data-id="{{$row->id}}" class="deletebtn text-danger">ลบ</a>
                    </div>
                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
<script>
    var maxFilesizeVal = 12;
    var maxFilesVal = 10;

    // Note that the name "myDragAndDropUploader" is the camelized id of the form.
    Dropzone.options.myDragAndDropUploader = {

    paramName:"file",
    maxFilesize: maxFilesizeVal, // MB
    maxFiles: maxFilesVal,
    resizeQuality: 1.0,
    acceptedFiles: ".jpeg,.jpg,.png,.webp",
    addRemoveLinks: false,
    timeout: 60000,
    dictDefaultMessage: "Drop your files here or click to upload",
    dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
    dictFileTooBig: "File is too big. Max filesize: "+maxFilesizeVal+"MB.",
    dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
    dictMaxFilesExceeded: "You can only upload up to "+maxFilesVal+" files.",
    maxfilesexceeded: function(file) {
    this.removeFile(file);
    // this.removeAllFiles();
    },
    sending: function (file, xhr, formData) {
    $('#message').text('Image Uploading...');
    },
    success: function (file, response) {
    $('#message').text(response.success);
    console.log(response.success);
    console.log(response);
    },
    error: function (file, response) {
    $('#message').text('Something Went Wrong! '+response);
    console.log(response);
    return false;
    }
    };
    $(document).on('click', '.deletebtn', function() {
    var v_id = $(this).data('id');
    $('#deletemodal').modal('show');
    $('#delete_id').val(v_id);
    });
</script>
@endsection