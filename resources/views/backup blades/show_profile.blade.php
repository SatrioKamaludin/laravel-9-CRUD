<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <p>Name: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Role: {{$user->is_admin ? 'Admin' : 'Member'}}</p>

    <h4>change profile below here</h6>
    <form action="{{route('edit_profile')}}" method="post">
    @csrf
    <label for="">Name</label>
    <br>
    <input type="text" name="name" id="" value="{{$user->name}}">
    <br>
    <label for="">Password</label>
    <br>
    <input type="password" name="password" id="">
    <br>
    <Label>Confirm Password</Label>
    <br>
    <input type="password" name="password_confirmation" id="">
    <br>
    <button type="submit">Change profile detail</button>
    </form>
</body>
</html>