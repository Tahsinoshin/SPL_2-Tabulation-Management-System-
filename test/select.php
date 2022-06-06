<?php


$string= "PhysicsHonors1stRetake(5).xlsx";


//$output=str_replace( array('(',')') , ''  , $string );
$option_title = preg_replace('(\\(.*?\\))', '', $string);

echo $option_title;
?>