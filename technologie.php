<?php include_once 'parts/header.php'; ?>
<?php
$categoryId = 4;
$articleCategory = new ArticleCategory($db, $categoryId);
$articleCategory->renderCategoryArticles();
?>
<?php include_once 'parts/footer.php'; ?>
