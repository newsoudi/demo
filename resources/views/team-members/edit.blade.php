@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">تعديل عضو الفريق</h2>

    <form action="{{ route('team-members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">الاسم الكامل</label>
            <input name="name" value="{{ old('name', $member->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" value="{{ old('email', $member->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">رقم الهاتف</label>
            <input name="phone" value="{{ old('phone', $member->phone) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">الحالة</label>
            <select name="status" class="form-select" required>
                <option value="pending"   {{ $member->status=='pending'  ? 'selected':'' }}>قيد الانتظار</option>
                <option value="active"    {{ $member->status=='active'   ? 'selected':'' }}>نشط</option>
                <option value="suspended" {{ $member->status=='suspended'? 'selected':'' }}>معلق</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">المجموعة</label>
            <select name="team_group_id" class="form-select" required>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}"
                        {{ $member->team_group_id == $group->id ? 'selected' : '' }}>
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">تحديث</button>
        <a href="{{ route('team-members.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
