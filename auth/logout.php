<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION['uid']) {
        session_unset();

        session_destroy();

        header("Location: ../login.php?success=LoggedOut");
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
