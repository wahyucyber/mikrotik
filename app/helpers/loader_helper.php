<?php 

/* 
* Load env file
 */
function env($key)
{
   return parse_ini_file(FCPATH.".env")[$key];
}