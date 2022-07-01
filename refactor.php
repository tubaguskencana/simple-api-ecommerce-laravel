<?php
function refactor($data){
    $distance = 350;
    foreach ($data as $vehicleTypes => $vehiclesSpeed){
        // The boat needs extra 15 min to get ready, so we add + 0.25H
        if ($vehicleTypes == 'boat') {
            $output = $vehicleTypes . ": ". (($distance/$vehiclesSpeed) + 0.25);
        } else {
            $output = $vehicleTypes . ": ". $distance/$vehiclesSpeed;
        }
        echo $output . "\n";
    }
}
$data = [
    'sport-car' => 150,
    'truck' => 60,
    'bike' => 100,
    'boat' => 50
];
echo "Duration of each vehicle to reach destination \n";
echo refactor($data);