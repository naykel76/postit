<?php

namespace Naykel\Postit\Http\Controllers;

use App\Http\Controllers\Controller;
use Naykel\Postit\Models\Post;

class ShowPostController extends Controller
{
    public function __invoke(Post $post)
    {
        $view = $this->getView(($post->layout ?? 'default'));

        return view($view)->with([
            'post' => $post,
        ]);
    }

    /**
     * Return local view if one exists
     *
     * ** The local templates should be stored in the components/layouts/pages directory
     */
    private function getView($view): string
    {
        if (view()->exists('components.layouts.' . $view)) {
            return 'components.layouts.' . $view;
        } else {
            return 'postit::components.layouts.' . $view;
        }
    }
}
