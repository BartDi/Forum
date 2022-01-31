<x-Header id="{{auth()->id()}}" />

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{URL::to('addCat')}}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name">
    <input type="submit">

</form>