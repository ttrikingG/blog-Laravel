<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Events\CommentPost;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo comentario
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Obtemos o post pelo id que veio na request
        $post = Post::findOrFail($request->input('post_id'));
        
        $created = Comment::create([
            'comment' => $validated['comment'],
            'user_id' => auth()->user()->id, // Asumiendo que el usuario está autenticado
            'post_id' => $request->input('post_id'), // Asegúrate de que 'post_id' venga en la solicitud
        ]);
        
        if ($created) {
            // Dispara o evento (vai acionar o listener que manda o email)
            event(new CommentPost(auth()->user(), $post));
            return redirect()->back()->with('success_comment', 'Success Comment.');
        }
        return redirect()->back()->with('error_comment', 'Error saving comment.');
    }

    public function destroy($id)
    {
        // Lógica para eliminar un comentario
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->back()->with('delete_success', 'Comment deleted successfully.');
    }
}
