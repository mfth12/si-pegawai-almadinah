@extends('theme.back')

@section('container')
    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render() }} --}}
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">

                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Halaman belum tersedia.</h3>

                <p>
                    Fitur sedang dalam pengembangan. Sementara itu, Anda dapat
                    <a href="/">kembali ke dasbor</a> atau mencoba menggunakan mesin pencarian. Mohon maaf atas
                    ketidaknyamanannya.
                </p>

                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari sesuatu..">

                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js_atas')
@endsection

@section('style')
@endsection

@section('js_bawah')
@endsection
