@php
    $title = 'Add/Edit News';
@endphp
@extends('layouts.admin.master-admin')
@section('content')
    <form action="{{ route('news.add') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-8">
                <div class="form-group">
                    <label for="txtTitle">Title:</label>
                    <input type="hidden" name="idNews" value="{{ $newDetail != null ? $newDetail->id : '' }}">
                    <input type="text" class="form-control" name="txtTitle" required
                        value="{{ $newDetail != null ? $newDetail->title : '' }}">
                </div>
                <div class="form-group">
                    <textarea name="txtContent" id="txtContent" class="form-control" rows="10">
                    {{ $newDetail != null ? $newDetail->content : '' }}
                </textarea>
                </div>
            </div>
            <div class="form-group col-4">
                <div class="form-group">
                    <label for="txtThumbnail">{{ __('Thumbnail: ') }}</label>
                    <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" hidden>
                    <label for="file" style="cursor: pointer;">Upload Image</label>
                    <img src="{{ $newDetail != null ? asset($newDetail->thumbnail) : asset('asset/news/df_banner.jpg') }}"
                        alt="image txtThumbnail" id="output" width="200px">
                </div>
                <div class="form-group">
                    <label for="cbStatus">{{ __('Status: ') }}</label>
                    <select name="cbStatus">
                        <option value="1"
                            {{ $newDetail != null ? ($newDetail->is_active == 1 ? 'selected' : '') : '' }}>
                            Active
                        </option>
                        <option value="0"
                            {{ $newDetail != null ? ($newDetail->is_active == 0 ? 'selected' : '') : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Save" class="btn btn-success" style="max-width: 10%;margin-left: 2%">
        </div>
    </form>
@endsection
@section('js')

    <link href="{{ asset('summer_note/summernote-lite.css') }}" rel="stylesheet">
    <script src="{{ asset('summer_note/summernote-lite.js') }}"></script>

    <script>
        var loadFile = function(event) {
            file = event.target.files[0];
            if (!file.name.match(/.(jpg|jpeg|png)$/i)) {
                return alert("wrong image format please check again !!!");
            }
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        $.ajax({
            url: 'https://api.github.com/emojis',
            async: false
        }).then(function(data) {
            window.emojis = Object.keys(data);
            window.emojiUrls = data;
        });

        $('#txtContent').summernote({
            placeholder: 'Type anything in here',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview', 'help']]
            ],
            hint: {
                match: /:([\-+\w]+)$/,
                search: function(keyword, callback) {
                    callback($.grep(emojis, function(item) {
                        return item.indexOf(keyword) === 0;
                    }));
                },
                template: function(item) {
                    var content = emojiUrls[item];
                    return '<img src="' + content + '" width="20" /> :' + item + ':';
                },
                content: function(item) {
                    var url = emojiUrls[item];
                    if (url) {
                        return $('<img />').attr('src', url).css('width', 20)[0];
                    }
                    return '';
                }
            }
        });
    </script>

@stop
