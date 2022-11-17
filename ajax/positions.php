<?php

$positions[] = 'Principal Software Engineer';
$positions[] = 'Principal Data Scientist';
$positions[] = 'Chef';
$positions[] = 'Shipping Deck Cadet';
$positions[] = 'Product Technology Manager';
$positions[] = 'Partner Strategy Manager';
$positions[] = 'Software Engineering Manager';



if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $suggestion = "";

    if ($query !== "") {
        $query = strtolower($query);
        $length = strlen($query);

        foreach ($positions as $position) {
            if (stristr($query, substr($position, 0, $length))) {
                if ($suggestion == "") {
                    $suggestion = $position;
                } else {
                    $suggestion .= ", $position";
                }
            }
        }
    }
    if ($suggestion == "") {
        echo 'No suggestions';
    } else {
        echo $suggestion;
    }
}
