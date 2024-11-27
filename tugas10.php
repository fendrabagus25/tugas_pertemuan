<?php
// Memproses data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $job = $_POST['job'];

    // Menghitung umur
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;

    // Menentukan gaji berdasarkan pekerjaan
    $salary = 0;
    switch ($job) {
        case 'Manager':
            $salary = 50000000;
            break;
        case 'Developer':
            $salary = 40000000;
            break;
        case 'Designer':
            $salary = 30000000;
            break;
        default:
            $salary = 20000000;
    }
}

// Menampilkan form HTML
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task Form</title>
</head>
<body>
    <h1>Form Input Tugas PHP</h1>
    <form action="" method="POST">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="dob">Tanggal Lahir:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="job">Pekerjaan:</label>
        <select id="job" name="job" required>
            <option value="Manager">Manager</option>
            <option value="Developer">Developer</option>
            <option value="Designer">Designer</option>
            <option value="Other">Other</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>';

// Menampilkan output jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<h2>Output Tugas PHP:</h2>';
    echo '<p>Nama: ' . htmlspecialchars($name) . '</p>';
    echo '<p>Umur: ' . $age . ' tahun</p>';
    echo '<p>Pekerjaan: ' . htmlspecialchars($job) . '</p>';
    echo '<p>Gaji: Rp ' . number_format($salary, 0, ",", ".") . '</p>';
}

echo '</body>
</html>';
?>