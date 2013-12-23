	<div class="" id="schedule" data-spy="scroll" data-target=".navbar-schedule">
		<div class="bs-sidebar hidden-print affix navbar-schedule" >	
		    <ul class="nav bs-sidenav">
				  <li class="active"><a href="#Monday">Monday</a></li>
				  <li><a href="#Tuesday">Tuesday</a></li>
				  <li><a href="#Wednesday">Wednesday</a></li>
				  <li><a href="#Thursday">Thursday</a></li>
				  <li><a href="#Friday">Friday</a></li>
				  <li><a href="#Saturday">Saturday</a></li>
				  <li><a href="#Sunday">Sunday</a></li>
		    </ul>
		</div>
		
		<div id="schedule-box" role="main" >
			<?php foreach($days as $day): ?>
				<div id="<?php echo $day['long_name']?>">
				    <div class="panel panel-default" >
				        <div class="panel-heading" >
				            <h3 class="panel-title"><?php echo $day['long_name']?></h3>
				        </div>
				
				        <div class="panel-body">
			        		<?php if(count($schedule[$day['day_id']]) > 0): ?>
				        		<?php foreach($schedule[$day['day_id']] as $item): ?>
									<div class="class">
									    <h4><?php echo $item['description']?></h4>
									    <p>with <?php echo $item['first_name']?></p>
									    <p><?php echo $item['start_time']?> - <?php echo $item['end_time']?></p>
									</div>
								<?php endforeach; ?>
				        	<?php else: ?>
				        		<h4>No classes</h4>
				        	<?php endif; ?>
				        </div> 
				    </div>
				</div>			
			<?php endforeach; ?>	
		</div>
	</div>