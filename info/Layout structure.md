# Layout structure

[] = Times the element should can be used. [min..max]
() = Class variants. '/' means they are mutually exclusive.
-> = This is a template part

`````````````````````````````````````````````````````````````````

body (dark-mode) {

  -> header-part.php {
    -> menu-overlay.php {

      menu (dark) {
        icons [1] {
          search-btn [1]
          search-input [1]
          ui-mode-toggle [0..1]
          menu-exit [1]
        }
        large-categories [0..1] {
          category [1..x]
        }
        small-menu-items [0..1] {
          menu-item [1..x]
        }
        menu-footer [0..1] {
          social-icons [0..1] {
            icon [1..x]
          }
          row {
            text
            wrapper
          }
        }
        menu-overlay-bg [1]
      }
    }

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
  }


  rad-gruppe [0..x] {

    rad-overskrift [0..1]
    -> ad.php{
    annonse-tag [0..1]
    ad [0..1]
    }
    rad [1..x] (cover/one-split/two-split/three-split/three-split-alt) {

      -> sak.php [1..3] [rad.variant] (one-split om rad.variant == three-split-alt) {

        bilde-wrapper [1] (landscape) {
          bilde [1] 
        }
        tekstdel [1] {
          overskrift [1]
          ingress [0..1]
        }
        -> tags.php [0..1] {
          tag [1..3]
        }
        byline [1 if sak.type = cover]
        date [1 if sak.type = cover]
      }
      kolonne [0. 1 om rad.variant == three-split-alt] {
        sak [2]
      }
    }
  }
}
