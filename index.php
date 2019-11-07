<?php
$i = 1;

while (false !== ($line = fgets(STDIN))) {
    if (strncmp($line, date('Y-m-d'), strlen(date('Y-m-d'))) === 0) {
        $str = substr($line, 34);
        if (strncmp($str, 'Query', strlen('Query')) === 0) {
            if ($sql != '') {
            }
            $sql = '';
            if (stripos($str, 'select') !== false && stripos($str, 'user') !== false) {
                $sql .= $str;
                $combine = true;
            }
        } else {
            $combine = false;

            echo "\e[1;37;41m " . $i++ . " \e[0m";
            echo "\n";
            // echo str_ireplace("\n", '', $sql);
            echo $sql;
            echo "\n";
        }
    } else {
        if ($combine) {
            $sql .= $line;
        }
    }
}
