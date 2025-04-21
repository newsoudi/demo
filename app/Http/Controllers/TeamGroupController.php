<?php

namespace App\Http\Controllers;

use App\Models\TeamGroup;
use Illuminate\Http\Request;

class TeamGroupController extends Controller
{
    // عرض جميع المجموعات
    public function index()
    {
        $groups = TeamGroup::all();  // جلب جميع المجموعات
        return view('team-groups.index', compact('groups'));
    }

    // عرض نموذج إنشاء مجموعة جديدة
    public function create()
    {
        return view('team-groups.create');
    }

    // تخزين مجموعة جديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        TeamGroup::create($request->all());

        return redirect()->route('team-groups.index')->with('success', 'تم إنشاء المجموعة بنجاح');
    }
}
