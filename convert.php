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

$list=file("link8jfakdjf.txt");
$play=file_get_contents(trim($list[0]));
$kanalai = explode("\n", $play);
unset($kanalai[0]);
foreach($kanalai as $n => $line) {

	//echo $line."<br>";
   if(stristr($line, "EXTGRP:")) {

	   $grupe=trim(str_replace("#EXTGRP:","",$line));
	  

	   $pavadinimas=explode(",",$kanalai[$n-1]);
	   $pavadinimas=trim($pavadinimas[1]);
	   $kanalai[$n-1]="#EXTINF:0 group-title=\"$grupe\",$pavadinimas";
	  	  
	   }

}

//====================mėgstamiausių grupės kūrimas======================

$megstamiausi=file('kanalai.txt');

for ($i=0; $i<count($megstamiausi); $i++) 
	{
		$megstamiausi2=trim($megstamiausi[$i]);
		$a=preg_grep("/.*,$megstamiausi2.*/i",$kanalai); 

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
		if ($kanalai[$i]!="") { 
			echo $kanalai[$i]."\n"; }
	}
for ($i=0; $i<count($mano_list); $i++) 
	{
			echo $mano_list[$i]."\n"; 
	}

?>
