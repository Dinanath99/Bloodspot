<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: memberlogin.php');
    exit();
} 
// if admin click on logout then its unset the session and destory the session
//and redirect to member login page
/// run the below code for form

/*
if (isset($_REQUEST['logout'])) {
session_unset();
session_destroy();
echo "<script>
location.href = 'memberlogin.php'
</script>";
}
*/

?>