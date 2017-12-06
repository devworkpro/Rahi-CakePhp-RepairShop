<h1>Add Post</h1>
<?php
echo $this->Form->create('Config');
echo $this->Form->input('name');
echo $this->Form->input('price');
echo $this->Form->end('Save Bundle');
?>