@include('admin.templates.layouts.header')
@include('admin.templates.layouts.navbar')
@include('admin.templates.layouts.sidebar')
<script src="https://kit.fontawesome.com/7fc11236e8.js" crossorigin="anonymous"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @include('admin.templates.layouts.message')
        @yield('content')
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.templates.layouts.footer')
