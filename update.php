<?php
require_once '_head.php';

$id = (int)($_POST['id'] ? $_POST['id'] : $_GET['id']);

$Action = $_POST['Action'];

$err = '';

if ($id > 0) {

	$product = $xml->xpath("//product[@id='".$id."']");

	if ($product) {

		if ($Action == 'save') {

			$Name   = $_POST['Name'];
			$Color  = $_POST['Color'];
			$Price  = $_POST['Price'];
			$Text   = $_POST['Text'];

			if ($Name == '') {
				$err = 'Необходимо обязательно ввести <strong>Название товара</strong>.';
			} else if ($Price == '' || (int)$Price == 0) {
				$err = 'Необходимо обязательно ввести <strong>Цену товара</strong>.';
			} else {
				$product[0]->Name = $Name;
				$product[0]->Color = $Color;
				$product[0]->Price = $Price;
				$product[0]->Text = $Text;

				// Сохраним в файл
				$xml->saveXML($file_shop_base);

				ob_clean();
				header('Location: index.php?save=ok&id='.$id);
			        exit;
			}

		} else {
			$Name = $product[0]->Name;
			$Color = $product[0]->Color;
			$Price = $product[0]->Price;
			$Text = $product[0]->Text;
		}

		?>

		<h2>Редактирование товара</h2>

		<?= ($err ? '<div class="err">'.$err.'</div>' : '') ?>

		<form action='update.php' method='POST'>
			<input type='hidden' name='Action' value='save'>
			<input type='hidden' name='id' value='<?= $id ?>'>

			Название товара (*):<br>
			<input type="text" name="Name" value="<?= htmlspecialchars($Name) ?>"><br><br>

			Цвет:<br>
			<input type="text" name="Color" value="<?= htmlspecialchars($Color) ?>"><br><br>

			Цена (*):<br>
			<input type="text" name="Price" value="<?= htmlspecialchars($Price) ?>"><br><br>

			Описание:<br>
			<textarea name="Text"><?= htmlspecialchars($Text) ?></textarea><br><br>

			<input type='submit' value='Сохранить изменения' class='but'>
		</form>

		<div>Товар создан: <?= $product[0]['created'] ?></div>

		<?php

	} else {
		echo '<div class="err">Товар с ID '.$id.' не найден.</div>';
	}

} else {
	echo '<div class="err">Ошибка! Не указан id товара в ссылке.</div>';
}

?>

<hr>

<br>

<div>
  <a href='list.php' class='but'>Список товаров</a>
  <a href='create.php' class='but'>Добавить товар</a>
</div>

<?php
require_once '_footer.php';
?>