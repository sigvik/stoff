## Todo:

Slutt å kuke med style choices, stresse med knotete løysinge. Gjer ting skikkelig i ro og mak.
Lær å avslutte i tide sjølom du ikkje e ferdig.

- Mekke artikkelside
  - https://www.youtube.com/watch?v=-h7gOJbIpmo&list=LL&index=6
  - begynde med template parts

-------

## Seinare:

- artikkel
- portraits på mob bør få full size


-------------------------------------

## Backlog: 

- mindre padding på ad gruppe, og på mobil generelt
- finne ut av bilde resizing. gjere rade til grids? nja)
- fiks header osv, wordpress shite
- landscape photos på full width på mobile og?
- bug: det e mulig å size vinduet akkurat til breakpointet og kuke reglane
- ta alle px2rem tilbake til berre rem, og constantane tilbake til var(--)?
- add session storage to dark/light mode
- Legg til meny i layout structure
- endre struktur på framsidesak til at bilde/overskrift/ingress ligge under samme link
- ei greie for å få lysare/mørkare versjona av noværande farge på link hover, theme basert

------------------------------------

## Rescources:

Om fleksibel layout:
https://developer.wordpress.org/themes/customize-api/
.. korleis bruke custom info en he satt opp?
advanced custom fields

-------------------------------

## Prosess:

- (Lære grid, flexbox, html article markup og Sass)
- Sketche sida komplett ferdig i figma, alle layouts og stilvalg spikra
- Planlegge struktur mtp ka som kan endrast inni wordpress
- Bygge sida statisk
- Gjere den statiske sida til wordpress theme,
  først som kun tom index/style og so bygge oppatt gradvis


-------------------------

## Mysteries:
- Korfor blir brødteksta fakka av og til, med tilsynelatande same formatering
- korleis funka utgave systemet, e visst ikkje BERRE categories. slags search term? virka introdusert i nye themen. nåke basic php sql variable shit?
- suggested articles e berre forsidesakene til tidligare utgave? (OG ALLE AV DEI?)
- vanilla framside vise kun stickies?
- korleis kan vi få gamle utgave til å ha en viss custom layout?

## Solved mysteries:
- Riktig themenavn må oppdaterast i alle style.css paths
- Versjonnavn på css må oppdaterast i header for refresh
- der e functions fil i themen som drive å endra admin adressa til ny.stoffmagasin wtf
- mobile ver hiding skjer via hidden-md down classes
- single-portrait vise post info importing. skjer med funksjona
- current issue tingen e berre kategoria. Current issue e hardkoda for some reason
- å forkaste utgave-systemet vil ikkje ødelegge article links
- utgavesystemet funka med vanlig php. GET[x] henta y fra url.com/?x=y. for å linke andre utgave laga det berre url.com/?x=y links
- wp adminbar e i footer pga wp, og litt nede fordi han he styla den customly

------------------------

## Other business:

.. finne ut om vi he prøvd å kjøpe stoff.no
.. foreslå vi burde opprette en wikipedia artikkel for stoff magasin

-------------------------

## Inspos:

- Medium.com med riktige fonta, Grist, It's Nice That
- D2, Subjekt
- MIC, Elite Daily
- K7bulletin, Samviten

-------------------------

## Husk:
- Optimize logo svg
- Å gjere DIN i admin til en linka font
- Oversett filene til engelsk
- Unhide standard wordpress header/footer
- Få inn HTML5 artikkel tags
- Friske opp css fila med sass: 
  - mtp at ting som skal recolorast må ha bgcolor: bgcolor omigjen osv
  - tags og menu item ligna
  - monge vil ha matchande font size / line height
- menyknappane e løyst VELDIG hacky. Pros he probably ei clean løysing.
- Oversette dei norske css klassene til engelsk