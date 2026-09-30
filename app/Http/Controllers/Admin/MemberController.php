<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'member')
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('admin.members.index', compact('members'));
    }
}
