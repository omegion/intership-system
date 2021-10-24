<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        $users = User::orderBy('id', 'desc')
            ->paginate(10);

        return Inertia::render('User/List', [
            'users' => $users
        ]);
    }

    public function show(Request $request, string $userId): Response
    {
        $user = User::findOrFail($userId);

        return Inertia::render('User/Show', [
            'currentUser' => $user
        ]);
    }

    public function edit(Request $request, string $userId): Response
    {
        $user = User::findOrFail($userId);


        return Inertia::render('User/Edit', [
            'currentUser' => $user
        ]);
    }

    public function update(Request $request, string $userId)
    {
        $user = User::findOrFail($userId);

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'student_id' => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
        ])->validateWithBag('updateUserInformation');

        $user->forceFill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'student_id' => $request->input('student_id'),
        ])->save();

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }

    public function updateVerification(Request $request, string $userId)
    {
        $user = User::findOrFail($userId);

        Validator::make($request->all(), [
            'verified_at' => ['nullable', 'date'],
        ])->validateWithBag('updateUserVerificationInformation');

        $user->forceFill([
            'verified_at' => $request->input('verified_at'),
        ])->save();

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }
}
