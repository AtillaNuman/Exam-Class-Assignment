<?php 

$message = isset($_COOKIE['sonuc_message']) ? urldecode($_COOKIE['sonuc_message']) : "Bir hata oluştu.";
//var_dump($message);
//setcookie("sonuc_message", "", time() - 86400, "/"); // Cookie'yi temizle
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sınav Dersliği Görüntüleme</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9; /* Hafif bir arka plan rengi */
            color: #333;
        }
        .img-container {
            display: flex;
            justify-content: center; /* Yatay merkezleme */
            margin-top: 20px; /* Üst boşluk */
        }
        .img {
            max-width: 100%;       /* Görüntü genişliği ekranı aşmasın */
            height: auto;         /* Oranları koru */
            border-radius: 10px;  /* Hafif yuvarlak köşeler */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Hafif gölge efekti */
        }
        .message {
            text-align: center; /* Mesajı ortala */
            margin-top: 30px;  /* Görsel ile mesaj arası boşluk */
            font-size: 20px;
            color: #444;
            padding: 15px;     /* Mesaj kutusuna iç boşluk */
            background-color: #fff; /* Beyaz arka plan */
            border-radius: 8px; /* Hafif yuvarlak köşeler */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Mesaj kutusuna gölge */           
        }
        .error {
            color: red; /* Hata mesajı için kırmızı renk */
        }
    </style>
</head>
<body>
    <div class="img-container">
        <img src="images.png" alt="Sinop Üniversitesi Logo" class="img">
    </div>

    <?php 
       if (!empty($_COOKIE['sonuc_message'])) {
        $message = urldecode($_COOKIE['sonuc_message']);
        echo "<div class='message'>$message</div>";
    } else {
        echo "<div class='message error'>Bir hata oluştu. Lütfen bilgilerinizi kontrol edin.</div>";
    }
    
    ?>
</body>
</html>
