<?php
require_once "../models/comment.php";
$id = null;
isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
if ($id !== null)
{
    deleteComment($id);
    header('location: ../pages/home.php');
}
