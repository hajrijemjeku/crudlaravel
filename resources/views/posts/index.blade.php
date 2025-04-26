<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <a href="{{route('posts.create')}}" class="btn btn-sm btn-primary mb-3">Add new post</a>
                @if($posts && $posts->count())
                    <table class="table table-bordered w-75 mx-auto">
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>CreatedAt</th>
                            <th>UpdatedAt</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content  }}</td>
                                <td>{{ $post->created_at  }}</td>
                                <td>{{ $post->updated_at  }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', ['post'=> $post->id]) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('posts.destroy',['post'=> $post->id]) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you wanna delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    @else
                        <div class="alert alert-info m-2">
                            <h3>0 posts.</h3>
                        </div>
                @endif
              
            </div>
        </div>
    </div>
</x-app-layout>
