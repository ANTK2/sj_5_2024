<?php
class LatestNews {
    private $dbConn;

    public function __construct(Database $db) {
        $this->dbConn = $db->getConn();
    }

    public function getLatestArticles($limit = 5) {
        $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT $limit";
        $result = $this->dbConn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function renderLatestNews() {
        $latestArticles = $this->getLatestArticles();

        echo '<div class="latest-news">';
        echo '<h5 class="latest-news-title">Najnovšie správy</h5>';
        echo '<ul class="latest-news-list">';
        
        if ($latestArticles) {
            foreach ($latestArticles as $latestArticle) {
                echo '<li class="latest-news-item">';
                echo '<span class="news-time">' . $this->getTimeAgo($latestArticle['date']) . ' ago</span>';
                echo '<a href="article.php?id=' . htmlspecialchars($latestArticle['id']) . '">';
                echo '<h6 class="news-headline">' . htmlspecialchars($latestArticle['headline']) . '</h6>';
                echo '</a>';
                echo '</li>';
            }
        } else {
            echo '<li>No latest news found.</li>';
        }

        echo '</ul>';
        echo '</div>';
    }

    private function getTimeAgo($datetime) {
        $time = strtotime($datetime);
        $timeDiff = time() - $time;
        
        if ($timeDiff < 1) { 
            return 'just now';
        }

        $timeUnits = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($timeUnits as $unit => $text) {
            if ($timeDiff < $unit) continue;
            $numberOfUnits = floor($timeDiff / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
    }
}
?>
