<?php
if($_SESSION['userRank'] == 'admin'){
    
} else {
    header("Location: /blog/index/home");
}