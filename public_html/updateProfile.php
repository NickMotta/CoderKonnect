<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/11/2018
 * Time: 8:50 AM
 * Project: Lab_12
 */

//connect to database.
require_once 'database.php';

$languages = $_POST['lang'];
$categories = $_POST['category'];
$API = $_POST['api'];

echo "<p>Uh-oh! Looks like we haven't finished this part! Sorry!</p>";





/**
 * This function will generate a string representation of different integers
 * separated by a comma. It will then return that string.
 */
function generateCategoryString($array)
{

    $s = "";            //String we're going to append to
    //Iterate through the array
    for ($i = 0; $i < $array.count(); $i++)
    {

        //Query the database for the ID of the selected value.
        $query = dbquery("SELECT c_id FROM Categories WHERE c_name='$array[$i]';");

        //$s .= "";

    }
}
