<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Auth::user()->unreadNotifications;

        return view('company.notification.index', compact('notifications'));
    }

    public function markAsRead(Request $request)
    {
        $notifications = Auth::user()->unreadNotifications;

        $notification = $notifications->find($request->notification_id);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('company.notifications.index');
    }

    public function markAllAsRead(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->route('company.notifications.index');
    }

    public function show(Request $request)
    {
        $notification = Auth::user()->notifications()->find($request->id);
        
        if(!$notification)
            return redirect()->route('company.notifications.index');

       $notification->markAsRead();

        return view('company.notification.show', compact('notification'));

        
    }
}
