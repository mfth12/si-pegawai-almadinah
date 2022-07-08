@extends('theme.back')

@section('container')
    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1>{{ $head_page }}</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render() }}
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @php $kosong = "<i>(Tidak ada data)</i>"; @endphp

        {{-- Main content --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row align-content-center">
                    {{-- col --}}
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#umum"
                                            data-toggle="tab">Umum</a></li>
                                    <li class="nav-item"><a class="nav-link" id="set" href="#monitoring"
                                            data-toggle="tab">Monitoring</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="umum">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Lembaga</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td style="width: 40%; vertical-align: middle;"><b>NIS </b>
                                                                </td>
                                                                <td style="vertical-align: middle;"><code
                                                                        class="badge badge-secondary mb-0 bundaran_id">
                                                                        {!! $pengguna->nomer_induk ?? $kosong !!}</code>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%"><b>NISN </b>(Nasional)</td>
                                                                <td>: {!! $pengguna->detail->nisn ?? $kosong !!}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%"><b>Nama Lengkap</b></td>
                                                                <td>: {!! $pengguna->nama ?? $kosong !!}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%"><b>Nama</b> (Bahasa Arab)</td>
                                                                <td>: {!! $pengguna->detail->nama_arab ?? $kosong !!}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%"><b>Kelas</b></td>
                                                                <td>: {!! $pengguna->detail->kelas ? $pengguna->detail->kelas . ' - ' . $pengguna->detail->sub_kelas : $kosong !!}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%"><b>Jenis Kelamin</b></td>
                                                                <td>: {!! $pengguna->detail->jenis_kelamin ?? $kosong !!}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Riwayat Pendidikan</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table id="example1" class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Nama Sekolah</th>
                                                                    <th>Tahun</th>
                                                                    <th>Ket.</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>SDIT As-Sakinah</td>
                                                                    <td>2015-2021</td>
                                                                    <td>Cumlaude</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>MTs Idris Bintan</td>
                                                                    <td>2022-2023</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Riwayat Penyakit Dalam</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table id="example1" class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Nama Penyakit</th>
                                                                    <th>Tahun</th>
                                                                    <th>Ket.</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Asma</td>
                                                                    <td>2019-2020</td>
                                                                    <td>Sering kambuh</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="monitoring">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputName"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience"
                                                    class="col-sm-2 col-form-label">Experience</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputSkills"
                                                        placeholder="Skills">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> I agree to the <a href="#">terms
                                                                and
                                                                conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js_atas')
    {{-- kosong --}}
@endsection

@section('style')
    <style>
        /*Code to change color of active link*/
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: slategrey;
        }

        .table-borderless td,
        .table-borderless th {
            padding: 0.75rem 0.75rem 0.75rem 0rem;
        }

        .badge-outline-secondary {
            text-align: center;
            color: #6c757d;
            background-color: transparent;
            border-color: #6c757d;
            border: 1px solid;
            border-radius: 1rem;
        }

        .no-select::selection,
        .no-select *::selection {
            background-color: Transparent;
        }

        .no-select {
            /* Sometimes I add this too. */
            cursor: default;
        }

        .bundaran_id {
            font-size: 100%;
            padding: 0.1em 0.75em;
            line-height: unset;
            font-weight: 400;
            color: #6c757d;
            background-color: transparent;
            border-color: #6c757d;
            border: 1px solid;
            border-radius: 1rem;
        }
    </style>
@endsection

@section('js_atas')
    {{-- kosong --}}
@endsection

@section('js_bawah')
    {{-- kosong --}}
@endsection
