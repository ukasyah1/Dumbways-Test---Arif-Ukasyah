<?php
    $hasil = [];
    if( isset($_POST['angka']) ){
        $data = explode(",", $_POST['angka']);

        for($i=0; $i<count($data); $i++){
                if( $data[$i] % 2 == 0){
                    unset($data[$i]);
                }
        }
        $data = array_values($data);
        for($i=0; $i<count($data); $i++){
            if( $data[$i] % 2 == 0){
                unset($data[$i]);
            }
        }
        $data = array_values($data);
        for($k=0; $k<3; $k++){
            for($j=0; $j<count($data); $j++){
                $data = array_values($data);
                    if( $data[$j] == max($data) ){
                        array_push($hasil, $data[$j]);
                        unset($data[$j]);
                        break;
                    }
    
                }
        }
            
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Masukan urutan angka dengan koma sbg pemisah</h3>
    <form action="" method="post">
        <label for="">Masukan Urutan Angka : </label>
        <input type="text" name="angka">
        <button type="submit">Mulai</button>
    </form>
    <br>
    <?php for($i=0; $i<count($hasil); $i++) : ?>
        <h3>Angka terbesar - <?= $i+1; ?> adalah <?= $hasil[$i]; ?> </h3>
    <?php endfor; ?>
</body>
</html>