<div class="dropzone clsbox" id="mydropzone" data-toggle="dropzone">
    <input name="upload_file_id" type="hidden"  class="dz-file-id">
</div>
@push('scripts-footer')
    <script type="text/javascript">
        var dropzone = $('[data-toggle="dropzone"]');
        var dropzoneFileID = $('.dz-file-id');
        if (dropzone.length) {
            Dropzone.autoDiscover = false;
            dropzone.each(function () {
                var file_id =dropzoneFileID;
                var multiple = ($('.dropzone-multiple') !== undefined);
                $("div#mydropzone").dropzone({
                    url: "/image/upload/store",
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,
                    removedfile: function (file) {
                        var name = file.name;
                        alert(JSON.stringify(file));

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{ url("image/delete") }}',
                            data: {filename: name},
                            success: function (data) {
                                console.log("File has been successfully removed!!");
                                file_id[0].value = '';
                            },
                            error: function (e) {
                                console.log(e);
                            }
                        });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },
                    success: function (file,response) {
                        file_id[0].value = response.success;
                    }
                });
            });

        }


    </script>

@endpush


