<x-dash-layout title="Users">
    <div class="container">
        <x-card title='Create User'>
        <form method="post" action="/users/store">
            <!-- CROSS Site Request Forgery Protection -->
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" id="city">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
        </x-card>
    </div>
</x-dash-layout>