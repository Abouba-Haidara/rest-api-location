<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 17/12/2016
 * Time: 07:57
 */
?>
<H1>je suis home </H1>
<?php
require_once 'autoloadClasses.php';

$db = App::getDatabase();
$user = App::getUser()->getCorfUserBasicInfo($db,2);

var_dump($user);
