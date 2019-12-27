<?php

namespace App\Http\Controllers\Student\Auth;

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
        $this->middleware('auth:student');
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
        return $request->user('student')->hasVerifiedEmail()
            ? redirect()->route('student.home')
            : view('auth.verify',[
                'resendRoute' => 'student.verification.resend',
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
        if ($request->route('id') != $request->user('student')->getKey()) {
            //id value doesn't match.
            return redirect()
                ->route('student.verification.notice')
                ->with('error','Invalid user!');
        }

        if ($request->user('student')->hasVerifiedEmail()) {
            return redirect()
                ->route('student.home');
        }

        $request->user('student')->markEmailAsVerified();

        return redirect()
            ->route('student.home')
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
        if ($request->user('student')->hasVerifiedEmail()) {
            return redirect()->route('student.home');
        }

        $request->user('student')->sendEmailVerificationNotification();

        return redirect()
            ->back()
            ->with('status','We have sent you a verification email!');
    }

}
