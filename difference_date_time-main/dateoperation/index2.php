<?php
    $d1="2021-04-08 22:45:00";
    $d2="2021-04-08 10:44:01";

    function time_operation($heure_envoie,$heure_reception)
    {
        
        $date1 = strtotime($heure_envoie);
        $date2 = strtotime($heure_reception);

        // Formulate the Difference between two dates
        $diff = abs($date2 - $date1);


        // To get the year divide the resultant date into
        // total seconds in a year (365*60*60*24)
        $years = floor($diff / (365*60*60*24));


        // To get the month, subtract it with years and
        // divide the resultant date into
        // total seconds in a month (30*60*60*24)
        $months = floor(($diff - $years * 365*60*60*24)
        / (30*60*60*24));


        // To get the day, subtract it with years and
        // months and divide the resultant date into
        // total seconds in a days (60*60*24)
        $days = floor(($diff - $years * 365*60*60*24 -
        $months*30*60*60*24)/ (60*60*24));


        // To get the hour, subtract it with years,
        // months & seconds and divide the resultant
        // date into total seconds in a hours (60*60)
        $hours = floor(($diff - $years * 365*60*60*24
        - $months*30*60*60*24 - $days*60*60*24)
        / (60*60));


        // To get the minutes, subtract it with years,
        // months, seconds and hours and divide the
        // resultant date into total seconds i.e. 60
        $minutes = floor(($diff - $years * 365*60*60*24
        - $months*30*60*60*24 - $days*60*60*24
        - $hours*60*60)/ 60);


        // To get the minutes, subtract it with years,
        // months, seconds, hours and minutes
        $seconds = floor(($diff - $years * 365*60*60*24
        - $months*30*60*60*24 - $days*60*60*24
        - $hours*60*60 - $minutes*60));

        // Print the result
        if($years==0 && $months==0 && $days==0)
        {
            printf(" %d:"
        . "%d:%d",$hours, $minutes, $seconds);
        }
        elseif($years==0 && $months==0)
        {
            printf("%d days, %d:"
        . "%d:%d", $days, $hours, $minutes, $seconds);
        }
        elseif($years==0)
        {
            printf("%dmonth %dday %d:"
        . "%d:%d", $months,
        $days, $hours, $minutes, $seconds);
            
        }        
        else{
        printf("%d years, %d month, %d days, %d:"
        . "%d: %d", $years, $months,
        $days, $hours, $minutes, $seconds);
        }
        
    }
    
    time_operation($d1,$d2);
?>