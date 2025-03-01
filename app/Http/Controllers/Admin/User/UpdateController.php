<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }
}

