<?php 

 function showErrors($errors,$name){
 	if($errors->has($name)){
 		return '
 			<div class="alert alert-danger" role="alert">
								<strong>'.$errors->first($name).'</strong>
			</div>

 		';
 	}
 }
 function getCategory($mang, $parent, $shift, $id_select){
 	foreach($mang as $value)
 	{
 		if($value['parent']==$parent){
 			if($value['id']==$id_select){
 				echo "<option value = ".$value['id']." selected>".$shift.$value['name']."</option>";
 			}
 			else {
 				echo "<option value = ".$value['id'].">".$shift.$value['name']."</option>";
 			}
 			getCategory($mang,$value['id'],$shift."---|",$id_select);
 		}
 	}
 }
  function showCategory($mang, $parent, $shift){
 	foreach($mang as $value)
 	{
 		if($value['parent']==$parent){
 		echo '
 				<div class="item-menu"><span>'.$shift.$value['name'].'</span>
										<div class="category-fix">
											<a class="btn-category btn-primary" href="Admin/Category/editCategory/'.$value['id'].'"><i class="fa fa-edit"></i></a>
											<a onclick="return del_cat()" class="btn-category btn-danger" href="Admin/Category/delCategory/'.$value['id'].'""><i class="fas fa-times"></i></i></a>

										</div>
										</div>

 		';
 			showCategory($mang,$value['id'],$shift."---|");
 		}
 		}
 	}
