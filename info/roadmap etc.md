## Roadmap:

- Artikkelside
- Enkeltside (om oss, etc)
- Søkefunksjon
- Dropdown kategoria i menyen (og links på dei)
- 404 side
- Theme customizing (colors, front page, ad)

- Endless scroll / Les også

- Implementering (wp admin, plugin og categories fixing)

-------------------------------------

## Backlog: 

---------------------------
Row group system:

  Row group system sketch:

  row_gr_started = 0

  if row_gr_started == 0
    lag row gr

  når row endast: row_gr_started = 0

  ------------------------
  i starten, sett: 
  kor monge rows i gruppa = 1
  group row counter = 0
  +1 på slutten av ei rad
  om group row counter = rows i gruppa:
    end row
    row_gr_started = 0


- add session storage to dark/light mode
- Gjere listepunkt i quiz-sake store
- Fkn fiks dens shoddy top spacing under meny driten, kanskje fjern big meny altogether på mobil
- Fjerne ingress i cover når den ikkje he en
- farge + stoff på kategorioverskrifte. gjere overskrift til eigen part som regna ut med same som tags?
- bug: svart logo på mobil
- Tag kankje være opa css category, flytt inni noke
- ikkje-landscape bilde i one-split trenge likevel litt høgde. 50% wrapper height.
- padding til ingressa. 100px på store?
- ei sak heite 'content'
- rydd opp i spacing underneath big header kode. meir php heavy, legge inn spacer? janky på mob og?
- mindre padding på ad gruppe, og på mobil generelt
- landscape photos på full width på mobile og?
- bug: det e mulig å size vinduet akkurat til breakpointet og kuke reglane
- Link hovers:
  - ei greie for å få lysare/mørkare versjona av noværande farge på link hover, theme basert
  - gjere 'dark' og 'link hover/excentuate' shit til theme colors
- korleis i sveise fe en material icons til å laine opp m tekst
- source of truth for rad typa, enum
- farge transition mixing å legge på alle ting, in case dark mode
- legg til artikkelside (og andre sider?) i layout struktur
- straight up ikkje vis stor header på mobil
- fyll bildecontainer med nåke anna mens bilde lazyloada
- cover types dont work on front page rn
- bruke Quiz-article class til å gi store quiz kulepunkt
- option for pages for å skjule bilde, overskrift or all
- endre ka farga som kjeme når du velga tekst (kategorifarge?)

------------------------------------

## Rescources:

Template structure:
https://wphierarchy.com/

Followandrew:
https://www.youtube.com/watch?v=-h7gOJbIpmo

Om fleksibel layout:
https://developer.wordpress.org/themes/customize-api/
.. korleis bruke custom info en he satt opp?
advanced custom fields


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
- for å få kategoriside til å ikkje ha /category/ først går du på permalink settings, sette custom structure til /%category%/%year%/%monthnum%/%day%/%postname%/ og category slug til .  (Må også ikkje ha side som overkjøre)
- Det som slowa ned flywheel til helvete va getimagesize()
- For bakgrunnsfarge på ei radgruppe, wrap den i en div og gi den fargen

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

Artikkel:
-https://www.dn.no/d2/mote/klar/nordmarka/signe-veiteberg/en-hyllest-til-nordmarka/7-1-sfjciek3i6
-https://www.dn.no/d2/klokke/klokker/erling-braut-haaland/norske-micromilspec-lager-klokker-for-militare-spesialstyrker-og-erling-braut-haaland/7-1-vlc9wudkw7


-------------------------

## Husk:
- Å gjere DIN i admin til en linka font
- Oversett filene til engelsk
- Få inn HTML5 artikkel tags
- Skriv en plass WP'en må være på norsk for dates
- Backup plugin
