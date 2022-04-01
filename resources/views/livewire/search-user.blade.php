

<div>
    <input wire:model="search" type="text" placeholder="Search users..."/>

 
    <ul>
        @foreach($dato as $user)
            <li>{{ $user->name }}</li>
        @endforeach
        
</ul>
    {{ $dato->links() }}
</div>


