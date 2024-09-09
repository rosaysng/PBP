<!--Nama : Rosa Yohana Sinaga
NIM  : 24060122120009 -->


<html>
 <head>
 <title>Hello World</title>
 </head>
 <body>
 <?php
echo "<h2>Tugas 2 Praktikum PBP</h2>";
echo "Rosa Yohana Sinaga <br />";
echo "24060122120009";


// Fungsi untuk menghitung rata-rata elemen array
function hitung_rata($array) {
    $jumlah = array_sum($array); // Menjumlahkan seluruh elemen array
    $banyak = count($array); // Menghitung jumlah elemen array
    return $jumlah / $banyak; // Mengembalikan nilai rata-rata
}

// Fungsi untuk menampilkan data mahasiswa
function print_mhs($array_mhs) {
    // Membuat header tabel
    echo "<table border='1'>";
    echo "<tr>
            <td>Nama</td>
            <td>Nilai 1</td>
            <td>Nilai 2</td>
            <td>Nilai 3</td>
            <td>Rata2</td>
          </tr>";
    
    // Loop untuk setiap mahasiswa
    foreach ($array_mhs as $nama => $nilai) {
        // Menghitung rata-rata menggunakan fungsi hitung_rata
        $rata_rata = hitung_rata($nilai);
        
        // Menampilkan data dalam tabel
        echo "<tr>
                <td>$nama</td>
                <td>{$nilai[0]}</td>
                <td>{$nilai[1]}</td>
                <td>{$nilai[2]}</td>
                <td>$rata_rata</td>
              </tr>";
    }
    echo "</table>";
}

// Data mahasiswa
$array_mhs = [
    "Abdul" => [89, 90, 54],
    "Budi" => [98, 65, 74],
    "Nina" => [67, 56, 84]
];

// Memanggil fungsi untuk menampilkan data mahasiswa
print_mhs($array_mhs);

 ?>
 </body>
</html>