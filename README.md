## Kas tai
Paprastas scenarijus konvertuoti edem.tv paslaugos sąrašą į tokį, kad 
kodi suprastų grupių užrašymą. Pagal nutylėjimą kodi nerodo grupių, 
konvertavus atvaizduojamos grupės, beto sukuriama grupė „mano“ kurioje
sudedami naudotojo pasirinkti kanalai(tie kanalai dubliuojamai, o ne
pašalinami iš originalios grupės).

## Konfigūracija
Reikalingas failas „link.txt“ kuriame būtų jūsų edem.tv ar belekoks kitas
m3u formato sąrašas. Tam faile turi būti tiesiog nuoroda:
`http://blablabla.bla/bla/bla2/blalistas.m3u`

Dar vienas failas „kanalai.txt“ ten surašyti kanalai kurie bus grupėj „Mano“
pavadinimus imam iš orginalaus grojaraščio. Vienoj eilutėj vienas pavadinimas.

Kodi programoje(priede kuris naudos m3u sąrašą) nurodome šito failo url. 
pvz. http://margevicius.lt/convert.php
logiška būtų pavadint jį „tvlist_887545.php“(turi būt trumpas, kad būtų lengva įvest tvbox'e be klaviatūros, bet turi būt random, kad kasnors netyčia nerastų)

## Kaip atrodo grupių rašymas
Edem.tv m3u grupių užrašymas:
```
#EXTINF:0,TV 1000 Русское кино
#EXTGRP:кино
http://blablabla.bla/index.m3u8
```

Kodi suprantamas grupių užrašymas:
```
#EXTINF:0 group-title="Кино",Tv 1000 Русское Кино
http://blablabla.bla/index.m3u8
```

Po teksto `#EXTINF:0` galim įrašyt ir kitų konfigūracijos pasirinkimų, pvz.
`tvg-shift` epg laiko juostos pasukimas
`tvg-name` vardas pagal kurį bus ieškoma epg info/taip kaip kanalas pavadintas epg šaltinyje
`tvg-logo` kanalo logo
`audio-track` pageidaujama audio kalba pvz. `eng, rus, lit` pagal `ISO 639-2` standartą
`aspect-ratio` galimos reikšmės `16:9, 3:2, 4:3, 1,85:1, 2,39:1`
