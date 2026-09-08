<?php
require_once __DIR__ . '/../models/News.php';

class NewsController
{
    private function model(): News { return new News(db()); }

    private function auth(): void {
        if (empty($_SESSION['admin_id'])) {
            header('Location: ' . url('/admin/login'));
            exit;
        }
    }

    public function index(): void {
        $news = $this->model()->latest(50);
        require __DIR__ . '/../views/news/index.php';
    }

    public function show(string $slug): void {
        $article = $this->model()->findBySlug($slug);
        if (!$article) { http_response_code(404); echo 'News non trovata'; return; }
        require __DIR__ . '/../views/news/show.php';
    }

    public function admin(): void {
        $this->auth();
        $news = $this->model()->all();
        require __DIR__ . '/../views/admin/dashboard.php';
    }

    public function create(): void {
        $this->auth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $slug = trim($_POST['slug'] ?? '') ?: strtolower(trim(preg_replace('/[^a-z0-9]+/i','-', $title), '-'));
            $status = ($_POST['status'] ?? 'draft') === 'published' ? 'published' : 'draft';
            $published = $status === 'published' ? date('Y-m-d H:i:s') : null;
            if ($title === '' || $content === '') $error = 'Titolo e contenuto sono obbligatori.';
            else {
                $this->model()->create([
                    'title'=>$title,'slug'=>$slug,'content'=>$content,
                    'image'=>null,'published_at'=>$published,'status'=>$status,
                    'author_id'=>$_SESSION['admin_id']
                ]);
                header('Location: ' . url('/admin')); exit;
            }
        }
        $article = null;
        require __DIR__ . '/../views/admin/form.php';
    }

    public function edit(int $id): void {
        $this->auth();
        $article = $this->model()->find($id);
        if (!$article) { http_response_code(404); echo 'News non trovata'; return; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');
            $title=trim($_POST['title'] ?? '');
            $content=trim($_POST['content'] ?? '');
            $slug=trim($_POST['slug'] ?? '');
            $status=($_POST['status'] ?? 'draft') === 'published' ? 'published' : 'draft';
            $published=$status==='published' ? ($article['published_at'] ?: date('Y-m-d H:i:s')) : null;
            if ($title==='' || $content==='' || $slug==='') $error='Compila tutti i campi obbligatori.';
            else {
                $this->model()->update($id, compact('title','slug','content','status','published') + ['image'=>$article['image']]);
                header('Location: ' . url('/admin')); exit;
            }
        }
        require __DIR__ . '/../views/admin/form.php';
    }

    public function delete(int $id): void {
        $this->auth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verify_csrf($_POST['csrf'] ?? null)) die('Richiesta non valida');
        $this->model()->delete($id);
        header('Location: ' . url('/admin')); exit;
    }
}
