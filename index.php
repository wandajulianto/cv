<?php

// Konfigurasi Database
$host = "localhost"; // Nama host
$user = "root"; // Username database
$password = ""; // Password database
$database = "db_cv"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel users
$sql = "SELECT id, nama, jenis_kelamin, alamat, deskripsi, foto FROM users";
$result = $conn->query($sql);

// query buat get data riwayat_pendidikan user
$sql_riwayat = "SELECT * FROM riwayat_pendidikan";
$result_riwayat = $conn->query($sql_riwayat);

// query buat get data proyek user
$sql_project = "SELECT * FROM project";
$result_project = $conn->query($sql_project);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./static/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">2203010050 Wanda Julianto Informatika B 2022</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#"><b>HOME</b></a></li>
                <li class="nav-item"><a class="nav-link" href="#education"><b>EDUCATION</b></a></li>
                <li class="nav-item"><a class="nav-link" href="#project"><b>PROJECT</b></a></li>
                <li class="nav-item"><a class="nav-link" href="#contact"><b>CONTACT</b></a></li>
                <li class="nav-item">
                    <button class="btn hire-btn"><b>Hire me</b></button>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Hero Text -->
                <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-6 hero-content">
                    <h1><span>I’m</span> <br> <?= $row['nama'] ?></h1>
                    <!-- Tampilkan Deskripsi -->
                    <p class="my-3">
                        <?= $row['deskripsi'] ?>
                    </p>
                    <a href="#" class="btn btn-custom">Download CV</a>
                </div>

                <!-- Hero Image -->
                <div class="col-md-6 text-center hero-image">
                    <img src="editor/assets/images/<?= $row['foto'] ?>" alt="Foto" width="100">
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Education Section -->
     <section class="hero-section" id="education">
        <div class="container">
            <h2 class="text-center mb-4">Education</h2>
            <p class="text-center mb-4">Lorem ipsum dolor sit amet et delectus accommodare his consul copiosae.</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pendidikan</th>
                        <th>Tahun</th>
                        <th>Nama Sekolah/Kampus</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php $no = 1; while ($riwayat = $result_riwayat->fetch_assoc()): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($riwayat['pendidikan']) ?></td>
                            <td><?= htmlspecialchars($riwayat['tahun']) ?></td>
                            <td><?= htmlspecialchars($riwayat['nama_sekolah']) ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
            </table>
        </div>
     </section>

     <!-- Projects Section -->
    <section class="hero-section" id="project">
        <div class="container">
            <h2 class="text-center mb-4">Project</h2>
            <div class="row">
                <?php while ($project = $result_project->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <img src="editor/assets/images/<?= $project['image'] ?>" class="card-img-top" alt="Project Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($project['project']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($project['keterangan']) ?></p>
                            <a href="<?= htmlspecialchars($project['link_project']) ?>" class="btn btn-primary" target="_blank">Lihat Project</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <footer class="py-4 bg-dark text-white" id="contact">
        <div class="container text-center">
            <p>Contact</p>
            <address>
                Address: 123 Main Street, City<br>
                State Province, Country
            </address>
            <div>
                <a href="#" class="text-white me-3"><i class="bi bi-github"></i> Github</a>
                <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i> Facebook</a>
                <a href="#" class="text-white"><i class="bi bi-instagram"></i> Instagram</a>
            </div>
            <p class="mt-3 mb-0">© 2024 Your Website. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
