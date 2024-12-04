<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OgrenciSinavYeriYoneticisi</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetAlert.js"></script>
</head>
<body>
    
<div class="content">
    <div class="login">
        <h1 class="header">GİRİŞ</h1>  
        <form id="loginForm" method="post" action="islem.php">
        <div class="content_form">
        <div class="userdetails">
            <div class="input-box">
               <span class="details">Öğrenci Numaranızı giriniz:</span>
                <input type="text" name="ogrenciNo" /><br><br>
                 <span class="details">Soyadınızı giriniz:</span>
                <input type="text" name="ogrenciSoyad" /><br><br>
            </div>
            <div class="input-box">
            <button type="submit" class="btn" name="ogrsorgula">Sorgula</button>
            <input type="reset" value="Reset" class="btn-reset">
            </div>
        </div> 
            <img src="images.png" class="sinop">
        </div>
        </form>
    </div> 
</div>

<?php if (isset($_GET['status']) && isset($_GET['message'])): ?>
    <script>
        Swal.fire({
            title: '<?php echo $_GET['status'] === "success" ? "Hoşgeldiniz!" : "Hata!"; ?>',
            text: '<?php echo addslashes($_GET['message']); ?>',
            icon: '<?php echo $_GET['status'] === "success" ? "success" : "error"; ?>',
            timer: 3000,
            timerProgressBar: true,
            willClose: () => {
                <?php if ($_GET['status'] === "success"): ?>
                    window.location.href = 'sonuc.php';
                <?php else: ?>
                    window.location.href = 'index.php';
                <?php endif; ?>
            }
        });
    </script>
<?php endif; ?>


</body>
</html>