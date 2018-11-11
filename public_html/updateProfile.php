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

echo <<<_END
<!doctype html>
<html>
<body>

_END;

print_r($_POST[lang]);

echo <<<_END
</body>
</html>
_END;




/**
 * This function will generate a string representation of different integers
 * separated by a comma. It will then return that string.
 */
function generateStringRepresentation($array)
{

}
