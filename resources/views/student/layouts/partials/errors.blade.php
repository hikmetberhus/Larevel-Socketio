@if(count($errors) > 0)
    <div >
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif