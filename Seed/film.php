<?php
require_once __DIR__ .'/../Model/Film.php';

$film = new Film();

for($i = 0;$i<100;$i++){
    $film->add("Spiderman Far From Home ".$i, "spiderman".$i.".png", "0.0", "2019-0".($i%10)."-".($i%30), "".$i, "Menceritakan kehidupan seorang spiderman".$i);
}