<?php
/**
 * Created by PhpStorm.
 * User: Kenneth Mintah Mensah
 * Date: 2/15/16
 * Time: 9:08 AM
 */

require_once 'adb_object.php';

class Offence extends adb_object{

    function Offence(){

    }


    /**
     * Executes a query to add an offence
     *
     * @param $vehicle_id
     * @param $location
     * @return bool
     */
    function addOffence($vehicle_id, $location){
        $str_query = "INSERT INTO offence SET
                      vehicle_id = '$vehicle_id',
                      location = '$location'";

        return $this->query($str_query);
    }

    function getDriverOffence($driver){
        $str_query = "SELECT *
                      FROM offence O INNER JOIN vehicle V
                      ON O.vehicle_id = V.license_no
                      INNER JOIN driver D
                      ON V.driver = D.PIN
                      WHERE D.PIN = '$driver'";

        return $this->query($str_query);
    }
}