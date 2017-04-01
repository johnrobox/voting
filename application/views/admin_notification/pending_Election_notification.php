<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$pendingElectionCounter   =   0;
foreach($querys as $rowMessage1) { 
           if($rowMessage1->election_screening==0){ 
            $pendingElectionCounter++;
           }
        }
?>
             <?php echo $pendingElectionCounter?>

