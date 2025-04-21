<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\TeamGroup;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    // عرض جميع الأعضاء
    public function index()
    {
        $members = TeamMember::with('teamGroup')->get();  // جلب جميع الأعضاء مع المجموعات المرتبطة بهم
        return view('team-members.index', compact('members'));
    }

    // عرض نموذج إضافة عضو جديد
    public function create()
    {
        $groups = TeamGroup::all();  // جلب جميع المجموعات
        return view('team-members.create', compact('groups'));
    }

    // تخزين عضو جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:team_members',
            'phone' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'team_group_id' => 'required|exists:team_groups,id',  // التحقق من المجموعة
        ]);

        TeamMember::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'team_group_id' => $request->team_group_id,
        ]);

        return redirect()->route('team-members.index')->with('success', 'تم إضافة العضو بنجاح');
    }
}
