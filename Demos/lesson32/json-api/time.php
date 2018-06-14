<?php
date_default_timezone_set("Europe/Brussels");
$current_time = ["hour" => date("h:m:s")];
echo json_encode($current_time);