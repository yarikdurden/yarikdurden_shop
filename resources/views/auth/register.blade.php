<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация - Чудо Обувь</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-10">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Регистрация</h1>
        
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-sm">
                <ul class="list-disc pl-4">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="last_name" placeholder="Фамилия" value="{{ old('last_name') }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <input type="text" name="first_name" placeholder="Имя" value="{{ old('first_name') }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <input type="text" name="middle_name" placeholder="Отчество" value="{{ old('middle_name') }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <input type="text" name="login" placeholder="Логин" value="{{ old('login') }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phone" placeholder="Телефон (+7...)" value="{{ old('phone') }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Пароль" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <input type="password" name="password_confirmation" placeholder="Повторите пароль" class="w-full border p-2 rounded" required>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white p-2 rounded hover:bg-green-700">Зарегистрироваться</button>
        </form>
        
        <p class="mt-4 text-center text-sm">
            Уже есть аккаунт? <a href="{{ route('login') }}" class="text-blue-600">Войти</a>
        </p>
    </div>
</body>
</html>