<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход - Чудо Обувь</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Вход в систему</h1>
        
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2">Логин / Email / Телефон</label>
                <input type="text" name="identifier" value="{{ old('identifier') }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2">Пароль</label>
                <input type="password" name="password" class="w-full border p-2 rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Войти</button>
        </form>
        
        <p class="mt-4 text-center text-sm">
            Нет аккаунта? <a href="{{ route('register') }}" class="text-blue-600">Регистрация</a>
        </p>
    </div>
</body>
</html>