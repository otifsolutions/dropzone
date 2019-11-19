


<div class="dropzone clsbox" id="mydropzone" data-toggle="dropzone">

</div>






@push('scripts-footer')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>






    <script type="text/javascript">




        var dropzone = $('[data-toggle="dropzone"]');





        // function init($this)
        // {
        //
        //
        //     var multiple = ($this.data('dropzone-multiple') !== undefined) ? true : false;
        //     let acceptedFiles = ($this.data('dropzone-accepted-files') !== undefined) ? true : false;
        //     var file_id = $this.find($dropzoneFileID);
        //     var currentFile = undefined;
        //     let url = "/image/upload/store";
        //
        //     // Init options
        //     var options = {
        //
        //         url: url,
        //         headers: {
        //             'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         thumbnailWidth: null,
        //         thumbnailHeight: null,
        //         maxFiles: (!multiple) ? 1 : null,
        //         acceptedFiles: (!acceptedFiles) ? 'image/*' : null,
        //         init: function () {
        //             this.on("addedfile", function (file) {
        //                 if ($this.find('img.custom-image') !== undefined)
        //                 {
        //                     alert("hi");
        //                 $this.find('img.custom-image').remove();
        //             }
        //                 if (!multiple && currentFile) {
        //                     this.removeFile(currentFile);
        //                 }
        //                 currentFile = file;
        //             });
        //             this.on("success", function (file, response) {
        //                 if (multiple)
        //                 {
        //                 file_id[0].value += response.data.id + ','
        //                 }
        //                 else
        //                     {
        //                 file_id.val(response.data.id).trigger('change');
        //                      }
        //             });
        //             this.on("thumbnail", function(file, dataUrl) {
        //                 $('.dz-image').last().find('img').attr({width: '100%', height: '100%'});
        //             })
        //
        //         }
        //     };            // Init dropzone
        //     $this.dropzone(options);
        // }



        if (dropzone.length)
        {

            Dropzone.autoDiscover = false;


            dropzone.each(function ()
                {



                    $("div#mydropzone").dropzone({

                        url : "/image/upload/store",
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

                        },

                        acceptedFiles: 'image/*',
                        addRemoveLinks : true,
                        removedfile: function(file)
                        {

                            var name = file.name;
                            alert(name);
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                },
                                type: 'POST',
                                url: '{{ url("image/delete") }}',
                                data: {filename: name},
                                success: function (data){
                                    console.log("File has been successfully removed!!");
                                },
                                error: function(e) {
                                    console.log(e);
                                }});
                            var fileRef;
                            return (fileRef = file.previewElement) != null ?
                                fileRef.parentNode.removeChild(file.previewElement) : void 0;
                        },



                    });

                }


            );


        }


    </script>




    <script type="text/javascript">

        {{--Dropzone.options.dropzone =--}}
        {{--    {--}}
        {{--        maxFilesize: 12,--}}

        {{--        acceptedFiles: ".jpeg,.jpg,.png,.gif",--}}
        {{--        addRemoveLinks: true,--}}
        {{--        timeout: 50000,--}}

        {{--        removedfile: function(file)--}}
        {{--        {--}}
        {{--            var name = file.upload.filename;--}}


        {{--            $.ajax({--}}
        {{--                headers: {--}}
        {{--                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
        {{--                },--}}
        {{--                type: 'POST',--}}
        {{--                url: '{{ url("image/delete") }}',--}}
        {{--                data: {filename: name},--}}
        {{--                success: function (data){--}}
        {{--                    console.log("File has been successfully removed!!");--}}
        {{--                },--}}
        {{--                error: function(e) {--}}
        {{--                    console.log(e);--}}
        {{--                }});--}}
        {{--            var fileRef;--}}
        {{--            return (fileRef = file.previewElement) != null ?--}}
        {{--                fileRef.parentNode.removeChild(file.previewElement) : void 0;--}}
        {{--        },--}}

        {{--        success: function(file, response)--}}
        {{--        {--}}
        {{--            console.log(response);--}}
        {{--        },--}}
        {{--        error: function(file, response)--}}
        {{--        {--}}
        {{--            return false;--}}
        {{--        }--}}
        {{--    };--}}

    </script>



@endpush


@push('css-header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/basic.css">
@endpush
