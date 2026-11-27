<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @include('partials.smooth-scroll')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; margin: 0; padding: clamp(1rem, 8vh, 50px) 1rem 1rem; }
        .card { box-sizing: border-box; border: 1px solid #ccc; padding: 20px; border-radius: 8px; width: min(100%, 342px); }
        input { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; font-size: 1rem; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="card">
    <h2>Login</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        
        <label>Password</label>
        <input type="password" name="password" required>
        
        <button type="submit"><i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i> Login</button>
    </form>
</div>

</body>
</html>
