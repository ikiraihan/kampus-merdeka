<x-dash-layout title="products">
    <div class="container">
        <x-card title='Create Product'>
        <form method="post" action="/products/store"enctype="multipart/form-data">
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
            <div class="form-group" style="padding-top: 20px">
                    <label style="font-weight:bold">Product Image</label>
                    <input style="margin-top: 5px" type="file" class="form-control" id="photo" name="photo" placeholder="">
            </div>
            <br>
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
        </x-card>
    </div>
</x-dash-layout>