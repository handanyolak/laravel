<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    @toastr_css
    @yield('css')
</head>

<body id="page-top">
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-table"></i>
            </div>
            <div class="sidebar-brand-text mx-3">TEPEBAŞI BELEDİYESİ</div>
        </a>

        <hr class="sidebar-divider my-0">

@foreach($kategoriler as $kategori)
            <li class="nav-item @if(Request::segment(1)==$kategori->slug) active @endif">
                <a class="nav-link" href="{{$kategori->slug}}">
                    <i class="fas fa-desktop"></i>
                    <span>{{$kategori->kategori_ismi}}</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
@endforeach

        <div class="text-center d-none d-md-inline mt-5">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-lg-inline text-gray-600 small">Handan Yolak</span>
                            <i class="fas fa-caret-down fa-lg text-secondary"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in mt-0" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <span><i class="fas fa-sign-out-alt fa-lg fa-fw mr-2 text-secondary"></i>Çıkış Yap</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
