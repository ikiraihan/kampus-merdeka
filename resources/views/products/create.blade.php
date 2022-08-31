<x-dash-layout title="products">
    <div class="container">
        <x-card title='Create Product'>
        <form method="post" action="/products/store">
            <!-- CROSS Site Request Forgery Protection -->
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label>id store</label>
                <input type="number" class="form-control" name="store_id" id="email">
            </div>
            <div class="form-group">
                <label>slug</label>
                <input type="text" class="form-control" name="slug" id="slug">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>
            <div class="form-group">
                <label>photo</label>
                <input type="text" class="form-control" name="photo" id="photo">
            </div>
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
        </x-card>
    </div>
</x-dash-layout>