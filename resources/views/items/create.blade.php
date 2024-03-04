<h1>Add new item</h1>
<form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
    @csrf 
    
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" required>
        <label for="make">Description</label>
        <input type="text" class="form-control" name="description" id="description" required>
        <label for="make">Price</label>
        <input type="text" class="form-control" name="price" id="price" required>
        <label for="box_id">Box ID</label>
        <select class="form-control" name="box_id" id="box_id">
            <option value="">Select Box ID</option>
            <option value="1">Box 1</option>
            <option value="2">Box 2</option>
            <option value="3">Box 3</option>
            <!-- Add more options as needed -->
        </select>
        <label for="make">Photo</label>
        <input type="file" class="form-control-file" name="photo" id="photo">
        <button type="submit" class="btn btn-primary">Add</button>
</form>


