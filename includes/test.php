if ($_FILES['image12']['name']) {
$img12 = $_FILES['image12']['name'];
dealwithimage($_FILES['image12']['name'], $_FILES['image12']['tmp_name'], $_FILES['image12']['size'],
$_FILES['image12']['error'], $prop_target);
} else {
$getOldImage = query("SELECT * FROM units WHERE id = '$unitID'");
while ($row = fetch_array($getOldImage)) {
$img12 = $row['image12'];
}
}

