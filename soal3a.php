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
                    
                    var responseArray = JSON.parse(response);
                    var tbody = document.getElementById('searchList').getElementsByTagName('tbody')[0];

                    // Clear existing content in tbody (optional)
                    tbody.innerHTML = "";

                    // Loop through the array and append each element to the tbody
                    for (const data of responseArray.data) {
                        var newRow = document.createElement("tr");
                        var nama = document.createElement("td");
                        var alamat = document.createElement("td");
                        var hobi = document.createElement("td");
                        
                        nama.textContent = data.nama || ''; // Handle cases where data.nama is undefined or null
                        alamat.textContent = data.alamat || '';
                        hobi.textContent = data.hobi || '';

                        newRow.appendChild(nama);
                        newRow.appendChild(alamat);
                        newRow.appendChild(hobi);

                        tbody.appendChild(newRow);
                    }
                    console.log(typeof responseArray);

                    document.getElementById('listing').classList.add('none');
                    document.getElementById('searchList').classList.remove('none');
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