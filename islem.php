<?php
require 'baglan.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ogrenci_no = $_POST['ogrenciNo'];
    $ogrenci_soyad = $_POST['ogrenciSoyad'];

    try {
        $sql = "SELECT ob.ogrenci_no, ob.ogrenci_ad, ob.ogrenci_soyad, od.ogrenci_ders_sayisi 
                FROM ogrenci_bilgileri ob
                JOIN ogrenci_durum od ON ob.ogrenci_id = od.ogrenci_id
                WHERE ob.ogrenci_no = :ogrenci_no AND ob.ogrenci_soyad = :ogrenci_soyad";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ogrenci_no', $ogrenci_no);
        $stmt->bindParam(':ogrenci_soyad', $ogrenci_soyad);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Kullanıcı kayıtlıysa
            $ders_sayisi = (int)$result['ogrenci_ders_sayisi'];
            $ogrenci_ad = $result['ogrenci_ad'];
            $ogrenci_soyad = $result['ogrenci_soyad'];

            // Ders sayısına göre mesaj oluştur
            if ($ders_sayisi >= 8) {
                $message = "Sayın $ogrenci_ad $ogrenci_soyad, sınav yeriniz A dersliğidir. Başarılar!";
            } elseif ($ders_sayisi >= 6) {
                $message = "Sayın $ogrenci_ad $ogrenci_soyad, sınav yeriniz B dersliğidir. Başarılar!";
            } elseif ($ders_sayisi >= 4) {
                $message = "Sayın $ogrenci_ad $ogrenci_soyad, sınav yeriniz C dersliğidir. Başarılar!";
            } else {
                $message = "Sayın $ogrenci_ad $ogrenci_soyad, sınav yeriniz henüz belirlenmedi.";
            }

            // Sweet Alert için yönlendirme
            header("Location: index.php?status=success&message=" . urlencode("Hoş geldiniz $ogrenci_ad $ogrenci_soyad! Yönlendiriliyorsunuz."));
            // Kullanıcıyı sonuc.php'ye taşımak için mesajı da gönderebilirsiniz
            setcookie("sonuc_message", urlencode($message), time() + 864000, "/");
            exit;
        } else {
            // Kullanıcı kayıtlı değilse hata mesajı göster
            header("Location: index.php?status=error&message=" . urlencode("Sonuç bulunamadı. Lütfen bilgilerinizi kontrol edin."));
            exit;
        }
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}
