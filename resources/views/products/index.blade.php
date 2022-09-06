<x-dash-layout title="Products">
    <div class="container">
        <x-card title='Product'>
        <td><a class="btn btn-dark btn-xl" href="/products">Product</a></td>
        <td><a class="btn btn-dark btn-xl" href="/products/trash">Trash</a></td>
        <br>
        <br>
        <td><a class="btn btn-dark btn-xl" href="/products/create">Create</a></td>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th></th>
                </thead>
                <tbody>
                @if(count($products))
                    @foreach ($products as $key => $prod)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $prod['name'] }}</td>
                        <td>{{ $prod['slug'] }}</td>
                        <td>{{ $prod['price'] }}</td>
                        <td>{{ $prod['description'] }}</td>
                        <td><img width="150px" src="{{ url('/img/uploads/'.$prod['photo'] ) }}"></td>
                        <td><a class="btn btn-success btn-xl" href="/products/edit/{{ $prod['id'] }}">edit</a></td>
                        <td><a class="btn btn-danger btn-xl" href="/products/destroy/{{ $prod['id'] }}">delete</a></td>
                    </tr>
                    @endforeach 
                @else
                    <tr>
                        <td colspan="10">
                            <div class='text-center'>
                                Data not found
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </x-card>
    </div>
</x-dash-layout>