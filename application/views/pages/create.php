<?php
    echo form_open('user_room/create_topic');?>
    
    <p>
        <?php echo 'Enter title <br>';
                echo form_input('title');?>
    </p>
    <p>
        <?php echo 'Enter text of topic <br>';
                echo form_textarea('content') . '<br>';
                echo form_submit('create', 'create');?>
    </p>
</form>