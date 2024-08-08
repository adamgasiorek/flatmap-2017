<?php

if(isset($_GET['id']))
{
    include('przegladaj/jest.php');
}
else
{
    include('przegladaj/niema.php');
}
?>