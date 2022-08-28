<x-app-layout title="products">
    <div class="container">
        <x-card title='Edit Product'>
        <form action="/products/update/{{$products -> id}}" method="post" >
            <!-- CROSS Site Request Forgery Protection -->
            @csrf
            <div class="form-group">
                <label>ID Product</label>
                <input type="text" class="form-control" name="id" id="id" value="{{ $products->id }}">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $products->name }}">
            </div>
            <div class="form-group">
                <label>id store</label>
                <input type="number" class="form-control" name="store_id" id="email" value="{{ $products->store_id }}">
            </div>
            <div class="form-group">
                <label>slug</label>
                <input type="text" class="form-control" name="slug" id="slug"value="{{ $products->slug }}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" id="price"value="{{ $products->price }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" id="description"value="{{ $products->description }}">
            </div>
            <div class="form-group">
                <label>photo</label>
                <input type="text" class="form-control" name="photo" id="photo"value="{{ $products->photo }}">
            </div>
            <input type="submit" value="Submit" class="btn btn-dark btn-block">
        </form>
        </x-card>
    </div>
</x-app-layout>