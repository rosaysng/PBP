<!-- Nama: Rosa Yohana Sinaga
     NIM : 24060122120009 -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .radio-group, .checkbox-group {
            display: flex;
            align-items: center;
        }
        .radio-group label, .checkbox-group label {
            margin-left: 5px;
            margin-right: 15px;
        }
        button {
            padding: 10px 20px;
            margin-right: 10px;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn-reset {
            background-color: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }
        h2 {
            font-size: 16px; /* Ukuran teks lebih kecil */
            font-weight: normal; /* Tidak bold */
        }
        
    </style>
</head>
<body>

<div class="form-container">
    <form id="studentForm" action="proses.php" method="POST" onsubmit="return validateForm()">
        <h2>Form Input Siswa</h2>

        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" id="nis" name="nis" maxlength="10" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <div class="radio-group">
                <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
                <label for="pria">Pria</label>
            </div>
            <div class="radio-group">
                <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" required>
                <label for="wanita">Wanita</label>
            </div>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select id="kelas" name="kelas" onchange="toggleEkstrakurikuler()" required>
                <option value="" disabled selected></option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
        </div>

        <div class="form-group" id="ekstrakurikuler-group" style="display: none;">
            <label>Ekstrakurikuler:</label>
            <div class="checkbox-group">
                <input type="checkbox" id="pramuka" name="ekstrakurikuler[]" value="Pramuka">
                <label for="pramuka">Pramuka</label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="seni_tari" name="ekstrakurikuler[]" value="Seni Tari">
                <label for="seni_tari">Seni Tari</label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="sinematografi" name="ekstrakurikuler[]" value="Sinematografi">
                <label for="sinematografi">Sinematografi</label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="basket" name="ekstrakurikuler[]" value="Basket">
                <label for="basket">Basket</label>
            </div>
        </div>

        <button type="submit" class="btn-submit">Submit</button>
        <button type="reset" class="btn-reset">Reset</button>
    </form>
</div>

<script>
    // Tampilkan atau sembunyikan pilihan ekstrakurikuler berdasarkan kelas
    function toggleEkstrakurikuler() {
        const kelas = document.getElementById('kelas').value;
        const ekstrakurikulerGroup = document.getElementById('ekstrakurikuler-group');
        
        if (kelas === 'X' || kelas === 'XI') {
            ekstrakurikulerGroup.style.display = 'block';
        } else {
            ekstrakurikulerGroup.style.display = 'none';
            clearEkstrakurikuler(); // Bersihkan pilihan jika kelas XII
        }
    }

    // Fungsi untuk membersihkan pilihan ekstrakurikuler
    function clearEkstrakurikuler() {
        const checkboxes = document.querySelectorAll('#ekstrakurikuler-group input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    }

    // Validasi form saat submit
    function validateForm() {
        const nis = document.getElementById('nis').value;
        const kelas = document.getElementById('kelas').value;
        const checkboxes = document.querySelectorAll('#ekstrakurikuler-group input[type="checkbox"]:checked');
        
        // Validasi NIS (harus 10 karakter angka)
        const nisPattern = /^[0-9]{10}$/;
        if (!nisPattern.test(nis)) {
            alert("NIS harus 10 karakter angka.");
            return false;
        }

        // Validasi ekstrakurikuler (wajib jika kelas X atau XI, maksimal 3 pilihan)
        if (kelas === 'X' || kelas === 'XI') {
            if (checkboxes.length < 1 || checkboxes.length > 3) {
                alert("Pilih minimal 1 dan maksimal 3 kegiatan ekstrakurikuler.");
                return false;
            }
        }
        return true;
    }
</script>

</body>
</html>
