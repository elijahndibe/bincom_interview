<?php
require "./database.php";

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $id = explode('/', $uri);
   $id = array_pop($id);

//    fetch lga

    if ($uri === '/lga/ajax/'. $id) {

    $sql = $conn->query("SELECT * FROM `lga` WHERE `state_id` = $id");
    $lga = array();
    while ($row = $sql->fetch_assoc()) {
    $lga[] = $row;
    }


    echo json_encode($lga);
    }

    // fetch ward

    if ($uri === '/ward/ajax/'. $id) {

        $sql = $conn->query("SELECT * FROM `ward` WHERE `lga_id` = $id");
        $ward = array();
        while ($row = $sql->fetch_assoc()) {
        $ward[] = $row;
        }
    
    
        echo json_encode($ward);
        }

        // fetch pu
        if ($uri === '/polling-unit/ajax/'. $id) {

            $sql = $conn->query("SELECT * FROM `polling_unit` WHERE `ward_id` = $id");
            $pu = array();
            while ($row = $sql->fetch_assoc()) {
            $pu[] = $row;
            }
        
        
            echo json_encode($pu);
            }

            // fetch pu result

            if ($uri === '/pu-results/ajax/'. $id) {

                $sql = $conn->query("SELECT * FROM `announced_pu_results` WHERE `polling_unit_uniqueid` = $id");
                $pu_results = array();
                if ($sql->num_rows == 0) {
                    $pu_results[] = 'No result found';
                }else{
               while ($row = $sql->fetch_assoc()) {
                $pu_results[] = $row;
                } 
            }
            
            
                echo json_encode($pu_results);
                }


                // fetch lga result
                if ($uri === '/lga-results/ajax/'. $id) {
                    $sql1 = $conn->prepare("SELECT * FROM ward WHERE lga_id = ?");
                $sql1->bind_param("i", $id);
                $sql1->execute();
                $result1 = $sql1->get_result();

                $lga_results = array();

                while ($row1 = $result1->fetch_assoc()) {
                    $ward_id = $row1['ward_id'];
    
                        $sql2 = $conn->prepare("SELECT * FROM polling_unit WHERE ward_id = ?");
                        $sql2->bind_param("i", $ward_id);
                        $sql2->execute();
                        $result2 = $sql2->get_result();

                        while ($row2 = $result2->fetch_assoc()) {
                            $pu_id = $row2['polling_unit_id'];
                            
                            $sql3 = $conn->prepare("SELECT party_abbreviation, SUM(announced_pu_results.party_score) AS total_score 
                            FROM announced_pu_results
                            WHERE polling_unit_uniqueid = ?
                            GROUP BY party_abbreviation");
                            $sql3->bind_param("s", $pu_id);
                            $sql3->execute();
                            $result3 = $sql3->get_result();

                            while ($fetchedResult = $result3->fetch_assoc()) {
                                $lga_results[] = $fetchedResult;
                            }
                        }
                    }

                    $summed_results = array();

                    foreach ($lga_results as $result) {
                        $party_abbreviation = $result['party_abbreviation'];
                        $total_score = $result['total_score'];
                        
                        if (array_key_exists($party_abbreviation, $summed_results)) {
                            $summed_results[$party_abbreviation] += $total_score;
                        } else {
                            $summed_results[$party_abbreviation] = $total_score;
                        }
                    }

                    echo json_encode($summed_results);

                }
                
}