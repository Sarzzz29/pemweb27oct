<?php
// 1. Array multidimensi mata kuliah
$matkul = [
    [
        "nama" => "Pemrograman Web",
        "sks" => 3,
        "nilai" => 85
    ],
    [
        "nama" => "Sistem Basis Data",
        "sks" => 3,
        "nilai" => 75
    ],
    [
        "nama" => "Desain dan Analisis Algoritma",
        "sks" => 3,
        "nilai" => 65
    ],
    [
        "nama" => "Sistem Operasi",
        "sks" => 3,
        "nilai" => 45
    ],
    [
        "nama" => "Jaringan Komputer",
        "sks" => 2,
        "nilai" => 90
    ]
];

// 2. Fungsi untuk menentukan nilai huruf dan bobot
function hitungBobot($nilai)
{
    if ($nilai >= 80) {
        return ["huruf" => "A", "bobot" => 4.0];
    } elseif ($nilai >= 70) {
        return ["huruf" => "B", "bobot" => 3.0];
    } elseif ($nilai >= 60) {
        return ["huruf" => "C", "bobot" => 2.0];
    } elseif ($nilai >= 50) {
        return ["huruf" => "D", "bobot" => 1.0];
    } else {
        return ["huruf" => "E", "bobot" => 0.0];
    }
}

// 3. Variabel untuk menghitung IPS
$totalBobot = 0;
$totalSKS = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Nilai Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h2, h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .mengulang {
            background-color: #ffcccc;
            color: #cc0000;
        }

        .ringkasan {
            margin-top: 25px;
            padding: 15px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <h2>Rekap Nilai Mata Kuliah</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai Angka</th>
            <th>Nilai Huruf</th>
            <th>Bobot</th>
            <th>Status</th>
        </tr>

        <?php
        // 4. Menampilkan data mata kuliah
        $no = 1;

        foreach ($matkul as $m) {
            $hasil = hitungBobot($m["nilai"]);

            $huruf = $hasil["huruf"];
            $bobot = $hasil["bobot"];

            if ($bobot >= 2.0) {
                $status = "LULUS";
                $kelas = "";
            } else {
                $status = "MENGULANG";
                $kelas = "mengulang";
            }

            // Menghitung total bobot dan total SKS
            $totalBobot += $bobot * $m["sks"];
            $totalSKS += $m["sks"];
        ?>

        <tr class="<?= $kelas ?>">
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($m["nama"]) ?></td>
            <td><?= $m["sks"] ?></td>
            <td><?= $m["nilai"] ?></td>
            <td><?= $huruf ?></td>
            <td><?= number_format($bobot, 1) ?></td>
            <td><?= $status ?></td>
        </tr>

        <?php
        }

        // 5. Menghitung IPS
        $ips = $totalSKS > 0 ? $totalBobot / $totalSKS : 0;

        // 6. Menentukan batas maksimal SKS semester depan
        if ($ips >= 3.00) {
            $maksSKS = 24;
        } else {
            $maksSKS = 20;
        }
        ?>

    </table>

    <div class="ringkasan">
        <h3>Ringkasan IPS</h3>

        <p>Total SKS: <?= $totalSKS ?> SKS</p>

        <p>Total Bobot Nilai:
            <?= number_format($totalBobot, 2) ?>
        </p>

        <p>IPS:
            <strong><?= number_format($ips, 2) ?></strong>
        </p>

        <p>Batas Maksimal SKS Semester Depan:
            <strong><?= $maksSKS ?> SKS</strong>
        </p>
    </div>

</body>
</html>