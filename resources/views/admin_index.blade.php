<div class="container">
    <h1>Admin Comments Management</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->status }}</td>
                <td>
                    @if ($comment->status === 'pending')
                        <form action="{{ route('comments.approve', $comment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                    @else
                        <span class="badge badge-success">Approved</span>
                    @endif
                </td>

                <td>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE') <!-- This is important for DELETE method -->
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<br>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" style="font-size: 20px">
        {{ __('Logout') }}
    </button>
</form>
