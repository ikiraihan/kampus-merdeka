<x-dash-layout title="Products">
    <div class="container">
        <x-card title='Auth Log'>
            <table class="table">
                <thead>
                <th scope="col">#</th>
                        <th scope="col">IP Address</th>
                        <th scope="col">User Agent</th>
                        <th scope="col">Location</th>
                        <th scope="col">Login at</th>
                        <th scope="col">Logout at</th>
                </thead>
                <tbody>
                @empty(!$logs)
                    @foreach ($logs as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                                    {{ $item->ip_address }}
                                </td>
                                <td>
                                    {{ Str::limit($item->user_agent, 50) }}
                                </td>
                                <td>
                                    {{ $item->location ? $item->location['city'] : '-' }}
                                </td>
                                <td>
                                    {{ $item->login_at }}
                                </td>
                                <td>
                                    {{ $item->logout_at }}
                                </td>
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