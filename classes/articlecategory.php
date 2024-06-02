<?php
class ArticleCategory {
    private $db;
    private $categoryId;

    public function __construct(Database $db, $categoryId) {
        $this->db = $db;
        $this->categoryId = $categoryId;
    }

    public function renderCategoryArticles() {
        $mainArticle = $this->getMainArticle();
        $otherArticles = $this->getOtherArticles();

        echo '<div class="container mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2 flex flex-col md:flex-row">';

        if ($mainArticle) {
            $this->renderMainArticle($mainArticle);
        } else {
            echo '<div>No main article found for this category.</div>';
        }

        echo '  </div>
            </div>
        </div>
        <hr class="my-4">
        <div class=" container grid grid-cols-1 md:grid-cols-4 gap-4">';
        
        if (!empty($otherArticles)) {
            foreach ($otherArticles as $article) {
                $this->renderOtherArticle($article);
            }
        } else {
            echo '<div class="md:col-span-4">No articles found for this category.</div>';
        }

        echo '</div>';
    }

    private function getMainArticle() {
        $sql = "SELECT a.*, c.category as category_name 
                FROM articles a 
                JOIN article_category c ON a.category_id = c.id 
                WHERE a.category_id = ? 
                ORDER BY a.id DESC LIMIT 1";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("i", $this->categoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    private function getOtherArticles() {
        $sql = "SELECT a.*, c.category as category_name 
                FROM articles a 
                JOIN article_category c ON a.category_id = c.id 
                WHERE a.category_id = ? 
                ORDER BY a.id DESC LIMIT 1, 4";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("i", $this->categoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        $articles = [];
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
        return $articles;
    }

    private function renderMainArticle($article) {
        echo '<a href="article.php?id=' . htmlspecialchars($article['id']) . '">
            <div class="md:w-1/2">
                <h2 class="text-2xl font-bold">' . htmlspecialchars($article['headline']) . '</h2>
                <p class="mt-2">' . htmlspecialchars($article['subhead']) . '</p>
                <div class="mt-2 text-zinc-600">
                </a>
                    <span>' . htmlspecialchars($article['date']) . '</span> | <span class="font-bold">NEWS</span>
                    <span>' . htmlspecialchars($article['category_name']) . '</span>
                </div>
            </div>
            <div class="md:w-1/2 mt-4 md:mt-0 md:ml-4">
                <img src="' . htmlspecialchars($article['img_path']) . '" alt="Main article image" class="w-full h-auto">
            </div>';
    }
    
    private function renderOtherArticle($article) {
        echo '<a href="article.php?id=' . htmlspecialchars($article['id']) . '">
            <div>
                <img src="' . htmlspecialchars($article['img_path']) . '" alt="Article image" class="w-full h-auto">
                <h3 class="text-xl font-bold mt-2">' . htmlspecialchars($article['headline']) . '</h3>
                <p class="mt-2">' . htmlspecialchars($article['subhead']) . '</p>
                <div class="mt-2 text-zinc-600">
                    <span>' . htmlspecialchars($article['date']) . '</span> | <span class="font-bold">NEWS</span>
                    <span>' . htmlspecialchars($article['category_name']) . '</span>
                </div>
            </div>
        </a>';
    }    
}
?>
