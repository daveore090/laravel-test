<div x-data="{ otp: '', focusNext(el) { if(el.value.length === 1) el.nextElementSibling?.focus(); } }">
    <form wire:submit.prevent="verifyOTP">
        <div class="flex space-x-2">
            @for($i = 0; $i < 6; $i++)
                <input type="text" maxlength="1" x-ref="otp{{ $i }}"
                       x-on:input="focusNext($event.target)"
                       class="w-10 h-10 text-center border rounded-md"
                       wire:model.defer="otp">
            @endfor
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Verify OTP</button>
    </form>

    @if(session()->has('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @endif

    @if(session()->has('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif
</div>
