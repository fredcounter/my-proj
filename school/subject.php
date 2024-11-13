<?php
require_once "subject.class.php";

$subjectlist = new Asignatura();
$subject = $subjectlist->showAll();
?>

<table border = "1">
   <th>NO</th>
   <th>CODE</th>
   <th>NAME</th>
   <th>TYPE</th>


<?php
$i = 1;
if(empty($subject)){
?>
<tr colspan = "7">
  <td class="search">NO PRODUCT FOUND</td>
</tr>

<?php
}

foreach($subject as $sub){
?>
<tr>
<td><?= $i?></td>
<td><?=$sub['asignatura_code']?></td>
<td><?=$sub['asignatura_code']?></td>
<td><?=$sub['asignatura_code']?></td>
</tr>

<?php
$i++;
}
?>
</table>
<a href="add.php">add</a>
