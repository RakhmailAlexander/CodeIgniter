<?php 
foreach ($topics_to_del as $topics)
    {
        echo $topics->title . '<br>';
        echo $topics->content . '<br>';
        echo form_open('user_room/delete_topic');
            $data = array(
                'name' => 'delete',
                'value' => $topics->id,
                'content' => 'delete post',
                'type' => 'submit'
            );
        echo form_button($data) . '</form>';
        
 }?>