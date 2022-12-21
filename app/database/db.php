<?php
session_start();

require("connect.php");


function view($value)
{
    echo "<pre>", print_r($value, true), "</pre>"; //this function is to be deleted
    die();
}

function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        //returns the records that matches the conditions
       // $sql = "SELECT * FROM users WHERE username='thales' AND admin=1";

       $i = 0;
       foreach ($conditions as $key => $value) {
           if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
           } else {
                $sql = $sql . " AND $key=?";
           }
           $i++;
       }
       $stmt = executeQuery($sql, $conditions);
       $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
       return $records;
    }
}


function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

       $i = 0;
       foreach ($conditions as $key => $value) {
           if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
           } else {
                $sql = $sql . " AND $key=?";
           }
           $i++;
       }
       // $sql = "SELECT * FROM users WHERE admin=0 AND username='thales' LIMIT 1";
       $sql = $sql . " LIMIT 1";
       $stmt = executeQuery($sql, $conditions);
       $records = $stmt->get_result()->fetch_assoc();
       return $records;
}

function create($table, $data)
{
    global $conn;

    //$sql = "INSERT INTO user (username, admin, email, password) VALUES (?, ?, ?, ?)";
    //$sql = "INSERT INTO user SET username=?, admin=?, email=?, password=?";
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
             $sql = $sql . " $key=?";
        } else {
             $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}


function update($table, $id, $data)
{
    global $conn;

    
    //$sql = "UPDATE user SET username=?, admin=?, email=?, password=? WHERE id=?";
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
             $sql = $sql . " $key=?";
        } else {
             $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}


function delete($table, $id)
{
    global $conn;

    $sql = "DELETE FROM $table WHERE id=?";
    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}


//$id = delete('users', 2,);
//view($id);


function getPublishedPosts() {
    global $conn;
    //SELECT * FROM posts WHERE published=1;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? ORDER BY p.created_at DESC";
    $stmt = executeQuery($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}



// function formatPostFields($posts) {
//   if (empty($posts)) {
//      return [];
//   }

//   $formatedPosts = [];
//   foreach ($posts as $post) {
//     $currentPost = $post;
//     $currentPost['body'] = html_entity_decode(substr($post['body'], 0, 150) . '...');
//     $currentPost ['created_at'] = date('F j, Y', strtotime($post['created_at']));  
//     $currentPost ['image'] = BASE_URL . "/assets/images/" . $post['image'];
//     array_push($formatedPosts, $currentPost);
//   }
//   return $formatedPosts;
// }


// function getPaginatedPosts($currentPage = 1, $recordsPerPage = 2)
// {
//     global $conn;
//     //SELECT * FROM posts WHERE published=1;
//     $sql = "SELECT p.*, u.username 
//     FROM posts AS p 
//     JOIN users AS u ON p.user_id=u.id 
//     WHERE p.published=1
//     ORDER BY p.created_at DESC LIMIT ?,?";
//     $data = [
//         'offset' => ($currentPage - 1) * $recordsPerPage,
//         'numberOfRecords' => $recordsPerPage,
//     ];
    
//     $stmt = executeQuery($sql, $data);
//     $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
//     $pageData = [
//         'posts' => formatPostFields($posts),
//         'nextPage' => count($posts) < $recordsPerPage ? false : $currentPage + 1,
//         ];
        
//         return $pageData;
// }



// function paginationPosts($currentPage = 1, $recordsPerPage = 5)
// {
//     global $conn;
// // 1. write query
// // offset: 0, 5, 10, 15, ...
// // pages = 0, 1, 2, 3, ...
// $sql = "SELECT * FROM  posts LIMIT :offset,:numberOfRecords";
// $data = [
//     'offset' => ($currentPage - 1) * $recordsPerPage,
//     'numberOfRecords' => $recordsPerPage,
// ];

// // 2. prepare 

// $stmt = $conn->prepare($sql);

// //3. execute
// $stmt->execute($data);
// $numberOfPages = ceil(totalRows() / $recordsPerPage);

// $posts = $stmt->fetchAll();

// $pageData = [
// 'posts' => $posts,
// 'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
// 'nextPage' => $currentPage + 1 <= $numberOfPages ? $currentPage + 1 : false,
// 'numberOfPages' => $numberOfPages,
// ];

// return $pageData;
// }




function getPostsByTopicId($topic_id)
{
    global $conn;
    //SELECT * FROM posts WHERE published=1;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?";
    $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}




function searchPosts($term)
{
    $match = '%' . $term . '%';
    global $conn;
    //SELECT * FROM posts WHERE published=1;
    $sql = "SELECT 
                p.*, u.username 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            WHERE p.published=?
            AND p.title LIKE ? OR p.body LIKE ?";
    
    
    $stmt = executeQuery($sql, ['published' => 1, 'title' =>  $match, 'body' =>  $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
   
