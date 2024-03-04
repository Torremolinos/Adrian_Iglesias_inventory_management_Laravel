
<form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
        <div class="container">
            <h1>Edit Item</h1>
            <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="make">Make</label>
                <input type="text" class="form-control" name="make" id="make" value="{{ $item->name }}" required>
                <label for="model">Model</label>
                <input type="text" class="form-control" name="model" id="model" value="{{ $item->description }}" required>
                <label for="cv">CV</label>
                <input type="text" class="form-control" name="cv" id="cv" value="{{ $item->price }}" required>
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $item->price }}" required>
                <label for="photo">Photo</label>
                <input type="file" class="form-control-file" name="photo" id="photo">
                <img src="{{ Storage::url($item->photo) }}" alt="photo" width="100" height="100">
                <a href="{{ route('items    .index') }}">Back</a>

                <button type="submit">Update</button>
            </form>
        </div>
            
        </form>
    </div>

