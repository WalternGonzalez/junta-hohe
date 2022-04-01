

<div>
 
    <ul>
        @foreach($dato as $user)
            <li>{{ $user->name }}</li>
        @endforeach
        
</ul>
    {{ $dato->links() }}
</div>


