<?php

    $jml = $_GET['jml'];

    echo "<table border=1 style='border-collapse: collapse;' >\n";
    for ($a = $jml; $a > 0; $a--)
    {
        $temp = 0;
        for($c = $a; $c > 0; $c--){
            $temp += $c;
        }

        echo "<tr>\n";
        echo "<td colspan='$jml' style='padding: 4px;'> Total : $temp</td>";

        echo "<tr>\n";
        for ($b = $a; $b > 0; $b--)
        {
            echo "<td style='padding: 4px;'>$b</td>";
        }
    echo "</tr>\n";
    }
    echo "</table>";
