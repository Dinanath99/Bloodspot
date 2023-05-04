<?php
session_start();

if (isset($_SESSION['username'])) {
    //if username is set then its redirect to admin page
} else {

    //else its redirect to admin login page
    echo "<script>location.href = 'memberlogin.php'</script>";

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