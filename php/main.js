let id = $("input[name*='id']");
id.attr("readonly","readonly");

$(".btnedit").click( e =>{
	let textvalues = displayData(e);

	let expense = $("input[name*='expense']");
	let amount = $("input[name*='amount']");

	id.val(textvalues[0]);
	expense.val(textvalues[1]);
	amount.val(textvalues[2]);
});

function displayData(e){
	let id = 0; 
	const td = $("#tbody tr td");
	let textvalues = [];

	for (const value of td){
		if(value.dataset.id == e.target.dataset.id ){
			textvalues[id++] = value.textContent;;

		}
	}
	return textvalues;
}

// set id to textbox
function sentID(){
	$getid = getData();
	$id = 0;
	if ($getid) {
		while ($row = mysqli_fetch_assoc($getid)){
			$id = $row['id'];
		}
	}
	return($id + 1);
}