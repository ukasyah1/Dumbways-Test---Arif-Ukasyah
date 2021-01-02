<?php

function uangKemabali($uang, $totalBayar){
    $b = $uang - $totalBayar;
    $a = $uang - $totalBayar;
    echo 'Uang Dibayar = '.$uang;
    echo '<br>';
    echo 'Total Bayar = '.$totalBayar;
    echo '<hr>';
    echo '<br>';
    for($i=0; $i<9; $i++){
        if( $a - 100000 >= 0 ){
            $cepe = floor($a / 100000);
            $a = $a - ($cepe * 100000);
            echo 'Pecahan uang Rp 100.000 berjumlah = '.$cepe;
            echo '<br>';
        }elseif($a - 50000 >= 0){
            $gocap = floor($a / 50000);
            $a = $a - ($gocap * 50000);
            echo 'Pecahan uang Rp 50.000 berjumlah = '.$gocap;
            echo '<br>';
        }elseif($a - 20000 >= 0){
            $duaPuluh = floor($a / 20000);
            $a = $a - ($duaPuluh * 20000);
            echo 'Pecahan uang Rp 20.000 berjumlah = '.$duaPuluh;
            echo '<br>';
        }elseif($a - 10000 >= 0){
            $ceban = floor($a / 10000);
            $a = $a - ($ceban * 10000);
            echo 'Pecahan uang Rp 10.000 berjumlah = '.$ceban;
            echo '<br>';
        }elseif($a - 5000 >= 0){
            $goceng = floor($a / 5000);
            $a = $a - ($goceng * 5000);
            echo 'Pecahan uang Rp 5.000 berjumlah = '.$goceng;
            echo '<br>';
        }elseif($a - 1000 >= 0){
            $seceng = floor($a / 1000);
            $a = $a - ($seceng * 1000);
            echo 'Pecahan uang Rp 1.000 berjumlah = '.$seceng;
            echo '<br>';
        }elseif($a - 500 >= 0){
            $gope = floor($a / 500);
            $a = $a - ($gope * 500);
            echo 'Pecahan uang Rp 500 berjumlah = '.$gope;
            echo '<br>';
        }elseif($a - 100 >= 0){
            $seratus = floor($a / 100);
            $a = $a - ($seratus * 100);
            echo 'Pecahan uang Rp 100 berjumlah = '.$seratus;
            echo '<br>';
        }
    }

    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " triliun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
     
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }     
        return $hasil;
    }
    
    echo '<hr>';
    echo 'Kembalian = '.$b;
    echo '<br>';
    echo 'Terbilang = '.terbilang($b);
}
echo uangKemabali(557000, 250000);

?>