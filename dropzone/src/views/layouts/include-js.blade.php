<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>




<script type="text/javascript">
    Dropzone.options.dropzone =
        {
            maxFilesize: 12,

            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,

            removedfile: function(file)
            {
                var name = file.upload.filename;

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

            success: function(file, response)
            {
                console.log(response);
            },
            error: function(file, response)
            {
                return false;
            }
        };
</script>
<script type="text/javascript">

    $(document).ready(function(){
        var count =1;
        $(".otif").on("click", function(){
            count++;
            var dataId = $(this).attr("data-toggle");

            // alert("You have clicked button of data attribute: " + dataId);
            if(dataId ==="otif-dropzone-feed" && count%2 ===1){

                $("#demo").removeClass("collapse in").addClass("collapse");
            }
            else if(dataId ==="otif-dropzone-feed" && count%2 ===0)
            {
                $("#demo").removeClass("collapse").addClass("collapse in");
            }

        });

    });
</script>