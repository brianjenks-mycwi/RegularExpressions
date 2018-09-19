<?php
    function separator($val=null) {
    if (!$val) {
        $val = mt_rand(1,6);
    }
    echo "<br><b>";
    switch ($val) {
    case 6:
        echo "-----HEYOOOOOOOOO!!-----";
        break;
    case 1:
        echo "......ECHOOOOOOOOOOOO......";
        break;
    case 2:
        echo ".........ECHO! echo! echo.....";
        break;
    case 3:
        echo "-----WHERE'S MY CODE?!!!!-----";
        break;
    case 4:
        echo "-----_______d~(^-^)~b_______-----";
        break;
    case 5:
        echo "-----_____(>.O)_____-----";
        break;
    default:
        echo "********** $val **********";
        break;
    }
    echo "</b><br>";
}