<!-- peertube -->
<?php
$host_url = esc_url($account->host);

if ('http' == parse_url($host_url, PHP_URL_SCHEME)) {
  $host_url = str_replace('http://', 'https://', $host_url); 
}
?>

<div class="fediembedi fediembedi-peertube scrollable" <?php if (!empty($height)) : echo "style='height: $height;'"; endif; ?>>
  <div role="feed">
    <?php if($show_header): ?>
    <div class="peertube-timeline__header">
      <div class="actor">
        <img class="avatar" alt="Avatar" src="<?php echo $host_url . $account->avatar->path; ?>" loading='lazy'>
        <div class="actor-info">
          <div class="actor-names">
            <a href="<?php echo $account->url; ?>" class="actor-display-link" rel="noreferrer noopener" target="_blank">
              <div class="actor-display-name"><?php echo $account->displayName; ?></div>
            </a>
            <div class="actor-name"><?php echo $account->name; ?></div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <div class="videos">
    <?php foreach ($status->data as $statut) : ?>
      <article class="video">
        <div class="video-inner">
          <div class="video-miniature">
            <iframe src="<?php echo $host_url . '/videos/embed/' . $statut->uuid; ?>" style="min-height: 400px; width: 100%;" frameborder="0" sandbox="allow-same-origin allow-scripts" allowfullscreen="allowfullscreen"></iframe>
          </div>
          <div class="video-bottom">
            <div class="video-miniature-information">
              <a class="video-miniature-name" title="<?php echo $statut->name; ?>" href="<?php echo $host_url . '/videos/watch/' . $statut->uuid; ?>"><?php echo $statut->name; ?></a>
              <div class="video-miniature-created-at-views">
                <time datetime="<?php echo $statut->publishedAt; ?>"><?php
                printf( _x( '%1$s ago', '%2$s = human-readable time difference', 'fediembedi' ),
                  human_time_diff(
                    wp_date("U", strtotime($statut->publishedAt))
                  )
                );
                ?></time>
                <span class="views"><?php printf( _x( '%1$s views', '%2$s = number of views', 'fediembedi' ), $statut->views); ?></span>
              </div>
              <!-- <a class="video-miniature-account" href="<?php echo $host_url . $account->avatar->path; ?>"><?php echo $statut->account->name; ?></a> -->
            </div>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
    </div>
  </div>
</div>
<?php 
