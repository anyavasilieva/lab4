<?php
require_once '_head.php';

$Action = $_POST['Action'];
$Name   = $_POST['Name'];
$Color  = $_POST['Color'];
$Price  = $_POST['Price'];
$Text   = $_POST['Text'];

$err = '';

if ($Action == 'create') {
	if ($Name == '') {
		$err = 'Необходимо обязательно ввести <strong>Название товара</strong>.';
	} else if ($Price == '' || (int)$Price == 0) {
		$err = 'Необходимо обязательно ввести <strong>Цену товара</strong>.';
	} else {

		$products = $xml->products;

		$item = $products->addChild('product');

		$id = 1 + (int)$xml['id'];

		$xml['id'] = $id;  

		$item->addAttribute('id', $id);  
		$item->addAttribute('created', date('Y-m-d H:i:s'));  

		$item->addChild('Name', $Name);
		$item->addChild('Color', $Color);
		$item->addChild('Price', $Price);
		$item->addChild('Text', $Text);

		$xml->saveXML($file_shop_base);

		ob_clean();
		header('Location: index.php?create=ok&id='.$id);
	        exit;
	}
}
?>

<h2>Новый товар</h2>

<?= ($err ? '<div class="err">'.$err.'</div>' : '') ?>

<form action='create.php' method='POST'>
	<input type='hidden' name='Action' value='create'>

	Название товара (*):<br>
	<input type="text" name="Name" value="<?= htmlspecialchars($Name) ?>"><br><br>

	Цвет:<br>
	<input type="text" name="Color" value="<?= htmlspecialchars($Color) ?>"><br><br>

	Цена (*):<br>
	<input type="text" name="Price" value="<?= htmlspecialchars($Price) ?>"><br><br>

	Описание:<br>
	<textarea name="Text"><?= htmlspecialchars($Text) ?></textarea><br><br>

	<input type='submit' value='Создать товар' class='but'>
</form>

<br>

<hr>

<br>

<div>
  <a href='list.php' class='but'>Список товаров</a>
</div>


<?php
require_once '_footer.php';
?>