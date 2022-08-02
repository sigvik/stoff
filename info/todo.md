## Todo:

Slutt å kuke med style choices, stresse med knotete løysinge. Gjer ting skikkelig i ro og mak.
Lær å avslutte i tide sjølom du ikkje e ferdig, også når ting går bra. Tenk først, kode etterpå. 
Gjer det enkelt, i same stil som andre. Hugg opp planen i bita først. Hugg også opp i bita til 
ka tid utover heile prosjektet, for å lage en trygg følelse av at det går i mål.

OPPDATER CSS VER FØR COMMIT

- Farge overskrifta:
  - Dele-funksjona for å finne kategoriclass, eller classen til overkategorien

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
  