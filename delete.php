<?php
require_once '_head.php';

$id = (int)($_POST['id'] ? $_POST['id'] : $_GET['id']);


if ($id > 0 && $_POST['step']==2) {

	$product = $xml->xpath("//product[@id='".$id."']");

	if ($product) {

		$p = $product[0];
		unset($p[0]);

		$xml->saveXML($file_shop_base);

		echo '<div class="info">Товар удалён.</div>';

	} else {
		echo '<div class="err">Товар с ID '.$id.' не найден.</div>';
	}

	echo "<br>";
	echo "<div>";
	echo "<a href='list.php' class='but'>Список товаров</a>";
	echo "</div>";

} else if ($id > 0) {
	?>

	<form action='delete.php' method='POST'>
		<input type='hidden' name='step' value='2'>
		<input type='hidden' name='id' value='<?= $id ?>'>

		<input type='submit' value='Удалить товар' class='but'>
	</form><br>

	<a href='index.php?id=<?= $id ?>' class='but'>Отмена! Назад</a>


	<?php
} else {
	echo '<div class="err">Ошибка! Не указан id товара в ссылке.</div>';
}

?>

<br>

<?php
require_once '_footer.php';
?>