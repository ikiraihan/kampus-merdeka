<x-dash-layout title="{{ $user }}">
    <div class="container">
        <x-card title="{{ $user }}">
            Hi, saya adalah {{ $user }}
            <br>
            <td><a class="btn btn-dark btn-xl" href="/users">Back</a></td>
        </x-card>
    </div>
</x-dash-layout>