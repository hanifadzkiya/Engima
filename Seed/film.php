<?php
require_once __DIR__ .'/../Model/Film.php';

$film = new Film();

//for($i = 0;$i<100;$i++){
//    $film->add("Spiderman Far From Home ".$i,"spiderman".$i.".png","0.0","2019-0".($i%10)."-".($i%30),"".$i,"Menceritakan kehidupan seorang spiderman".$i);
//}

$film->add("Spiderman Far From Home", "spiderman.png", "2019-10-09 00:00:00", "120", "Menceritakan kehidupan seorang Spiderman menyelamatkan bumi dari Mysterio");

$film->add("Captain Marvel", "captain.png", "2019-10-09 00:00:00", "150", "Carol Denvers, seorang Kree warrior berada dalam perang antargalaksi.");

$film->add("Avatar: The Legend of Aang", "aang.png", "2019-10-10 00:00:00", "100", "Menceritakan kehidupan seorang Avatar yang ingin menyelamatkan dunia ketika Negara Api menyerang.");

$film->add("Avenger: Endgame", "avenger.png", "2019-10-10 00:00:00", "180", "Usaha seluruh avenger yang tersisa untuk melawan thanos dan mengembalikan teman mereka.");

$film->add("Crayon Sinchan", "crayon.png", "2019-10-12 00:00:00", "95", "Menceritakan kehidupan bocah TK crayon Sinchan");

$film->add("Doraemon", "doraemon.png", "2019-10-12 00:00:00", "100", "Petualangan Doraemon bersama dengan Nobita");

$film->add("Toy Story 4", "toystory.png", "2019-10-13 00:00:00", "95", "Menceritakan kehidupan seorang spiderman");

$film->add("Joker", "joker.png", "2019-10-14 00:00:00", "120", "Menceritakan kehidupan seorang spiderman");

$film->add("The Lion King", "thelionking.png", "2019-10-17 00:00:00", "140", "Menceritakan kehidupan seorang spiderman");

$film->add("Aladdin", "aladdin.png", "2019-10-17 00:00:00", "120", "Menceritakan kehidupan seorang spiderman");
