<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="icon" href="{{ asset("frontEnd/img/favicon.png") }}" type="image/png">
    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    @include("backend.layouts._style")
</head>
<body class="animsition">
@yield("content")

<!--   JS include -->
@include("backend.layouts._jsScripts")
<!-- end JS-->


</body>

</html>
<!-- end document-->

