<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator Sederhana</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Kalkulator Sederhana dengan PHP</h2>
  <form method="post">
    <input type="number" name="angka1" required placeholder="Angka pertama">
    
    <select name="operator">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>

    <input type="number" name="angka2" required placeholder="Angka kedua">
    <button type="submit">Hitung</button>
  </form>

  <div class="result">
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka1 = $_POST["angka1"];
        $angka2 = $_POST["angka2"];
        $operator = $_POST["operator"];
        
        $hasil = 0;
        $error = "";
        
        switch ($operator) {
            case '+':
                $hasil = $angka1 + $angka2;
                break;
            case '-':
                $hasil = $angka1 - $angka2;
                break;
            case '*':
                $hasil = $angka1 * $angka2;
                break;
            case '/':
                if ($angka2 != 0) {
                    $hasil = $angka1 / $angka2;
                } else {
                    $error = "Error: Pembagian dengan nol tidak diizinkan.";
                }
                break;
        }
        
        if ($error) {
            echo "<p class='error';'>$error</p>";
        } else {
            echo "<p class='success'>Hasil: $angka1 $operator $angka2 = $hasil</p>";
        }
    }
    ?>
  </div>
</body>
</html>