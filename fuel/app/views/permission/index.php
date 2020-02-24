<p>
<a href="<?php echo Uri::base();?>permission/create" class="btn btn-primary">Create New</a>
</p>
<table class="table table-bordered table-striped">
	<thead>
	<tr>
	<th>
			Name
		</th>
		<th>
			Main Menu
		</th>
		<th>
			Sub Menu
		</th>
		
		<th>
			Action
		</th>
		</tr>
	</thead>
	<tbody>
	
		<?php
		//Debug::dump($permission);die;
		 foreach($permission as $item):?>
		<tr>
		<td>
				<?php echo $item->description;?>
			</td>
			<td>
				<?php $mainmenu= Model_Mainmenu::query()->where('id',$item->area)->get_one();
					try{
						echo $mainmenu->name;}
						catch(Exception $e)
						{
							Log::error('permission index :' . $e->getMessage());
						}
						?>
			</td>
			<td>
				<?php $submenu='';
				if($item->permission > -1){ 
					//$submenu=Model_Dropdown::query()->where('id',$item->permission)->get_one(); 
					$submenu=Model_Dropdown::query()->where('mainmenu_id',$item->permission)->get_one(); 
					//$submenu=Model_Dropdown::query()->where('mainmenu_id',8)->get_one();  
					//Debug::dump($submenu); exit;
					$x = @$submenu->name;
					$submenu=@$submenu->name;
				}
				//$submenu=Model_Dropdown::query()->where('id',$item->permission)->get_one(); 
				echo($submenu);
				
				?>
			</td>
			
			<td>
				<?php
				$str='';
				//Debug::dump($item->actions);die;
				 foreach($item->actions as $action)
						$str .= $action.' , ';
				echo	Str::sub($str,0,strlen($str)-2) ;
					;?>
			</td>
			
		</tr>
		<?php endforeach;?>
	</tbody>
</table>