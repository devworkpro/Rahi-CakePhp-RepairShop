<?php
echo $this->Session->flash();

echo $this->Form->create('Page');
echo $this->Form->input('from_email');
echo $this->Form->input('from_name');

echo $this->Form->input('to_email');
echo $this->Form->input('subject');
echo $this->Form->input('message', array('type' => 'text'));

echo $this->Form->end('Send');
?>