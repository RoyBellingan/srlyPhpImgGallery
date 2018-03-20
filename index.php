<style>
body{
background-color:black;
color:silver;
}
.img{
float:left;
margin-left: 8px;
}

a{
        color:silver;
}

</style>
<?php

//prepare the data with mogrify -auto-orient -path rsx0 -resize 2000x2000 -quality 70 *.JPG
$page = $_GET["page"];
if ($page < 1){
    $page = 1;
}

$set = glob("*.JPG");
$i = 0;
$j = 0;
$head = '';
$pack = '';
foreach($set as $file ){

    if($i % 50 == 0){
        $j++;
        $head .= <<<EOD
        <a href="index.php?page=$j">Page $j</a>
EOD;
    }

    if($i > (($page -1) * 50) && $i < $page * 50){
        $pack .= <<<EOD
<a href="rsx0/$file">
        <div class="img">
        <img src="$file"> <br>
</a>
    </div>
EOD;
    }

    $i++;

}

echo $head ."<br>\n";

echo $pack ."<br>\n";

echo '<div style="clear:both"></div>';

echo $head ."<br>\n";
