<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::latest()->get();
        $title = trans('translate.Admin List');
        return view('admin.admin_management.index', compact('admins', 'title'));
    }

    public function create()
    {
        $title = trans('translate.Create Admin');
        return view('admin.admin_management.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:4|confirmed',
            'admin_type' => 'required',
            'status' => 'required',
        ], [
            'name.required' => trans('translate.Name is required'),
            'email.required' => trans('translate.Email is required'),
            'email.unique' => trans('translate.Email already exist'),
            'password.required' => trans('translate.Password is required'),
            'password.confirmed' => trans('translate.Confirm password does not match'),
            'password.min' => trans('translate.You have to provide minimum 4 character password'),
            'admin_type.required' => trans('translate.Role is required'),
            'status.required' => trans('translate.Status is required'),
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->admin_type = $request->admin_type;
        $admin->status = $request->status;
        $admin->save();

        $notify_message = trans('translate.Created Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.admin-management.index')->with($notify_message);
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $title = trans('translate.Edit Admin');
        return view('admin.admin_management.edit', compact('admin', 'title'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:4|confirmed',
            'admin_type' => 'required',
            'status' => 'required',
        ], [
            'name.required' => trans('translate.Name is required'),
            'email.required' => trans('translate.Email is required'),
            'email.unique' => trans('translate.Email already exist'),
            'password.confirmed' => trans('translate.Confirm password does not match'),
            'password.min' => trans('translate.You have to provide minimum 4 character password'),
            'admin_type.required' => trans('translate.Role is required'),
            'status.required' => trans('translate.Status is required'),
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->admin_type = $request->admin_type;
        $admin->status = $request->status;
        $admin->save();

        $notify_message = trans('translate.Updated Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.admin-management.index')->with($notify_message);
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->admin_type == 'super_admin') {
            $super_admin_count = Admin::where('admin_type', 'super_admin')->count();
            if ($super_admin_count <= 1) {
                $notify_message = trans('translate.You cannot delete the last super admin');
                $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                return redirect()->back()->with($notify_message);
            }
        }

        if ($admin->id == auth('admin')->id()) {
            $notify_message = trans('translate.You cannot delete your own account');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $admin->delete();

        $notify_message = trans('translate.Deleted Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.admin-management.index')->with($notify_message);
    }
}
