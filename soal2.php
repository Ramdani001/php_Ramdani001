<!-- <?php

// Tampilan 1

echo "<table>
        <tr id='temp1'>
            <td> 
                <label for='name'>Nama Anda : </label>
            </td>
            <td> 
                <input type='text' name='name' id='name' placeholder='Masukan Nama Anda' required>
            </td>
        </tr>
        <tr id='temp2'>
            <td> 
                <label for='name'>Nama Anda : </label>
            </td>
            <td> 
                <input type='text' name='name' id='name' placeholder='Masukan Nama Anda' required>
            </td>
        </tr>
        <tr id='temp1'>
            <td> 
                <label for='name'>Nama Anda : </label>
            </td>
            <td> 
                <input type='text' name='name' id='name' placeholder='Masukan Nama Anda' required>
            </td>
        </tr>
        <tr>
            <td>
                <button type='button' name='btnSbt' id='btnSbt'> Submit </button>
            </td>
        </tr>
    </table>";
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>

    <style>
        .none{
            display: none;
        }
    </style>

</head>
<body>
    <!-- Tampilan 1 (Nama) -->
    <table id='temp1'>
        <tr>
            <td> 
                <label for='name'>Nama Anda : </label>
            </td>
            <td> 
                <input type='text' name='name' id='name' placeholder='Masukan Nama Anda' required>
            </td>
        </tr>
        <tr>
            <td>
                <button type='button' name='btnSbt' id='btnSbt' onclick="inputData('name')"> Submit </button>
            </td>
        </tr>
    </table>

    <!-- Tampilan 2 (Umur) -->
    <table id='temp2' class="none">
        <tr>
            <td> 
                <label for='umur'>Umur Anda : </label>
            </td>
            <td> 
                <input type='text' name='umur' id='umur' placeholder='Masukan Umur Anda' required>
            </td>
        </tr>
        <tr>
            <td>
                <button type='button' name='btnSbt' id='btnSbt' onclick="inputData('umur')"> Submit </button>
            </td>
        </tr>
    </table>

    <!-- Tampilan 3 (Hobi) -->
    <table id='temp3' class="none">
        <tr>
            <td> 
                <label for='hobi'>Hobi Anda : </label>
            </td>
            <td> 
                <input type='text' name='hobi' id='hobi' placeholder='Masukan Hobi Anda' required>
            </td>
        </tr>
        <tr>
            <td>
                <button type='button' name='btnSbt' id='btnSbt' onclick="inputData('hobi')"> Submit </button>
            </td>
        </tr>
    </table>

    <!-- Tampilan 4 -->
    <div id='temp4' class="none">
        <table>
            <tr>
                <td>
                    Name : 
                    <span id="outputName"></span>
                </td>
            </tr>
            <tr>
                <td>
                    Umur : 
                    <span id="outputUmur"></span>
                </td>
            </tr>
            <tr>
                <td>
                    Hobi : 
                    <span id="outputHobi"></span>
                </td>
            </tr>
        </table>
        <button onclick="inputData('ulangi')">Ulangi</button>
    </div>

</body>
</html>

<script>
    let name = document.getElementById('name');
    let umur = document.getElementById('umur');
    let hobi = document.getElementById('hobi');
    let btnSubmit = document.getElementById('btnSbt');

    // Tampilan
    let tampilan1 = document.getElementById('temp1');
    let tampilan2 = document.getElementById('temp2');
    let tampilan3 = document.getElementById('temp3');
    let tampilan4 = document.getElementById('temp4');

    // Data
    let data = {
        name: "",
        umur: "",
        hobi: ""
    };

    function inputData(e){

        switch (e) {
            case 'name':
                if(name.value){

                    data.name = name.value;

                    tampilan1.classList.add('none');
                    tampilan2.classList.remove('none');
                }else{
                    name.focus();
                    alert("Harap Untuk Di isi terlebih dahulu!!!");
                }
                console.log(data);
                break;
            case 'umur':
                if(umur.value){

                    data.umur = umur.value;
                    tampilan2.classList.add('none');
                    tampilan3.classList.remove('none');
                }else{
                    umur.focus();
                    alert("Harap Untuk Di isi terlebih dahulu!!!");
                }
                    console.log(data);
                break;
            case 'hobi':
                if(hobi.value){
                    data.hobi = hobi.value;
                    tampilan3.classList.add('none');
                    tampilan4.classList.remove('none');

                    // Output
                        document.getElementById('outputName').innerText = data.name;
                        document.getElementById('outputUmur').innerText = data.umur;
                        document.getElementById('outputHobi').innerText = data.hobi;
                    // Output

                }else{
                    hobi.focus();
                    alert("Harap Untuk Di isi terlebih dahulu!!!");
                }
               
                break;
                
            default:
                    location.reload();
                break;
        }
    }
    

</script>