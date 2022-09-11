<?php

if (isset($_POST['post_id'])) {

    if (isset($_COOKIE['user'])) {
        $userSQL =
            'SELECT * 
        FROM users 
        WHERE id=' . $_COOKIE['user'];

        $userResult = $conn->query($userSQL);

        if ($userResult) {
            $user = $userResult->fetch_assoc();
            $sql =
                "SELECT * 
                FROM user_post_likes 
                WHERE user_id=" . $user['id'] .
                " AND post_id=" . $_POST['post_id'];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $sql =
                    "DELETE 
                FROM user_post_likes 
                WHERE user_id=" . $user['id'] .
                    " AND post_id=" . $_POST['post_id'];
                $conn->query($sql);
                echo json_encode(['status' => 'disliked', 'count' => 0]);
                die();
            } else {
                $sql =
                    "INSERT 
                INTO user_post_likes (user_id, post_id) 
                VALUES ( '" . $user['id'] . "', '" . $_POST['post_id'] . "');";

                if ($result = $conn->query($sql)) {
                    echo json_encode(['status' => 'liked', 'count' => 1]);
                }
            }
        } else {
            echo 'no login';
        }
    }
} else {
    echo "Error!";
}
