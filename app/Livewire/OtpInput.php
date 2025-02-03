<?php

namespace App\Livewire;

use App\Models\OTP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class OtpInput extends Component
{
    public $otpCode = '';


    public function verifyOTP()
    {
        $otpCode = trim($this->otpCode);

        if (strlen($otpCode) !== 6 || !ctype_digit($otpCode)) {
            session()->flash('error', 'OTP must be exactly 6 digits.');
            return;
        }

        $user = User::where('email', 'johndoe@example.com')->first();

        Log::info("Verifying OTP: {$otpCode} for User: {$user->id}");

        $otpRecord = OTP::where('user_id', $user->id)
            ->where('code', $otpCode)
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

        // ✅ Mark OTP as verified
        $otpRecord->update(['verified_at' => Carbon::now()]);

        // ✅ Reset OTP code to prevent re-triggering validation
        $this->otpCode = '';

        session()->flash('success', 'OTP Verified Successfully.');
    }


    public function render()
    {
        return view('livewire.otp-input');
    }
}
