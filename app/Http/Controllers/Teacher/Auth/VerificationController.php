<?php

namespace App\Http\Controllers\Teacher\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    /**
     * Create a controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify','resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user('teacher')->hasVerifiedEmail()
            ? redirect()->route('teacher.home')
            : view('auth.verify',[
                'resendRoute' => 'teacher.verification.resend',
            ]);
    }

    /**
     * Verfy the user email.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        if ($request->route('id') != $request->user('teacher')->getKey()) {
            //id value doesn't match.
            return redirect()
                ->route('teacher.verification.notice')
                ->with('error','Invalid user!');
        }

        if ($request->user('teacher')->hasVerifiedEmail()) {
            return redirect()
                ->route('teacher.home');
        }

        $request->user('teacher')->markEmailAsVerified();

        return redirect()
            ->route('teacher.home')
            ->with('status','Thank you for verifying your email!');
    }

    /**
     * Resend the verification email.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        if ($request->user('teacher')->hasVerifiedEmail()) {
            return redirect()->route('teacher.home');
        }

        $request->user('teacher')->sendEmailVerificationNotification();

        return redirect()
            ->back()
            ->with('status','We have sent you a verification email!');
    }

}
