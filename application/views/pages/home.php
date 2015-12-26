<?php foreach ($query as $topic) {
    echo '<h3>' . strtoupper($topic->title) . '</h3>';
    echo $topic->content . '<br>';
    echo 'Creation time: ' . $topic->create_time . '<br>';
}
echo '<br>You login as ' . $name . '<br>';
echo anchor('user_room/create_topic', 'create new topic') . '<br>';
echo anchor('user_room/delete_topic', 'delete your topic') . '<br>';
echo anchor('user_room/update_topic', 'update topic') . '<br>';
echo anchor('auth/logout', 'logout') ;?>