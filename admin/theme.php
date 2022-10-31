<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Select Theme</h2>
               <div class="block copyblock"> 
			   <?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$theme = mysqli_real_escape_string($db->link, $_POST['theme']);
						$query = " UPDATE tbl_theme
								   SET 
								   theme = '$theme'
								   WHERE id = '1'
								";
						$updated_row = $db->update($query);
							if($updated_row)
							{
								echo "<span class='success'>Theme Updated Successfully !!</span>";
							}
							else
							{
								echo "<span class='error'>Failed to Update Theme!!</span>";
							}
						
					}
				?>
				<?php
				
					$query = "select * from tbl_theme where id='1' ";
					$themes = $db->select($query);	
					while($result = $themes->fetch_assoc()){
			
				?>
 <form action="" method="post">
	<table class="form">					
		<tr>
			<td>
				<input <?php if($result['theme'] == 'default' ){echo "Checked";}?> type="radio" name="theme" value="default" />Default
			</td>
		</tr>
		<tr>
			<td>
				<input <?php if($result['theme'] == 'green' ){echo "Checked";}?> type="radio" name="theme" value="green" />Green
			</td>
		</tr>
		<tr>
			<td>
				<input <?php if($result['theme'] == 'purple' ){echo "Checked";}?> type="radio" name="theme" value="purple" />Purple
			</td>
		</tr>
		<tr> 
			<td>
				<input type="submit" name="submit" Value="Change" />
			</td>
		</tr>
	</table>
</form>
				<?php } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>