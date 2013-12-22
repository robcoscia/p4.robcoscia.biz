<div class="AddClassDiv">
	<form id="AddClassForm" method="POST" action="/classes/p_add">
		<br>
		
		<label for="class_type_id" class="FormLabels">Type:</label>
		<select id="class_type_id" name="class_type_id" >
		<?php foreach($classTypes as $classType): ?>
			<option value="<?php echo $classType['class_type_id'] ?>"><?php echo $classType['type'] ?></option>
		<?php endforeach; ?>
		</select>
		<br>
		<br>
		
		<label for="teacher_id" class="FormLabels">Instructor:</label>
		<select id="teacher_id" name="teacher_id" >
		<?php foreach($teachers as $teacher): ?>
			<option value="<?php echo $teacher['teacher_id'] ?>"><?php echo $teacher['first_name'] . " " . $teacher['last_name']?></option>
		<?php endforeach; ?>
		</select>
		<br>
		<br>
		
		<label for="day_id" class="FormLabels">Day:</label>
		<select id="day_id" name="day_id" >
		<?php foreach($days as $day): ?>
			<option value="<?php echo $day['day_id'] ?>"><?php echo $day['long_name'] ?></option>
		<?php endforeach; ?>
		</select>
		<br>
		<br>
		
		<label for="start_time" class="FormLabels">Start Time:</label>
		<input type="time" class="AddInput" id="start_time" name="start_time" />
		<br>
		<br>
		
		<label for="end_time" class="FormLabels">End Time:</label>
		<input type="time" class="AddInput" id="end_time" name="end_time" />
		<br>		
		<br>
		
		<label for="description" class="FormLabels">Description:</label>
		<input type="text" class="AddInput" id="description" name="description" />
		<br>
		<br>
		
		<div class="ButtonDiv">
			<input type="submit" class="SubmitButton" value="Save" />
		</div>
		<br>
		<br>	
				
	</form>
</div>