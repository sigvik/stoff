# Layout structure

[] = Times the element can be used. [min..max]

() = Class variants. '/' means they are mutually exclusive.

`````````````````````````````````````````````````````````````````

body (dark-mode) {

  header-wrapper (dark, pattern-bg) [0..1] {

    header-big [1] {

      hamburger [1]

      logo [1]

      header-menu-wrapper [0..1] {
        header-menu [1] {
          menu-item [0..x]
        }
      }

    }

  }

  rad-gruppe [0..x] {

    rad-overskrift [0..1]

    annonse-tag [0..1]
    ad [0..1]

    rad [1..x] (one-split/two-split/three-split/three-split-alt) {

      sak [1..3] [rad.variant] (one-split om rad.variant == three-split-alt) {

        bilde-wrapper [1] (landscape) {
          bilde [1] 
        }

        tekstdel [1] {

          overskrift [1]

          ingress [0..1]

          tags [0..1] {

            tag [1..3]

          }

        }

      }

      kolonne [0. 1 om rad.variant == three-split-alt] {

        sak [2]

      }

    }
    
  }

}
