<?php require_once "database.php"; 

// Create Account User in Facebook
function createAccount($firstname,$lastname,$gender,$email,$password,$country)
{
    global $database;
    $statement = $database->prepare("INSERT INTO users(firstname,lastname,gender,email,password,country) VALUES(:firstname,:lastname,:gender,:email,:password,:country)");
    $statement->execute([
        ':firstname' =>$firstname,
        'lastname' =>$lastname,
        ':gender' =>$gender,
        ':email' =>$email,
        ':password' =>$password,
        ':country' =>$country,
    ]);
    header("location: ../index.php");
}

// function get all item
function getItem()
{
    global $database;
    $statement = $database->prepare("SELECT * FROM posts ORDER BY postid DESC");
    $statement->execute();
    return $statement->fetchAll();
}

// function Create Post
function createPost($description,$image,$userid)
{
    global $database;
    $statement = $database->prepare("INSERT INTO posts(description,image,userid) 
    VALUES(:description,:image,:userid)");
    $statement->execute([
        ':description' => $description,
        ':image' => $image,
        ':userid' => $userid,
    ]);
}


// Fuction edit Post
function editPost($id){
    global $database;
    $statement = $database->prepare('SELECT * FROM posts WHERE postid = :id');
    $statement->execute([
        ':id'=>$id,
    ]);
    return $statement->fetch();
}



// Function display all post
function displayAccountUser(){
    global $database;
    $statement = $database->prepare("SELECT firstname FROM users ORDER BY firstname DESC");
    $statement->execute();
    return $statement->fetchAll();
}



// Function delete Post
function deletePost($id)
{
    global $database;
    $statement = $database->prepare("DELETE FROM posts WHERE postid = :id");
    $statement->execute([
        ':id' => $id,
    ]);
}   


// Fuction update Post 
function updatePost($description,$image,$id,$userid){
    global $database;
    $statement = $database->query("UPDATE posts SET description = '$description',image = '$image',userid = $userid WHERE postid= $id");
}








// Logout Account

function logOut(){

}

