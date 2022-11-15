<?php
    $title = 'Add New Exam';
?>

<?php $__env->startSection('css'); ?>
    <style>
        #uploadPreview {
            height: 350px;
            overflow-y: scroll;
        }

        #uploadPreview::-webkit-scrollbar {
            display: none;
        }

        .files-preview {
            display: block;
            justify-items: center;
        }

        .file-input-preview {
            display: flex;
            min-width: 162px;
            max-width: 162px;
            max-height: 210px;
            margin: 10px 10px 10px 10px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 10px 0 rgb(0 0 0 / 20%);
            padding: 6px;
            float: left;
            text-align: center;
        }

        .file-input-preview .upload-content img {
            min-width: 150px;
            max-width: 150px;
            min-height: 150px;
            max-height: 150px;
        }

        .file-input-preview .upload-content .upload-audio {
            min-width: 150px;
            max-width: 150px;
            min-height: 150px;
            max-height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .file-input-preview .upload-content .upload-audio img {
            min-width: 70px;
            max-width: 70px;
            min-height: 70px;
            max-height: 70px;
        }

        .file-input-preview .upload-content .upload-excel {
            min-width: 150px;
            max-width: 150px;
            min-height: 150px;
            max-height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .file-input-preview .upload-content .upload-excel img {
            min-width: 70px;
            max-width: 70px;
            min-height: 70px;
            max-height: 70px;
        }

        .file-input-preview .remove {
            transform: translateX(-40px);
            cursor: pointer;
            position: relative;
        }

        .file-input-preview .remove:hover {
            background: white;
            color: black;
        }

        .custom-file-upload {
            background: #f7f7f7;
            padding: 8px;
            border: 1px solid #e3e3e3;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .custom-file-upload::before {
            content: "\2329 \2329";
            margin-right: 10px;
        }

        .custom-file-upload::after {
            content: "\232A \232A";
            margin-left: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('status')): ?>
        <?php if(Session::get('status') == 0): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
                <i class="mdi mdi-alert-outline"></i>
                <strong style="padding-left: 10px;padding-right: 10px;">
                    <?php echo e(Session::get('message')); ?>

                </strong>
                <i class="mdi mdi-alert-outline"></i>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if(Session::get('status') == 1): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" role="alert">
                <i class="mdi mdi-check"></i>
                <strong style="padding-left: 10px;padding-right: 10px;">
                    <?php echo e(Session::get('message')); ?>

                </strong>
                <i class="mdi mdi-check"></i>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php $__errorArgs = ['filesMedia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php $__errorArgs = ['fileExcel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php $__errorArgs = ['txtDescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <form method="post" action="<?php echo e(route('exam.add')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-3 mt-2">
                <label for="txtDescription"><strong>Description</strong></label>
            </div>
            <div class="col-9">
                <input type="text" name="txtDescription" id="txtDescription" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-3 mt-2">
                <label for="level"><strong>Level</strong></label>
            </div>
            <div class="col-9">
                <input type="number" name="level" id="level" class="form-control">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3 mt-2">
                <label for="filesMedia"><strong>File</strong></label>
            </div>
            <div class="col-7">
                <input type="file" id="filesMedia" class="form-control choose-file" name="filesMedia[]"
                    multiple="multiple" required onchange="validateFiles()" />
            </div>
            <div class="col-2 d-flex justify-content-md-end overflow-hidden">
                <label for="fileExcel" class="custom-file-upload" id="fileExcel-label">
                    File Excel
                </label>
                <input name="fileExcel" type="file" id="fileExcel" style="display: none;" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="d-flex flex-wrap justify-content-center" id="uploadPreview">
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="reset" class="btn btn-dribbble" id="clear">Clear File</button>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        var files = [];

        function readFile(file) {
            var isNewFile = files
                .filter(function(x) {
                    return x.name === file.name;
                }).length === 0;
            if (isNewFile) {
                files.push(file);
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(_file) {
                    if (file.type == "image/png") {
                        $('#uploadPreview').append(
                            '<div class="file-input-preview"><div class="upload-content"><img class="files-preview" src="' +
                            _file.target.result + '" alt="' +
                            file.name +
                            '"><div class="upload-name">' +
                            file.name + '</div><div class="upload-size">' +
                            (file.size / 1024).toFixed(2) +
                            'kb</div></div><button class="remove btn btn-circle" data-name ="' +
                            file.name +
                            '"><i class="mdi mdi-close-circle"></i></button></div>'
                        );
                    }

                    if (file.type == "audio/mpeg") {
                        $('#uploadPreview').append(
                            '<div class="file-input-preview"><div class="upload-content"><div class="upload-audio"><img src="<?php echo e(asset('favicon/window-media-player.png')); ?>"></div><div class="upload-name">' +
                            file.name + '</div><div class="upload-size">' +
                            (file.size / 1024).toFixed(2) +
                            'kb</div></div><button class="remove btn btn-circle" data-name ="' +
                            file.name +
                            '"><i class="mdi mdi-close-circle"></i></button></div>'
                        );
                    }
                }
            } else {
                alert('Duplicate file: ' + file.name);
            }
        };
        $(document).on("click", ".remove", function() {
            $(this).parent(".file-input-preview").remove();
            files = files.filter(item => item.name !== this.dataset.name);
        });

        $(document).on("click", "#clear", function() {
            $('#uploadPreview').children().remove();
            files = [];
        });

        function validateFiles() {
            var filesMedia = document.getElementById('filesMedia');
            var filePath = filesMedia.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.mp3)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Please upload file having extensions .jpeg/.jpg/.png/.gif/.mp3 only.');
                return false;
            }
            Object.entries(filesMedia.files).filter(item => readFile(item[1]));
            var dataList = new DataTransfer();
            files.filter(item => dataList.items.add(item));
            filesMedia.files = dataList.files;
        }

        $('#fileExcel').change(function() {
            var allowedExtensions = /(\.xlsx)$/i;
            if (!allowedExtensions.exec(this.value)) {
                alert('Please upload file having extensions .xlsx only.');
                return false;
            }
            var file = $('#fileExcel')[0].files[0].name;
            $('#fileExcel').prev('label').text(file);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/exam/addExam.blade.php ENDPATH**/ ?>