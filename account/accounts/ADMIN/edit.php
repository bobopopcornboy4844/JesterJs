<style>
body textarea {
 height: calc(100% - 40px);
 width: 100%;
 resize: none;
}
</style>
<form method="POST" action="./save.php">
<button type="submit">save</button><br>
<textarea>
<?php
$file = "/index.html";
$myfile = fopen($file);
while ($line = fgets($myfile)) {
  echo $line;
}
?>
