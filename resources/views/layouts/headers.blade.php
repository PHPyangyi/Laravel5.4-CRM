<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <title>@yield('title')</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    {{--alert css--}}
    <link href="../home/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.ico"> <link href="../home/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="../home/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="../home/css/animate.css" rel="stylesheet">
    <link href="../home/css/style.css?v=4.1.0" rel="stylesheet">
    {{--日期--}}
    <link href="../home/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    @section('custom-css')

    @show
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">