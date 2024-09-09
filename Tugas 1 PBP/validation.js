document.addEventListener('DOMContentLoaded', function () {
    // Captcha generation
    function generateCaptcha() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        let captcha = '';
        for (let i = 0; i < 5; i++) {
            const randomIndex = Math.floor(Math.random() * chars.length);
            captcha += chars.charAt(randomIndex);
        }
        document.getElementById('captcha-text').textContent = captcha;
    }

    generateCaptcha();

    // Sub Kategori logic based on Kategori selection
    const kategori = document.getElementById('kategori');
    const subKategori = document.getElementById('sub-kategori');
    kategori.addEventListener('change', function () {
        let options = '<option value="">--Pilih Sub Kategori--</option>';
        if (kategori.value === 'Baju') {
            options += '<option value="Baju Pria">Baju Pria</option>';
            options += '<option value="Baju Wanita">Baju Wanita</option>';
            options += '<option value="Baju Anak">Baju Anak</option>';
        } else if (kategori.value === 'Elektronik') {
            options += '<option value="Mesin Cuci">Mesin Cuci</option>';
            options += '<option value="Kulkas">Kulkas</option>';
            options += '<option value="AC">AC</option>';
        } else if (kategori.value === 'Alat Tulis') {
            options += '<option value="Kertas">Kertas</option>';
            options += '<option value="Map">Map</option>';
            options += '<option value="Pulpen">Pulpen</option>';
        }
        subKategori.innerHTML = options;
    });

    // Grosir logic
    const grosirYa = document.getElementById('grosir-ya');
    const grosirTidak = document.getElementById('grosir-tidak');
    const hargaGrosir = document.getElementById('harga-grosir');
    grosirYa.addEventListener('change', function () {
        hargaGrosir.disabled = false;
    });
    grosirTidak.addEventListener('change', function () {
        hargaGrosir.disabled = true;
        hargaGrosir.value = '';
    });

    // Form validation
    document.getElementById('productForm').addEventListener('submit', function (e) {
        let valid = true;

        // Nama Produk validation
        const namaProduk = document.getElementById('nama-produk').value;
        const namaProdukError = document.getElementById('nama-produk-error');
        if (namaProduk.length < 5 || namaProduk.length > 30) {
            namaProdukError.textContent = 'Nama produk harus diisi, minimal 5 karakter, maksimal 30 karakter';
            valid = false;
        } else {
            namaProdukError.textContent = '';
        }

        // Deskripsi validation
        const deskripsi = document.getElementById('deskripsi').value;
        const deskripsiError = document.getElementById('deskripsi-error');
        if (deskripsi.length < 10) {
            deskripsiError.textContent = 'Deskripsi produk harus diisi, minimal 10 karakter';
            valid = false;
        } else {
            deskripsiError.textContent = '';
        }

        // Kategori validation
        const kategoriError = document.getElementById('kategori-error');
        if (kategori.value === '') {
            kategoriError.textContent = 'Kategori harus dipilih';
            valid = false;
        } else {
            kategoriError.textContent = '';
        }

        // Sub Kategori validation
        const subKategoriError = document.getElementById('sub-kategori-error');
        if (subKategori.value === '') {
            subKategoriError.textContent = 'Sub kategori harus dipilih';
            valid = false;
        } else {
            subKategoriError.textContent = '';
        }

        // Harga Satuan validation
        const hargaSatuan = document.getElementById('harga-satuan').value;
        const hargaSatuanError = document.getElementById('harga-satuan-error');
        if (hargaSatuan === '' || isNaN(hargaSatuan)) {
            hargaSatuanError.textContent = 'Harga satuan harus diisi dan berupa angka';
            valid = false;
        } else {
            hargaSatuanError.textContent = '';
        }

        // Grosir validation
        const grosirError = document.getElementById('grosir-error');
        if (!grosirYa.checked && !grosirTidak.checked) {
            grosirError.textContent = 'Pilihan grosir harus dipilih';
            valid = false;
        } else {
            grosirError.textContent = '';
        }

        // Harga Grosir validation
        const hargaGrosirError = document.getElementById('harga-grosir-error');
        if (grosirYa.checked && (hargaGrosir.value === '' || isNaN(hargaGrosir.value))) {
            hargaGrosirError.textContent = 'Harga grosir harus diisi dan berupa angka';
            valid = false;
        } else {
            hargaGrosirError.textContent = '';
        }

        // Jasa Pengiriman validation
        const jasaKirimError = document.getElementById('jasa-kirim-error');
        const jasaKirimInputs = document.querySelectorAll('input[name="jasaPengiriman"]:checked');
        if (jasaKirimInputs.length === 0) {
            jasaKirimError.textContent = 'Minimal Tiga jasa kirim harus dipilih';
            valid = false;
        } else {
            jasaKirimError.textContent = '';
        }

        // Captcha validation
        const captcha = document.getElementById('captcha').value;
        const captchaError = document.getElementById('captcha-error');
        const captchaText = document.getElementById('captcha-text').textContent;
        if (captcha !== captchaText) {
            captchaError.textContent = 'Captcha tidak sesuai';
            valid = false;
        } else {
            captchaError.textContent = '';
        }

        if (!valid) {
            e.preventDefault(); // Prevent form submission if validation fails
        }
    });
});
