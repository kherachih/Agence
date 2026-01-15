<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuVisibilitySetting;
use App\Models\DevAccessPassword;
use App\Models\DevAccessLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DevelopmentSettingsController extends Controller
{
    /**
     * Show the login form for development section
     */
    public function showLogin()
    {
        // If already authenticated, redirect to index
        if (session()->has('dev_access_authenticated') && session('dev_access_authenticated') === true) {
            return redirect()->route('admin.development.index');
        }

        return view('admin.development.login');
    }

    /**
     * Verify the development password
     */
    public function verifyPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if (DevAccessPassword::verifyPassword($request->password)) {
            // Set session
            session(['dev_access_authenticated' => true]);

            // Log the access
            DevAccessLog::logAccess(Auth::guard('admin')->id(), 'login');

            return redirect()->route('admin.development.index')
                ->with('success', __('translate.Access granted to development section'));
        }

        return back()
            ->with('error', __('translate.Invalid development password'))
            ->withInput();
    }

    /**
     * Show the development settings dashboard
     */
    public function index()
    {
        $menus = MenuVisibilitySetting::getAllMenus();
        $recentLogs = DevAccessLog::getRecentLogs(15);

        return view('admin.development.index', compact('menus', 'recentLogs'));
    }

    /**
     * Toggle menu visibility
     */
    public function toggleMenu(Request $request)
    {
        $request->validate([
            'menu_key' => 'required|string|exists:menu_visibility_settings,menu_key',
        ]);

        $newStatus = MenuVisibilitySetting::toggleMenu($request->menu_key);

        // Log the action
        DevAccessLog::logAccess(
            Auth::guard('admin')->id(),
            'toggle_menu: ' . $request->menu_key . ' to ' . ($newStatus ? 'enabled' : 'disabled')
        );

        return response()->json([
            'success' => true,
            'is_enabled' => $newStatus,
            'message' => __('translate.Menu visibility updated successfully'),
        ]);
    }

    /**
     * Update the development password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Verify current password
        if (!DevAccessPassword::verifyPassword($request->current_password)) {
            return back()->with('error', __('translate.Current password is incorrect'));
        }

        // Update password
        DevAccessPassword::updatePassword($request->new_password);

        // Log the action
        DevAccessLog::logAccess(Auth::guard('admin')->id(), 'password_changed');

        // Clear session to require re-login
        session()->forget('dev_access_authenticated');

        return redirect()->route('admin.development.login')
            ->with('success', __('translate.Development password updated successfully. Please login again.'));
    }

    /**
     * Logout from development section
     */
    public function logout()
    {
        // Log the action
        if (Auth::guard('admin')->check()) {
            DevAccessLog::logAccess(Auth::guard('admin')->id(), 'logout');
        }

        session()->forget('dev_access_authenticated');

        return redirect()->route('admin.dashboard')
            ->with('success', __('translate.Logged out from development section'));
    }
}
