<?php 
    // timePost so sánh với timeCurrent
    $timePost = "12/12/12 10:10:10";
    $timeReply = "14/12/12 12:23:20";

    $format = "d/m/Y h:i:s";
    $datePost = date_parse_from_format($format, $timePost);
    $dateReply = date_parse_from_format($format, $timeReply);

    $tsPost = mktime($datePost["hour"], $datePost["minute"], $datePost["second"], $datePost["month"], $datePost["day"], $datePost["year"]);
    $tsReply = mktime($dateReply["hour"], $dateReply["minute"], $dateReply["second"], $dateReply["month"], $dateReply["day"], $dateReply["year"]);

    $distace = $tsReply - $tsPost;

    // 20 seconds ago
    // 20 minutes ago
    // 20 hours ago
    // Yesterday at 10:10:10 PM
    // 12/12/12 at 10:10:10

    $result = "";
    
    switch ($distace) {
        case $distace < 60:
            $result = ($distace == 1) ? $distace . " second ago" : $distace . " seconds ago";            
            break;

        case ($distace >= 60 && $distace <= 3600):
            $minute = round($distace / 60);
            $result = ($minute == 1) ? $minute . " minute ago" : $minute . " minutes ago";            
            break;

        case ($distace >= 3600 && $distace <= 86400):
            $hour = round($distace / 3600);
            $result = ($hour == 1) ? $hour . " hour ago" : $hour . " hours ago";            
            break;

        case (round($distace / 86400) == 1):
            $result = "Yesterday at " . date("h:i:s", $tsReply);
            break;
        
        default:
            $result = date("d:m:Y \a\s h:i:s", $tsReply);
            break;
    }

    echo $result;
?>