<?php

/**
 * @param string $path
 * @return string
 */
function path(string $path): string
{
    return BASE_PATH . $path;
}

function view(string $view): string
{
    return path('views/' . $view);
}

// Cambia los datos de fecha de SQL en un formato escrito: 1000-10-10 -> oct 10, 1000.
function dateFormat ($date) {
    if (isset($date)) {
        // Manera rápida de verificar que el parámetro aportado es una fecha.
        if (strlen($date) === 10 && strpos($date, '-') > 0) {
            // Este substr consigue 2 caracteres de un string tipo fecha (XXXX-XX-XX) a partir de la posicion 5. Es decir, devuelve los dos dígitos del mes.
            $numericMonth = substr($date, 5, 2);
            switch ($numericMonth) {
                case '01':
                    $month = 'jan';
                    break;
                case '02':
                    $month = 'feb';
                    break;
                case '03':
                    $month = 'mar';
                    break;
                case '04':
                    $month = 'apr';
                    break;
                case '05':
                    $month = 'may';
                    break;
                case '06':
                    $month = 'jun';
                    break;
                case '07':
                    $month = 'jul';
                    break;
                case '08':
                    $month = 'aug';
                    break;
                case '09':
                    $month = 'sep';
                    break;
                case '10':
                    $month = 'oct';
                    break;
                case '11':
                    $month = 'nov';
                    break;
                case '12':
                    $month = 'dec';
                    break;
            }

            $year = substr($date, 0, 4);
            $day = substr($date, 8);

            return $month . ' ' . $day . ', ' . $year;
        } else {
            return $date;
        }
    } else {
        return null;
    }
}

function timeFormat($time) {
    if (substr($time, 0, 3) >= 12) {
        return $time . ' PM';
    } else {
        return $time . ' AM';
    }
}

// Preformatea el resultado de var_dump y termina el script de después para leer los resultados con mayor claridad.
function pre($v) {
    print '<pre>';
    var_dump($v);
    print '</pre>';
    die();
}

// Intercambia las barrabajas por espacios en el nombre de las columnas de una tabla. (e.g. start_date -> start date).
// $array contiene las keys con barrabaja y en $newArray se guardan las de sin barrabaja.
function replaceUnderscore(array $array, $newArray = []) {
    foreach ($array as $key => $value) {
        if (strpos($key, '_') > 0) {
            $key = str_replace('_', ' ', $key);
        }
        $newArray[] = $key;
    }
    return $newArray;
}

// En un menú de navegación, coloca el <li> correspondiente a la página actual con opacity: 1 y a los demás con opacidad baja.
// $nav será un array que contiene cada entrada del menú de navegación deseado. (e.g. $nav = ['entrada1', 'entrada2']).
// $substrStart define a partir de que posicion del string $page cortar. (e.g. en /submit/anime busco la palabra anime, por lo que he de cortar a partir de la posición 8 para conseguirla).
function highlightNav(array $nav, $substrStart) {
    $page = parse_url($_SERVER['REQUEST_URI'])['path'];
    for ($i=0; $i < count($nav); $i++) {
        if ($nav[$i] === substr($page, $substrStart, strlen($page))) {
            print "<a href='".$nav[$i]."'><li class='current'>$nav[$i]</li></a>";
        } else {
            print "<a href='".$nav[$i]."'><li>$nav[$i]</li></a>";
        }
    }
}

function timeAgo($current, $reference) {
    $difference = strtotime($current) - strtotime($reference);
    if ($difference <= 60) {
        $difference === 1 ? $formatted = $difference . ' second ago' : $formatted = $difference . ' seconds ago';
    } else if ($difference <= 3600) {
        round(($difference / 60)) == 1 ? $formatted = round(($difference / 60)) . ' minute ago' : $formatted = round(($difference / 60)) . ' minutes ago';
    } else if ($difference <= 86400)  {
        round(($difference / 3600)) == 1 ? $formatted = round(($difference / 3600)) . ' hour ago' : $formatted = round(($difference / 3600)) . ' hours ago';
    } else {
        round(($difference / 86400)) == 1 ? $formatted = round(($difference / 86400)) . ' day ago' : $formatted = round(($difference / 86400)) . ' days ago';
    }

    return $formatted;
}