<x-dash-layout title="Products">
    <div class="container">
        <x-card title='Product'>
        <td><a class="btn btn-dark btn-xl" href="/products">Product</a></td>
        <td><a class="btn btn-dark btn-xl" href="/products/trash">Trash</a></td>
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
                @empty(!$products)
                    @foreach ($products as $key => $prod)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $prod['name'] }}</td>
                        <td>{{ $prod['slug'] }}</td>
                        <td>{{ $prod['price'] }}</td>
                        <td>{{ $prod['description'] }}</td>
                        <td><img width="150px" src="{{ url('/img/uploads/'.$prod['photo'] ) }}"></td>
                        <td><a class="btn btn-success btn-xl" href="/products/restore/{{ $prod['id'] }}">Restore</a></td>
                        <td><a class="btn btn-danger btn-xl" href="/products/destroy_permanent/{{ $prod['id'] }}">Delete Permanent</a></td>
                    </tr>
                    @endforeach 
                @else
                    <tr>
                        <td colspan="4">
                            <div class='text-center'>
                                Data not found
                            </div>
                        </td>
                    </tr>
                @endempty
                </tbody>
            </table>
        </x-card>
    </div>
</x-dash-layout>