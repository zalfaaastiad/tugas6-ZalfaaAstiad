<!DOCTYPE html>
<html>
<head>
    <title>tugas6-Zalfaa Astiad Ryada-4BSI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 30px;
        }
        .resizable {
        resize: both;
        overflow: auto;
    }


    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Pendaftaran Rute Penerbangan</h2>

    <?php
    
    $bandara_asal = [
        "Soekarno Hatta" => 65000,
        "Husein Sastranegara" => 50000,
        "Abdul Rachman Saleh" => 40000,
        "Juanda" => 30000
    ];

    $bandara_tujuan = [
        "Ngurah Rai" => 85000,
        "Hasanuddin" => 70000,
        "Inanwatan" => 90000,
        "Sultan Iskandar Muda" => 60000
    ];

    
    ksort($bandara_asal);
    ksort($bandara_tujuan);
    ?>

    <form method="POST" action="">
    <div class="mb-3">
        <label class="form-label" >Nama Maskapai:</label> <br>
        <input type="text" class="form-control resizable" name="maskapai" rows="2" required></textarea>  <br> 

    <div class="mb-3">
        <label class="form-label">Bandara Asal:</label> <br>
        <select class="form-select" name="asal" required>
            <option value="">-- Pilih Bandara Asal --</option>
            <?php
            foreach ($bandara_asal as $nama => $pajak) {
                echo "<option value='$nama'>$nama</option>";
            }
            ?>
        </select> <br>
        </div>

        <div class="mb-3">
        <label class="form-label">Bandara Tujuan:</label> <br>
        <select class="form-select" name="tujuan" required>
            <option value="">-- Pilih Bandara Tujuan --</option>
            <?php
            foreach ($bandara_tujuan as $nama => $pajak) {
                echo "<option value='$nama'>$nama</option>";
            }
            ?>
        </select> <br>
        </div>

        <div class="mb-3">
        <label>Harga Tiket:</label><br>
        <input type="number" name="harga" required> <br>
        </div>

        <button input type="sub mit" name="submit" class="btn btn-primary">Daftar</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $maskapai = $_POST['maskapai'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $harga = (int) $_POST['harga'];
        $tanggal = date("Y-m-d"); 

       
        $pajak_asal = $bandara_asal[$asal];
        $pajak_tujuan = $bandara_tujuan[$tujuan];
        $total_pajak = $pajak_asal + $pajak_tujuan;
        $total_harga = $harga + $total_pajak;

        echo "<hr>";
        echo "<h3>Data Penerbangan</h3>";
        echo "Nomor: " . rand(10000, 99999) . "<br>";
        echo "Tanggal: $tanggal<br>";
        echo "Nama Maskapai: $maskapai<br>";
        echo "Asal Penerbangan: $asal<br>";
        echo "Tujuan Penerbangan: $tujuan<br>";
        echo "Harga Tiket: Rp " . number_format($harga, 0, ',', '.') . "<br>";
        echo "Pajak: Rp " . number_format($total_pajak, 0, ',', '.') . "<br>";
        echo "Total Harga Tiket: Rp " . number_format($total_harga, 0, ',', '.') . "<br>";
    }
    ?>
</body>
</html>
