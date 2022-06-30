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
            </div>{{-- /.container-fluid --}}
        </section>
        @php $kosong = "<i>(Tidak ada data)</i>"; @endphp

        {{-- Main content --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center image_area">
                                    <img class="profile-user-img img-fluid img-responsive img-circle" style="width: 80%"
                                        src="{{ asset('storage/' . $pengguna->detail->foto) }}">
                                </div>

                                <h3 class="profile-username text-center my-1">{{ $pengguna->nama }}</h3>

                                <p class="text-muted text-center my-1">
                                    {{ $pengguna->detail->nama_arab }}</p>

                                <p class="text-muted text-center my-1">
                                    {!! $pengguna->detail->kelas ? $pengguna->detail->kelas . ' - ' . $pengguna->detail->sub_kelas : $kosong !!}
                                </p>
                                <div class="row d-flex justify-content-center">
                                    <div class="">
                                        @php $s = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" @endphp
                                        <p class="text-muted text-center mt-1 mb-3 badge-outline-secondary"
                                            style="padding: 0.1em 1em 0.2em 1em;">
                                            {!! $pengguna->status == 1 ? 'Status Aktif' : 'Status Non-aktif' !!}</p>
                                    </div>
                                </div>

                                <ul class="list-group list-group-unbordered mb-1  no-select">
                                    <li class="list-group-item">
                                        @php
                                            $login = $pengguna->last_login_at;
                                            $call = Carbon\Carbon::parse($login)->format('j F Y');
                                            $waktu = Carbon\Carbon::parse($login)->format('H:i');
                                            if ($login == null) {
                                                $login = '(Tidak ada data)';
                                            } else {
                                                $login = Carbon\Carbon::parse($login)->diffForHumans();
                                            }
                                        @endphp
                                        Login terakhir <a class="float-right" href="javascript:void(0);"
                                            data-toggle="tooltip" data-placement="top" data-html="true"
                                            title="<b>Tanggal: </b>{{ $pengguna->last_login_at ? $call : '(Tidak ada data)' }} <br> <b>Waktu: </b>{{ $pengguna->last_login_at ? $waktu : '(Tidak ada data)' }} <br> <b>IP: </b>{{ $pengguna->last_login_ip ?? '(Tidak ada data)' }}">{{ $login }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        Email <a class="float-right" href="mailto: {{ $pengguna->email }}"
                                            target="_blank" data-toggle="tooltip" data-placement="top"
                                            title="Kirim Email">{!! $pengguna->email ?? $kosong !!}</a>
                                    </li>
                                    <li class="list-group-item">
                                        Terdaftar pada <a class="float-right"
                                            href="javascript:void(0);">{{ $pengguna->created_at->format('j F Y') }}</a>
                                    </li>
                                </ul>
                                {{-- <a href="/pengguna/{{ $pengguna->user_id }}/edit" target="_blank" --}}
                                <a href="{{url()->current()."#sunting"}}" style="font-weight: 200"
                                    class="btn btn-outline-primary btn-block mt-3"><b>Edit Profil
                                        <i class="fa-solid fa-arrow-up-right-from-square ml-1"></i></b></a>

                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#biodata"
                                            data-toggle="tab">Biodata</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#aktivitas"
                                            data-toggle="tab">Aktivitas</a></li>
                                    <li class="nav-item"><a class="nav-link" id="set" href="#sunting"
                                            data-toggle="tab">Sunting</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="biodata">
                                        {{-- Post --}}
                                        <div class="row">
                                            {{-- left column --}}
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Biodata Utama</h3>
                                                    </div>
                                                    <div class="card-body">


                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td style="width: 40%; vertical-align: middle;"><b>NIS </b>
                                                                </td>
                                                                <td style="vertical-align: middle;"><code
                                                                        class="badge badge-secondary mb-0"
                                                                        style="font-size: 100%;
                                                                                                            padding: 0.1em 0.75em;
                                                                                                            line-height:unset;
                                                                                                            font-weight:400;
                                                                                                            color: #6c757d;
                                                                                                            background-color: transparent;
                                                                                                            border-color: #6c757d;
                                                                                                            border: 1px solid;
                                                                                                            border-radius: 1rem;">
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
                                                        <hr>
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td style="width: 40%;"><b>Tempat, Tanggal
                                                                        Lahir</b></td>
                                                                @php $u = Carbon\Carbon::parse($pengguna->detail->tanggal_lahir)->format('j F Y') @endphp
                                                                <td>:
                                                                    @if ($pengguna->detail->tempat_lahir || $pengguna->detail->tanggal_lahir)
                                                                        {{ $pengguna->detail->tempat_lahir . ', ' . $u }}
                                                                    @else
                                                                        {!! $kosong !!}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%;"><b>Alamat Lengkap</b></td>
                                                                <td>: {!! $pengguna->detail->alamat ?? $kosong !!}</td>
                                                            </tr>
                                                        </table>
                                                        <hr>
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td style="width: 40%;"><b>Nama Ayah</b></td>
                                                                <td>: {!! $pengguna->detail->nama_ayah ?? $kosong !!}

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%;"><b>Pekerjaan</b></td>
                                                                <td>: {!! $pengguna->detail->pekerjaan_ayah ?? $kosong !!}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%;"><b>Nama Ibu</b></td>
                                                                <td>: {!! $pengguna->detail->nama_ibu ?? $kosong !!}

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%;"><b>Pekerjaan</b></td>
                                                                <td>: {!! $pengguna->detail->pekerjaan_ibu ?? $kosong !!}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- kolom pendidikan --}}
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
                                            <!-- /.post -->
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="aktivitas">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                    10 Feb. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i>
                                                        12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                        email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo
                                                        kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins
                                                        ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                        accepted your friend
                                                        request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins
                                                        ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on
                                                        your
                                                        post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                            comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-success">
                                                    3 Jan. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days
                                                        ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new
                                                        photos</h3>

                                                    <div class="timeline-body">
                                                        {{-- <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="..."> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="sunting">
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
                                                            <input type="checkbox"> I agree to the <a href="#">terms and
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
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('js_atas')
@endsection

@section('style')
    <style>
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

    </style>
@endsection

@section('js_bawah')
@endsection
