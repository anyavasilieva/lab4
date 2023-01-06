<?php
include '_head.php';
?>

<h2>Список товаров</h2>

<?php
if (count($xml->products->product)>0){
	foreach($xml->products->product as $p){

		echo "<div class='product'>";
		echo "<a href='index.php?id=".$p[0]['id']."'>".$p[0]->Name."</a> (".$p[0]->Price." руб.)";
		echo "</div>";
	}

} else {
	echo '<div class="info">Товаров нет.</div>';
}

?>

<hr>

<br>

<div>
<a href='create.php' class='but'>Добавить товар</a>
</div>

<?php
include '_footer.php';
?>