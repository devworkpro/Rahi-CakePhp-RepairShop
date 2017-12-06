
	<div class="result">
	
	<!--form start-->
	
       
                <div class="box-body">

					<table class="table table-bordered table-striped dataTable no-footer">

						<tr><th>Product Name</th>
							<?php $name= $data['Product']['quantity']; ?>
							<td><?php echo $name;  ?></td>
							<td><?php echo $newqty;  ?></td>
							<td><?php echo "ddddddddd";  ?></td>
						</tr>

			<?php		
       if($name<$newqty)
       {
        echo "error_reporting";
       }
    ?>
					</table>
				</div><!-- /.box-body -->

</div>