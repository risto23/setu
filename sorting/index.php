<?php
$mysqli = new mysqli('localhost','root','','php_interview_questions');

if(isset($_POST["submit"])) {
$id_ary = explode(",",$_POST["row_order"]);
for($i=0;$i<count($id_ary);$i++) {
$mysqli->query("UPDATE php_interview_questions SET row_order='" . $i . "' WHERE id=". $id_ary[$i]);
}
}
$result = $mysqli->query("SELECT * FROM php_interview_questions ORDER BY row_order");
?>
<html lang="en">
<head>
  <title>Sorting MySQL Row Order using jQuery</title>
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <style>
  body{width:610px;}
  #sortable-row { list-style: none; }
  #sortable-row li { margin-bottom:4px; padding:10px; background-color:#BBF4A8;cursor:move;}
  .btnSave{padding: 10px 20px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;margin-left:40px;}  
  #sortable-row li.ui-state-highlight { height: 1.0em; background-color:#F0F0F0;border:#ccc 2px dotted;}
  </style>
  <script>
  $(function() {
    $( "#sortable-row" ).sortable({
	placeholder: "ui-state-highlight"
	});
  });
  
  function saveOrder() {
	var selectedLanguage = new Array();
	$('ul#sortable-row li').each(function() {
	selectedLanguage.push($(this).attr("id"));
	});
	document.getElementById("row_order").value = selectedLanguage;
  }
  </script>
</head>
<body>

<form name="frmQA" method="POST" />
<input type = "hidden" name="row_order" id="row_order" /> 
<ul id="sortable-row">
<?php
while($row = $result->fetch_assoc()) {
?>
<li id=<?php echo $row["id"]; ?>><?php echo $row["question"]; ?></li>
<?php 
}
$result->free();
$mysqli->close();  
?>  
</ul>
<input type="submit" class="btnSave" name="submit" value="Save Order" onClick="saveOrder();" />
</form> 
</body>
</html>