<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المجموعات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center">إدارة المجموعات</h2>

    <!-- عرض الرسائل الخاصة بالنجاح أو الخطأ -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('team-groups.create') }}" class="btn btn-primary">إنشاء مجموعة جديدة</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>اسم المجموعة</th>
                <th>الوصف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->description }}</td>
                    <td>
                        <!-- يمكن إضافة زر لتعديل أو حذف المجموعة -->
                        <a href="#" class="btn btn-info">تعديل</a>
                        <a href="#" class="btn btn-danger">حذف</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
