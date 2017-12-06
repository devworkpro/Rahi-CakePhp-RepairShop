<?php echo $this->Flash->render('positive'); ?>
<div class="result">
<b>First name:</b>
<?php echo $Leads['Lead']['first_name'];?>
</p>
<p>
<b>Last name:</b>
<?php echo $Leads['Lead']['last_name'];?>
</p>
<p>
<b>Business name:</b>
</p>
<p>
<b>Phone:</b>
<?php echo $Leads['Lead']['phone'];?>

</p>
<p>
<b>Email:</b>
<?php echo $Leads['Lead']['email'];?>
</p>
<p>
<b>Mobile:</b>
</p>
<p>
<b>Address:</b>
</p>
<p>
<b>City:</b>
</p>
<p>
<b>State:</b>
</p>
<p>
<b>Zip:</b>
</p>
<p>
<b>Ticket subject:</b>
<?php echo $Leads['Lead']['subject'];?>
</p>
<p>
<b>Ticket description:</b>
<?php echo $Leads['Lead']['description'];?>
</p>
<p>
<b>Ticket problem type:</b>
<?php echo $Leads['Lead']['issue_type'];?>
</p>
</div>