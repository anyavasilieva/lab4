<?php
require_once '_head.php';

$id = (int)$_GET['id'];

if ($id > 0) {

	if ($_GET['create'] == 'ok') {
		echo '<div class="info">Товар создан.</div>';
	}
	if ($_GET['save'] == 'ok') {
		echo '<div class="info">Изменения сохранены.</div>';
	}

	$product = $xml->xpath("//product[@id='".$id."']");

	if ($product && $product[0]['id']==$id) {
		echo "<h2>".$product[0]->Name."</h2>";

		if ($product[0]->Color) {
			echo "<div>Цвет: ".$product[0]->Color."</div>";
		}
		echo "<div class='price'>Цена: <strong>".$product[0]->Price." руб.</strong></div>";

		echo '<br>';

		if ($product[0]->Text) {
			echo "<div>Описание:<br>".nl2br($product[0]->Text)."</div>";
		}

		echo "<br>";
		echo "<hr>";
		echo "<br>";
		echo "<div>";
		echo '<a href="update.php?id='.$id.'" class="but">Редактировать</a> ';
		echo '<a href="delete.php?id='.$id.'" class="but">Удалить</a>';
		echo "</div>";

	} else {
		echo '<div class="err">Товар с ID '.$id.' не найден.</div>';
	}

} else {
	echo '<div class="err">Ошибка! Не указан id товара в ссылке.</div>';
}

?>

<div>
  <a href='list.php' class='but'>Список товаров</a>
  <a href='create.php' class='but'>Добавить товар</a>
</div>


<?php
require_once '_footer.php';
?>