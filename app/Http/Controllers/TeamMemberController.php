// app/Http/Controllers/TeamMemberController.php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\TeamGroup;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    // ...

    // عرض نموذج تعديل عضو
    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        $groups = TeamGroup::all();
        return view('team-members.edit', compact('member', 'groups'));
    }

    // معالجة تحديث بيانات العضو
    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:team_members,email,' . $id,
            'phone'          => 'nullable|string|max:15',
            'status'         => 'required|in:pending,active,suspended',
            'team_group_id'  => 'required|exists:team_groups,id',
        ]);

        $member->update($request->only('name','email','phone','status','team_group_id'));

        return redirect()->route('team-members.index')
                         ->with('success', 'تم تحديث بيانات العضو بنجاح');
    }

    // حذف العضو
    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);
        $member->delete();

        return redirect()->route('team-members.index')
                         ->with('success', 'تم حذف العضو بنجاح');
    }
}
