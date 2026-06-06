<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotificationTemplate;
use Illuminate\Http\Request;

class NotificationTemplateController extends Controller
{


    public function index()
    {
        $templates = NotificationTemplate::orderByRaw("FIELD(act, 'DEFAULT') DESC")
                                         ->orderBy('name')
                                         ->get();
                                         $user_session = session('LoggedIn')
            ? \App\Models\User::find(session('LoggedIn'))
            : null;
        return view('admin.notification-templates.index', compact('templates','user_session'));
    }

    public function edit($id)
    {
        $template = NotificationTemplate::findOrFail($id);
        $user_session = session('LoggedIn')
            ? \App\Models\User::find(session('LoggedIn'))
            : null;
        return view('admin.notification-templates.edit', compact('template','user_session'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subj'        => 'required|string|max:255',
            'email_body'  => 'nullable|string',
            'sms_body'    => 'nullable|string|max:160',
            'push_title'  => 'nullable|string|max:100',
            'push_body'   => 'nullable|string|max:255',
            'email_status'=> 'sometimes|boolean',
            'sms_status'  => 'sometimes|boolean',
            'push_status' => 'sometimes|boolean',
        ]);

        $template = NotificationTemplate::findOrFail($id);

        $template->update([
            'subj'         => $request->subj,
            'email_body'   => $request->email_body ?? $template->email_body,
            'sms_body'     => $request->sms_body ?? $template->sms_body,
            'push_title'   => $request->push_title ?? $template->push_title,
            'push_body'    => $request->push_body ?? $template->push_body,
            'email_status' => $request->has('email_status') ? 1 : 0,
            'sms_status'   => $request->has('sms_status') ? 1 : 0,
            'push_status'  => $request->has('push_status') ? 1 : 0,
        ]);

        return back()->with('success', 'Template updated successfully!');
    }

    // AJAX Toggle (Email/SMS/Push)
    public function toggle(Request $request)
    {
        $request->validate([
            'id'     => 'required|exists:notification_templates,id',
            'type'   => 'required|in:email,sms,push',
            'status' => 'required|in:0,1'
        ]);

        $template = NotificationTemplate::findOrFail($request->id);
        $field = $request->type . '_status';
        $template->{$field} = $request->status;
        $template->save();

        return response()->json(['success' => true]);
    }
}
