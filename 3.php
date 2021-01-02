<?php
    $a = ['D','U','M','B','W','A','Y','S'];
    print_r($a);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td {
        border: 1px solid black;
        }
        td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <table >
        <?php for($k=0; $k<count($a); $k++) {?>
            <tr>
                <?php for($i=0; $i<count($a); $i++) {?>
                    <td> <?= $i ?></td>
                    <?php if($i == $a) {?>
                        <td></td>
                    <?php } ?>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    
</body>
</html>