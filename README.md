# telegram-news-notifier
With telegram news notifier you are able to publish news in your channel from a RSS feed in another site.
<p>Remember to set a cron job for the file of your source. In this project the file that should be run in cron job is news-bitcoin-com.php
  </p>
  <p>Below you can see the command for cron job. Set the common settings on "Once per minute (****)".</p>
  <pre>
  /usr/local/bin/php /home/host_username/public_html/news-bitoin-com.php >/dev/null 2>&1
  </pre>
