<?php include 'parts/header.php';
?>
<br><br><br>
<?php
$articleShowFrontPage = new ArticleShowFrontPage($db);
$articleShowFrontPage->renderArticles();
?>

<?php include 'parts/footer.php'?>