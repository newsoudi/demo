<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل مستخدم جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center">تسجيل مستخدم جديد</h2>

    <!-- عرض الرسائل الخاصة بالنجاح أو الخطأ -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{ url('/register') }}" method="POST">
    @csrf

    <!-- اسم المستخدم -->
    <div class="mb-3">
        <label for="name" class="form-label">الاسم الكامل</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <!-- البريد الإلكتروني -->
    <div class="mb-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <!-- كلمة المرور -->
    <div class="mb-3">
        <label for="password" class="form-label">كلمة المرور</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <!-- تأكيد كلمة المرور -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>

    <!-- رقم الهاتف -->
    <div class="mb-3">
        <label for="phone" class="form-label">رقم الهاتف</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>

    <!-- اسم الشركة -->
    <div class="mb-3">
        <label for="company" class="form-label">اسم الشركة</label>
        <input type="text" class="form-control" id="company" name="company">
    </div>

    <button type="submit" class="btn btn-primary w-100">تسجيل</button>
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
