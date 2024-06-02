<?php
class ArticleShowFrontPage {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function renderArticles() {
        $mainArticle = $this->getMainArticle();
        $sideArticle = $this->getSideArticle();
        $otherArticles = $this->getOtherArticles();

        echo '<div class="container mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">';
        
        $this->renderMainArticle($mainArticle);
        $this->renderSideArticle($sideArticle);

        echo '</div>
            <hr class="my-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">';
        
        foreach ($otherArticles as $article) {
            $this->renderOtherArticle($article);
        }

        echo '</div></div>';
    }

    private function getMainArticle() {
        $sql = "SELECT a.*, c.category as category_name 
                FROM articles a 
                JOIN article_category c ON a.category_id = c.id 
                ORDER BY a.id DESC LIMIT 1";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    private function getSideArticle() {
        $sql = "SELECT a.*, c.category as category_name 
                FROM articles a 
                JOIN article_category c ON a.category_id = c.id 
                ORDER BY a.id DESC LIMIT 1, 1";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    private function getOtherArticles() {
        $sql = "SELECT a.*, c.category as category_name 
                FROM articles a 
                JOIN article_category c ON a.category_id = c.id 
                ORDER BY a.id DESC LIMIT 2, 4";
        $result = $this->db->query($sql);
        $articles = [];
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
        return $articles;
    }

    private function renderMainArticle($article) {
        echo '<div class="md:col-span-2">
            <a href="article.php?id=' . $article['id'] . '">
                <img src="' . $article['img_path'] . '" alt="Main article image" class="w-full h-auto mb-4">
                <h2 class="text-2xl font-bold mb-2">' . $article['headline'] . '</h2>
                <p class="mb-2">' . $article['subhead'] . '</p>
                <p class="text-zinc-500 dark:text-zinc-400 mb-4">' . $article['date'] . ' | <span class="font-bold">' . $article['category_name'] . '</span> </p>
            </a>
        </div>';
    }

    private function renderSideArticle($article) {
        echo '<div>
            <a href="article.php?id=' . $article['id'] . '">
                <img src="' . $article['img_path'] . '" alt="Side article image" class="w-full h-auto mb-4">
                <h3 class="text-xl font-bold mb-2">' . $article['headline'] . '</h3>
                <p class="mb-2">' . $article['subhead'] . '</p>
                <p class="text-zinc-500 dark:text-zinc-400 mb-4">' . $article['date'] . ' | <span class="font-bold">' . $article['category_name'] . '</span> </p>
            </a>
        </div>';
    }

    private function renderOtherArticle($article) {
        echo '<div>
            <a href="article.php?id=' . $article['id'] . '">
                <img src="' . $article['img_path'] . '" alt="Article image" class="w-full h-auto mb-4">
                <h3 class="text-xl font-bold mb-2">' . $article['headline'] . '</h3>
                <p class="mb-2">' . $article['subhead'] . '</p>
                <p class="text-zinc-500 dark:text-zinc-400 mb-4">' . $article['date'] . ' | <span class="font-bold">' . $article['category_name'] . '</span> </p>
            </a>
        </div>';
    }
}
?>
