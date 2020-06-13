<?php 

function formatada($data)
{
  $mydt = DateTime::createFromFormat('Y-m-d', $data ); 
      $formatd = $mydt->format('d/m/yy');
  
  return $formatd;
}