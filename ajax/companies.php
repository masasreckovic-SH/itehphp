<?php

$companies[] = 'Microsoft';
$companies[] = 'Meta';
$companies[] = 'Google';
$companies[] = 'BP';
$companies[] = 'McDonalds';
$companies[] = 'Coca-Cola';


if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $suggestion = "";

    if ($query !== "") {
        $query = strtolower($query);
        $length = strlen($query);

        foreach ($companies as $company) {
            if (stristr($query, substr($company, 0, $length))) {
                if ($suggestion == "") {
                    $suggestion = $company;
                } else {
                    $suggestion .= ", $company";
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
