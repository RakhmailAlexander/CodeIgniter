<?php 
foreach ($topics_to_update as $topics)
    {
        echo $topics->title . '<br>';
        echo form_open('user_room/update_topic');
        echo form_input('title') . 'Enter new title<br>';
        echo form_textarea('content') . '<br>';
            $data = array(
                'name' => 'update',
                'value' => $topics->id,
                'content' => 'update post',
                'type' => 'submit'
            );
        echo form_button($data) . '</form>';
        
 }?>