<div>
    <form wire:submit.prevent="verifyOTP">
        <div class="flex w-full">
            <input type="text" maxlength="6"
                   class="h-10 text-center border rounded-md w-full tracking-widest text-xl"
                   wire:model.lazy="otpCode"
                   placeholder="Enter OTP"
            />
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded w-full">
            Verify OTP
        </button>
    </form>

    @if(session()->has('error'))
        <p class="text-red-500 mt-2">{{ session('error') }}</p>
    @endif

    @if(session()->has('success'))
        <p class="text-green-500 mt-2">{{ session('success') }}</p>
    @endif
</div>
