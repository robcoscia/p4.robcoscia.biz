<div class="AddTeacherDiv">
	<form id="AddTeacherForm" method="POST" action="/teachers/p_add">
		<br>
		
		
		<label for="first_name" class="FormLabels">First Name:</label>
		<input type="text" class="FormControl" id="first_name" name="first_name" />
		<br>
		<br>
		
		<label for="last_name" class="FormLabels" >Last Name:</label>
		<input type="text" class="FormControl" id="last_name" name="last_name" />
		<br>
		<br>
		
		<label class="FormLabels"> Biography:</label>
		<textarea id="biography" class="FormControl" name="biography" ></textarea>
		<br>
		<br>
		
		<label for="active_flg" class="FormLabels">Active:</label>
		<select type="text" class="FormControl" id="Active_flg" name="Active_flg" />
			<option value="Y">Yes</option>
			<option value="N">No</option>
		</select>
		<br>
		<br>
		
		<div id="PictureDiv">
			<label class="FormLabels">Picture:</label>
			<input class="FormControl" id="picture" type="file" name="picture" />
			<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="ButtonDiv">
			<input type="submit" class="SubmitButton" value="Save" />
		</div>
		<br>
		<br>
	</form>
</div>