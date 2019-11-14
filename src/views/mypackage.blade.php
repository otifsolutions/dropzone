<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Your File</title>
</head>
<body>

<h1>Upload Your file here</h1>

<form action="/package" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" value="Upload Image" name="submit">
</form>

<form action="/searchFile" method="post">
    Enter the name of the file
    <input type="text" name="checkfilename" id="fileToUpload">

    <input type="submit" value="Search" name="submit">
</form>

</body>
</html>