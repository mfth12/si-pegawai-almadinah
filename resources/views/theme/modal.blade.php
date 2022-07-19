{{-- Delete Confirmation --}}
{{-- Delete Confirmation --}}
{{-- Delete Confirmation --}}
{{-- <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="btn-delete" action="#" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Anda yakin ingin menghapus data ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Data yang telah dihapus tidak akan bisa dikembalikan.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}


{{-- MULAI MODAL KONFIRMASI DELETE --}}
<div class="modal fade" tabindex="-1" role="dialog" id="hapus-modal" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Data yang dihapus tidak akan bisa kembali lagi. Apakah Anda yakin ingin menghapus?</p>
            </div>
            <div class="modal-footer bg-whitesmoke">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
            </div>
        </div>
    </div>
</div>


{{-- Keluar Konfirmasi --}}
{{-- Keluar Konfirmasi --}}
{{-- Keluar Konfirmasi --}}
<div class="modal fade" id="konfirmasiKeluar" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="btn-keluar" action="#" method="POST">
                @csrf
                @method('GET')
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin mengakhiri sesi ini dan keluar dari Sistem?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-danger" type="submit">Keluar</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Fitur belum tersedia --}}
{{-- Fitur belum tersedia --}}
{{-- Fitur belum tersedia --}}
<div class="modal fade" id="tidakTersedia" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pemberitahuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Mohon maaf, fitur ini belum tersedia. Sedang dalam tahap pengembangan.
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Ok, Saya Mengerti</button>
                {{-- <button class="btn btn-danger" type="submit">Keluar</button> --}}
            </div>
        </div>
    </div>
</div>
