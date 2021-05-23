<?php
//database
$conn = mysqli_connect("localhost", "root", "", "chatbot") or die("Database Error");

//catch message ajax
$getMsg = mysqli_real_escape_string($conn, $_POST['text']);

$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMsg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query
if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing data replay
    $replay = $fetch_data['replies'];
    echo $replay;

	if(isset($replay)){
		$txt=$replay;
		$txt=htmlspecialchars($txt);
		$txt=rawurlencode($txt);
	}
} else{
  echo "Sorry I can't understand your question!";

  $not_found="Sorry I can't understand your question!";
	$txt=$not_found;
	$txt=htmlspecialchars($txt);
	$txt=rawurlencode($txt);
}

?>
