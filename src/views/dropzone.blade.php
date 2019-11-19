


<div class="dropzone clsbox" id="mydropzone" data-toggle="dropzone">

</div>






@push('scripts-footer')
    <script type="text/javascript">

        var dropzone = $('[data-toggle="dropzone"]');

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

@endpush


