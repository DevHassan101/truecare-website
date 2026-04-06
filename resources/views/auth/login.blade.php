<x-guest-layout>
    <h4 class="md:!text-[1.8vw] sm:!text-[2.8vw] xs:!text-[4.3vw] font-semibold text-center">
        Login
    </h4>
    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600 text-center py-2">
        Welcome back! Please enter your details.
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-4">
        @csrf

        <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2 mb-8">
            <label for="email" class="text-gray-600">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="md:!py-[0.7vw] sm:!py-[1.2vw] xs:!py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                placeholder="Enter your email" />
            @error('email')
                <span class="text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="w-full md:!text-[1.1vw] sm:!text-[2.1vw] xs:!text-[3.6vw] flex flex-col gap-2 mb-8">
            <label for="password" class="text-gray-600">Password</label>
            <input type="password" name="password" id="password" value="{{ old('password') }}"
                class="md:!py-[0.7vw] sm:!py-[1.2vw] xs:!py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                placeholder="Enter your password" />
            @error('password')
                <span class="text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="w-full py-3 flex items-center flex-col gap-2 justify-center">
            <button type="submit"
                class="cursor-pointer md:!py-[0.7vw] sm:!py-[1.2vw] xs:!py-[1.7vw] md:!text-[1.1vw] sm:!text-[2.1vw] xs:!text-[3.6vw] text-white !bg-[#0e82fd] rounded-md md:w-[75%] xs:w-full text-center">
                Login
            </button>
        </div>

    </form>
</x-guest-layout>
