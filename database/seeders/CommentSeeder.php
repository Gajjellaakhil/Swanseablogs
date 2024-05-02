namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::factory(10)->create()->each(function ($article) {
            // Create 1 to 5 comments for each article
            Comment::factory(rand(1, 5))->create(['article_id' => $article->id]);
        });
    }
}
