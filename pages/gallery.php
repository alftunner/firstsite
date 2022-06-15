<h2>Gallery</h2>
<form action="index.php?page=3" method="post">
    <p>Select graphics extension to display: </p>
    <select name="ext">
        <?
            $path = 'images/';
            if ($dir = opendir($path)) {
                $arr = [];
                while (($file = readdir($dir)) !== false) {
                    $fullname = $path . $file;
                    $pos = strpos($fullname, '.');
                    $ext = substr($fullname, $pos + 1);
                    $ext = strtolower($ext);
                    if (!in_array($ext, $arr)) {
                        $arr[] = $ext;
                        echo '<option>' . $ext . '</option>';
                    }
                }
                closedir($dir);
            }
        ?>
    </select>
    <input type="submit" name="submit" value="Show Pictures" class="btn btn-primary">
</form>
<?php
if (isset($_POST['submit'])) {
    $ext = $_POST['ext'];
    $ar = glob($path . "*." . $ext);
    echo "<div class='panel panel-primary'>";
    echo "<div class='panel-heading'>";
    echo "<h3 class='panel-title'>Content</h3></div>";
    foreach ($ar as $path) {
        echo "<a href='".$path."' target='_blank'>
            <img src='".$path."' height='100px' class='img-polaroid'>
        </a>";
    }
    echo '</div>';
}
