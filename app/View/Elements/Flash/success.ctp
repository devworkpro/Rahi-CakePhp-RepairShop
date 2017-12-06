<div id="flash-<?php echo h($key) ?>" class="alert alert-success alert-dismissable auto-hide-box">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?php echo h($message) ?>
</div>

<script>
	setTimeout(function(){ $('.auto-hide-box').fadeOut(); }, 5000);
</script>