@if ($errors->any())
    @foreach ($errors->all() as $item)
        <p>{{ $item }}</p>
    @endforeach
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <input type="text" name="title">
    <button>Gửi</button>
</form>