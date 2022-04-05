function lihatGambar() {
    const gambar = document.querySelector('#foto');
    const gambarPreview = document.querySelector('.img-lihat')
    const ganti = document.querySelector('#upload')

    gambarPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(gambar.files[0]);

    oFReader.onload = function(oFREvent) {
        gambarPreview.src = oFREvent.target.result;
    }
}