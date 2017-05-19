<?php 

/*It's simple script to convert .m3u format playlist to .m3u format with 
groups formating understandable to kodi + add favourites gruop.  
    Copyright (C) 2017  gymka

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    */
    
     
header('Content-Type: text/html; charset=utf-8');

//=========sąrašo konvertavimas į kodi suprantamą grupių rašymą=========

$list=file("link.txt");
$play=file_get_contents(trim($list[0]));
$kanalai = explode("\n", $play);
unset($kanalai[0]);
foreach($kanalai as $n => $line) {

	//echo $line."<br>";
   if(stristr($line, "EXTGRP:")) {

	   $grupe=trim(str_replace("#EXTGRP:","",$line));
	   $grupeu=mb_convert_case($grupe, MB_CASE_TITLE, "UTF-8");

	   $pavadinimas=explode(",",$kanalai[$n-1]);
	   $pavadinimasu=trim(mb_convert_case($pavadinimas[1], MB_CASE_TITLE, "UTF-8"));
	   $kanalai[$n-1]="#EXTINF:0 group-title=\"$grupeu\",$pavadinimasu";
	  	  
	   }

}

//====================mėgstamiausių grupės kūrimas======================

$megstamiausi=array('Discovery Channel Hd', 'History HD','Discovery Channel', 'National Geographic HD','Наука 2.0', 'Авто 24', 'DTX','Discovery Science', 'Viasat Explore', 'ID Xtra', 'РОДНОЕ КИНО','Наше новое кино', 'СТС'); //norimi kanalai norima tvarka

for ($i=0; $i<count($megstamiausi); $i++) 
	{
		$a=preg_grep("/.*,$megstamiausi[$i].*/i",$kanalai); 
		foreach($a as $nr =>$nereikalinga) {
			 
			$mano_list[]=preg_replace("/group-title=\".*\"/","group-title=\"mano\"",$kanalai[$nr]);
			$mano_list[]=$kanalai[$nr+2]; //+2, nes unset() sukuria tuscia elementą
			}
	}

//=====================sąrašo atvaizdavimas=============================

header("Content-Disposition: attachment; filename=\"edem_list.m3u");
echo "#EXTM3U\n";
for ($i=0; $i<count($kanalai); $i++) 
	{
		if ($kanalai[$i]!="") { //pašalinam tą paliktą su unset()
			echo $kanalai[$i]."\n"; }
	}
for ($i=0; $i<count($mano_list); $i++) 
	{
			echo $mano_list[$i]."\n"; 
	}

?>
