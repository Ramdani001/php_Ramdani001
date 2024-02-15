<?php
    require 'connection.php';

    $query = "SELECT * 
              FROM person
              JOIN hobi ON hobi.person_id = person.id
              ";

    $getData = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 3 - Searching Data</title>
</head>
<style>
    #listing td{
        padding: 10px;
    }

    #searchList td{
        padding: 10px;
    }

    .none{
        display: none;
    }

</style>
<body>
    <!-- All data -->
    <table border="1" style="border-collapse: collapse;" id="listing">
        <thead>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Hobi</td>
        </thead>
        <?php 

            foreach ($getData as $key) {
        ?>
            <tbody>
                <td> <?= $key['nama'] ?> </td>
                <td><?= $key['alamat'] ?></td>
                <td><?= $key['hobi'] ?></td>
            </tbody>
        <?php }?>
    </table>
    <table border="1" style="border-collapse: collapse;" id="searchList" class="none">
        <thead>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Hobi</td>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <br>
    <!-- Seacrh -->
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="nama">Nama : </label>
                </td>
                <td>
                    <input type="text" name="nama" id="nama" placeholder="Masukan Nama">
                </td>
            </tr>
            <!-- <tr>
                <td>
                    <label for="alamat">Alamat : </label>
                </td>
                <td>
                    <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat">
                </td>
            </tr> -->
            <tr>
                <td>
                    <button type="button" id="btnSrc" name="btnSrc" onclick="searchFunc()">
                        SEARCH
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Seacrh -->

    <script src="jquery.js"></script>
    <script>

        function searchFunc(){
            let nama = document.getElementById('nama').value;
            // let alamat = document.getElementById('alamat').value;
            
            var sendData = {
                nama: nama
                // alamat: alamat
            }

            $.ajax({
                type: "POST",
                data: sendData,
                url: "search.php",
                success: function(response){
                    document.getElementById('listing').classList.add('none');
                    document.getElementById('searchList').classList.remove('none');

                    console.log(response);


                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
                
            })

        };
    </script>
</body>
</html>