## Kas tai
Paprastas scenarijus konvertuoti edem.tv paslaugos sąrašą į tokį, kad 
kodi suprastų grupių užrašymą. Pagal nutylėjimą kodi nerodo grupių, 
konvertavus atvaizduojamos grupės, beto sukuriama grupė „mano“ kurioje
sudedami naudotojo pasirinkti kanalai(tie kanalai dubliuojamai, o ne
pašalinami iš originalios grupės).

## Naudojimas
Reikalingas failas „link.txt“ kuriame būtų jūsų edem.tv ar belekoks kitas
m3u formato sąrašas. Tam faile turi būti tiesiog nuoroda:
http://blablabla.bla/bla/bla2/blalistas.m3u

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

Kodi programoje(priede kuris naudos m3u sąrašą) nurodome šito failo url. 
pvz. http://margevicius.lt/convert.php
logiška būtų pavadint jį „tvlist_887545.php“(turi būt trumpas, kad būtų lengva įvest tvbox'e be klaviatūros, bet turi būt random, kad kasnors netyčia nerastų)

eilutėj:
```$megstamiausi=array(``` surašom kanalus iš orginalaus sąrašo, kuriuos norim matyt grupėj „Mano“

## Komentarai
komentarai kode surašyti man. kad nepamirščiau kas ir kaip :D
