@extends("Dropzone::layouts.app")

@section('content')

<div class="container">
    <button data-toggle="otif-dropzone-feed" class="otif" data-target="#demo">Upload Image with Dropzone JS</button>

    <div id="demo" class="otif-dropzone-feed collapse">


    <h3 class="jumbotron">Images Upload Using Dropzone</h3>
    <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        @csrf
    </form>

    <form action="/searchFile" method="post">
        Enter the name of the file
        <input type="text" name="checkfilename" id="fileToUpload">

        <input type="submit" value="Search" name="submit">
    </form>

</div>
</div>
@endsection


