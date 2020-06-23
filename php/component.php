<?php
	function inputElement($icon,$placeholder,$name,$value){
		$ele = "
		<div class=\"input-group mb-2\"> 
					 	<div class=\"input-group-prepend\"> 
					 		<div class=\"input-group-text\">$icon</div> 
					 	</div> 
					 	<input type=\"text\" name='$name' value='$value' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder='$placeholder' autocomplete=\"off\"> 
					</div>

		";
		echo $ele;
	}


	function buttonElement($btnid, $styleclass, $text, $name, $attr){
		$btn = "
		<button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
		";
		echo $btn;
	}

?>