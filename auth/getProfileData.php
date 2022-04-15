<?php

$user_id = $_SESSION['uid'];

$query = "SELECT * FROM `users` WHERE id='$user_id' AND is_approved = 1;";
    
include "/AppServ/www/sdf/news_site_php/config/db.php";        
if(!$connection){
    header("Location: ../index.php?=connectionFailed");
    exit();
}

$userP = mysqli_query($connection, $query);
if(empty($userP)){
    header("Location: ../index.php?status=userDoesNotExist");
    exit();
}
$pro = mysqli_fetch_assoc($userP);

function getName($profile){
    $full_name = $profile['full_name'];
    if(empty($full_name)){
        return "Null";
    }
    return $full_name;
}

function getUsername($profile){
    $user_name = $profile['user_name'];
    if(empty($user_name)){
        return "Null";
    }
    return $user_name;
}

function getID($profile){
    $id = $profile['id'];
    if(empty($id)){
        return "Null";
    }
    return $id;
}

function getEmail($profile){
    $email = $profile['email'];
    if(empty($email)){
        return "Null";
    }
    return $email;
}    

function getPicture($profile){
    $photo = $profile['profile_picture'];
    if(empty($photo)){
        return "Null";
    }
    return $photo;
}     

function getPostID($connection, $user_id){

    $queryForNews = "SELECT * FROM `news` WHERE user_id='$user_id';";

    $posts = mysqli_query($connection, $queryForNews);

    $arr = array();
    while($proPost = mysqli_fetch_assoc($posts)){
        array_push($arr, $proPost['id']);
    }
    
    return $arr;
}

function getPosts($connection, $user_id){

    $queryForNews = "SELECT * FROM `news` WHERE user_id='$user_id' and is_approved = 1 and is_deleted = 0;";

    $posts = mysqli_query($connection, $queryForNews);

    $arr = array();
    while($proPost = mysqli_fetch_assoc($posts)){
        $category_id = $proPost['category_id'];
        $sqlCategory = "SELECT * FROM `categories` WHERE id = $category_id";
        $queryCategory = mysqli_query($connection, $sqlCategory);;
        if ($queryCategory) {
            $category = mysqli_fetch_assoc($queryCategory);
        }
        array_push($arr, array(
            'id' => $proPost['id'],
            'title' => $proPost['title'],
            'banner' => $proPost['banner'],
            'content' => $proPost['content'],
            'category_name' => $category['name'],
            'created_at' => $proPost['created_at'],
          ));
    }
    
    return $arr;
}

function getPostContent($connection, $user_id){

    $queryForNews = "SELECT * FROM `news` WHERE user_id='$user_id';";

    $posts = mysqli_query($connection, $queryForNews);

    $arr = array();
    while($proPost = mysqli_fetch_assoc($posts)){
        array_push($arr, $proPost['content']);
    }
    
    return $arr;
}

function getPostBanner($connection, $user_id){

    $queryForNews = "SELECT * FROM `news` WHERE user_id='$user_id';";

    $posts = mysqli_query($connection, $queryForNews);

    $arr = array();
    while($proPost = mysqli_fetch_assoc($posts)){
        array_push($arr, $proPost['banner']);
    }
    
    return $arr;
}

function getPostDate($connection, $user_id){

    $queryForNews = "SELECT * FROM `news` WHERE user_id='$user_id';";

    $posts = mysqli_query($connection, $queryForNews);

    $arr = array();
    while($proPost = mysqli_fetch_assoc($posts)){
        array_push($arr, $proPost['created_at']);
    }
    
    return $arr;
}

function getPostUpdateDate($connection, $user_id){

    $queryForNews = "SELECT * FROM `news` WHERE user_id='$user_id';";

    $posts = mysqli_query($connection, $queryForNews);

    $arr = array();
    while($proPost = mysqli_fetch_assoc($posts)){
        array_push($arr, $proPost['updated_at']);
    }
    
    return $arr;
}
?>