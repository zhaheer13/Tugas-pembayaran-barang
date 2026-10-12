<?php
if (isset($_POST['hitung'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    if ($nama == "" || $harga < 0 || $jumlah < 1) {
        echo "Data tidak valid!";
    } else {
        $total = $harga * $jumlah;

        if ($total >= 500000) {
            $diskon = 20;
        } elseif ($total >= 250000) {
            $diskon = 10;
        } else {
            $diskon = 0;
        }

        $potongan = $total * $diskon / 100;
        $bayar = $total - $potongan;
    }
}
?>

<h2>Pembayaran Barang</h2>

<form method="POST">
    Nama Barang:
    <input type="text" name="nama" required><br><br>

    Harga Satuan:
    <input type="number" name="harga" min="0" required><br><br>

    Jumlah Pembelian:
    <input type="number" name="jumlah" min="1" required><br><br>

    <button type="submit" name="hitung">Hitung</button>
</form>

<?php
if (isset($_POST['hitung']) && $nama != "" && $harga >= 0 && $jumlah >= 1) {
    echo "<h3>Hasil Pembayaran</h3>";
    echo "Nama Barang: $nama <br>";
    echo "Harga Satuan: Rp" . number_format($harga, 0, ',', '.') . "<br>";
    echo "Jumlah Pembelian: $jumlah <br>";
    echo "Total Harga: Rp" . number_format($total, 0, ',', '.') . "<br>";
    echo "Diskon: $diskon% <br>";
    echo "Total Pembayaran: Rp" . number_format($bayar, 0, ',', '.');
}
?>