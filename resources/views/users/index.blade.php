<x-app-layout title="Users">
    <div class="container">
        <x-card title='Pacar'>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Twitter</th>
                    <th>More</th>
                </thead>
                <tbody>
                @empty(!$users)
                    @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['twitter'] }}</td>
                        <td><a class="btn btn-primary btn-xl" href="/users/{{ $user['name'] }}">More</a></td>
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
</x-app-layout>