<div class="AddTeacherDiv">
	<form id="AddTeacherForm" class="form-addteacher" method="POST" action="/teachers/p_add">
		<br>
		
		
		<label for="first_name" class="FormLabels">First Name:</label>
		<input type="text" class="form-control" id="first_name" name="first_name" required />
		<br>
		<br>
		
		<label for="last_name" class="FormLabels" >Last Name:</label>
		<input type="text" class="form-control" id="last_name" name="last_name" required />
		<br>
		<br>
		
		<label class="FormLabels"> Biography:</label>
		<textarea id="biography" class="form-control" name="biography" ></textarea>
		<br>
		<br>
		
		<label for="active_flg" class="FormLabels">Active:</label>
		<select type="text" class="form-control" id="Active_flg" name="Active_flg" />
			<option value="Y">Yes</option>
			<option value="N">No</option>
		</select>
		<br>
		<br>
		
		<div class="ButtonDiv">
			<input type="submit" class="btn btn-lg btn-primary btn-block" value="Save" />
		</div>
		<br>
		<br>
	</form>
</div>