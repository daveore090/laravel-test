<?php

namespace App\Livewire;

use Livewire\Component;

class OtpInput extends Component
{
    public $otp = '';

    public function verifyOTP()
    {
        $user = Auth::user();
        $otpRecord = OTP::where('user_id', $user->id)
            ->where('code', $this->otp)
            ->whereNull('verified_at')
            ->first();

        if (!$otpRecord) {
            session()->flash('error', 'Invalid OTP.');
            return;
        }

        if ($otpRecord->isExpired()) {
            session()->flash('error', 'OTP has expired.');
            return;
        }

        // Mark OTP as verified
        $otpRecord->update(['verified_at' => Carbon::now()]);

        session()->flash('success', 'OTP Verified Successfully.');
    }

    public function render()
    {
        return view('livewire.otp-input');
    }
}
