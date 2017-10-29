<?php
$day = date(d);
$year = date(y);
$b= strftime("%b");
$a= strftime("%a");
date_default_timezone_set("Etc/GMT");
$rss_feed = simplexml_load_file("https://news.bitcoin.com/feed/");
if(!empty($rss_feed)) {
$i=0;
foreach ($rss_feed->channel->item as $feed_item) {
if($i>=1) break;
$newspubd = $feed_item->pubDate;

$t = date("G:i:s");

$dt = "$a, $day $b $year $t +0000";
$news = new DateTime("$newspubd");
$main = new DateTime("$dt");
$duration = $main->diff($news); //$duration is a DateInterval object
$sum = $duration->format("%H%I%s");
$h = $duration->format("%H");
$i = $duration->format("%I");
$s = $duration->format("%s");
$sumze1 = sprintf("%02d", $i);
$sumze2 = sprintf("%02d", $s);
$sumze3 = sprintf("%02d", $h);
echo "$sumze3$sumze1$sumze2";
$sumza = "$sumze3$sumze1$sumze3";
$tt = $feed_item->title;
$linkt = "Link to news: $feed_item->link";
$source = "Source: Bitcoin News";
$des = implode(' ', array_slice(explode(' ', $feed_item->description), 0, 50)) . "..."; 
$desfi = strip_tags($des);
$textm = "$tt \n Description: $desfi \n $source \n $linkt";
$nonhtmtext = strip_tags($textm);

?>



<?PHP
require('telegram-bot-api.php');
$token = 'BOT-TOKEN;
    $bot = new telegram_bot($token);
    $to = '@channelid';
    if($sumza<60){
    $rs = $bot->send_message($to , "$nonhtmtext" , null, null);
        print_r($rs);
    };
  
        ?>
<?php		
$i++;	
}}
?>
