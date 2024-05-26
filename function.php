<?php

    // Untuk membuat fungsi rupiah
    function buatRp($angka){
        $rupiah = "Rp " . number_format($angka,'2',',','.');
        return $rupiah;
    }
?>