@csrf
<textarea
    type="text"
    name="comment"
    cols="30" rows="10"
    placeholder="Comentario:"
    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
        {{ $comment->comment ?? old('comment')}}
</textarea>
<label for="visivle">

    <input type="checkbox" name="visible"
        @if (isset($comment) && $comment->visible)
            checked="checked"
        @endif>
    Visivel?
</label>
<button type="submit" class="w-full shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
    Comentar
</button>
