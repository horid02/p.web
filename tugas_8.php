
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Tugas 7</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tugas_7.css">
</head>
<body>

    <!-- Konten -->
    <div class="content">
        <!-- Form Tugas 1 -->
        <div class="form-container">
            <h1>Hitung Total Bayar</h1>
            <form method="POST" action="">
                <div class="input-field">
                    <label for="nama">Nama Barang:</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukan barang..." require>
                </div>
                <div class="input-field">
                    <label for="harga">Harga (Rp):</label>
                    <input type="number" id="harga" name="harga" placeholder="Masukan harga..." require>
                </div>
                <div class="input-field">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" id="jumlah" name="jumlah" placeholder="Masukan jumlah..." require>
                </div>
                <div class="input-field">
                    <label for="diskon">Diskon (Rp):</label>
                    <input type="number" id="diskon" name="diskon" placeholder="Masukan diskon..." require>
                </div>
                <button type="submit" name="hitung_bayar">Hitung Total Bayar</button>
                <div class="result" id="result-bayar" style="display: <?php echo isset($_POST['hitung_bayar']) ? 'block' : 'none'; ?>">
                    <?php
                    if (isset($_POST['hitung_bayar'])) {
                        $nama = $_POST['nama'];
                        $harga = intval($_POST['harga']);
                        $jumlah = intval($_POST['jumlah']);
                        $diskon = intval($_POST['diskon']);
                        $total_bayar = ($harga * $jumlah) - $diskon;
                        echo "Total bayar untuk $nama: Rp" . number_format($total_bayar, 0, ',', '.');
                    }
                    ?>
                </div>
            </form>
        </div>

        <!-- Form Tugas 2 -->
        <div class="form-container">
            <h1>Hitung Gaji Total</h1>
            <form method="POST" action="">
                <div class="input-field">
                    <label for="jam_kerja">Jumlah Hari Kerja:</label>
                    <input type="number" id="jam_kerja" name="jam_kerja" min="1" placeholder="Masukan jam kerja..." required>
                </div>
                <div class="input-field">
                    <label for="jam_lembur">Jumlah Jam Lembur:</label>
                    <input type="number" id="jam_lembur" name="jam_lembur" min="0" placeholder="Masukan jam lembur..." required>
                </div>
                <button type="submit" name="hitung_gaji">Hitung Gaji Total</button>
                <div class="result" id="result-gaji" style="display: <?php echo isset($_POST['hitung_gaji']) ? 'block' : 'none'; ?>">
                    <?php
                    if (isset($_POST['hitung_gaji'])) {
                        $jam_kerja = intval($_POST['jam_kerja']);
                        $jam_lembur = intval($_POST['jam_lembur']);
                        $gaji_harian = 50000;
                        $gaji_pokok = $jam_kerja * $gaji_harian;

                        $gaji_lembur = 0;
                        if ($jam_lembur >= 1 && $jam_lembur <= 2) {
                            $gaji_lembur = $jam_lembur * 25000;
                        } elseif ($jam_lembur > 2) {
                            $gaji_lembur = $jam_lembur * 35000;
                        }

                        $bonus_makan = 0;
                        if ($jam_kerja > 20) {
                            $bonus_makan = ($jam_kerja - 20) * 5000;
                        }

                        $gaji_total = $gaji_pokok + $gaji_lembur + $bonus_makan;
                        echo "Gaji total: Rp" . number_format($gaji_total, 0, ',', '.');
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>