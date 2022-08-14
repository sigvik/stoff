<div class="share-icons">
  <div class="social-icons">

    <button 
      class="icon copy m_icon"
      title="Kopier lenke"
      onclick="
        navigator.clipboard.writeText('<?php echo get_the_permalink() ?>');
        this.innerHTML = 'Kopiert!';
        setTimeout(() => {this.innerHTML = '<?php echo m_symbol('e14d') ?>'}, 800);
      "
    >
      <?php echo m_symbol('e14d') ?>
    </button>

    <a 
      <?php $link = "https://facebook.com/sharer.php?u=" . get_the_permalink() ?>
      href="<?php echo $link ?>" 
      class="icon facebook"
      target="_blank"
      rel="noreferrer"
      title="Del på Facebook"
      onclick="window.open(
        '<?php echo $link ?>',
        'popup',
        'width=600,height=600'
        ); return false;"
      >
      
    </a>

    <a 
      <?php $link = "https://twitter.com/share?url=" . get_the_permalink() ?>
      href="<?php echo $link ?>" 
      class="icon twitter"
      target="_blank"
      rel="noreferrer"
      title="Del på Twitter"
      onclick="window.open(
        '<?php echo $link ?>',
        'popup',
        'width=600,height=600'
        ); return false;"
      >
      
    </a>

  </div>
</div>
