@extends('doctor.layouts.guest')
@section('content')
    <section class="w-full bg-theme-blue flex items-center justify-center min-h-screen md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
        <div
            class="md:w-[35vw] bg-white md:p-[3.5vw] sm:p-[4.5vw] xs:p-[5.5vw] md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw]">
            <h4 class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] font-semibold text-center">
                Doctor Signup
            </h4>
            <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600 text-center py-2">
                Start your journey with us.
            </p>
            <form action="{{ route('doctor.signup') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="w-full py-3 flex items-center justify-center">
                    <div
                        class="md:w-[10vw] md:h-[10vw] sm:w-[20vw] sm:h-[20vw] xs:w-[30vw] xs:h-[30vw] rounded-full relative">
                        <img class="w-full h-full objec-cover rounded-full" id="profilePreview"
                            src="{{ asset('website/images/doctor-login/9ee137a7590ead1e8bdbfb7d8341d5dbb1503cac.png') }}"
                            alt="" />
                        <label for="profileImage"
                            class="md:w-[2vw] sm:w-[4vw] xs:w-[6vw] md:h-[2vw] sm:h-[4vw] cursor-pointer xs:h-[6vw] rounded-full bg-theme-blue absolute bottom-2 right-1 flex items-center justify-center">
                            <input type="file" id="profileImage" name="profile_image" accept="image/*" hidden />
                            <svg class="md:w-[1.2vw] sm:w-[2.2vw] xs:w-[3.2vw]" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="16" height="16" fill="url(#pattern0_355_245)" />
                                <defs>
                                    <pattern id="pattern0_355_245" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_355_245" transform="scale(0.0078125)" />
                                    </pattern>
                                    <image id="image0_355_245" width="128" height="128" preserveAspectRatio="none"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAC1NJREFUeJztnWusHVUVx/+blguUVp4ttRQEKqIptPKQ8haKFhCQl/hIAP0gwQgiJAQQjCgmKpAo8ZGgQRI/YTAoAuFVaAV5KRZ5FAhvSlug0CKlty235Z6fH/Y5crneO3vPzN4zc87dv+R+uXPOrLXmv87Mnv1YW0okEolEIpFIJBKJRCKRSCQSiUQi0cuYuh0oA7CPpMMkzZS0p6QZksa3D28haamkV9p/D0q6yxjzWuWOJsIBzASuAF6kGE8AFwLb1B1LIgdt4W8ABgsKP5w1wK+BaXXHlsgAmARcG1D44bwDnA1sUnesiWEAB1L8Vp+XB4HpdcecaAOcCWysSPwOy4C96459zAN8F2hVLH6HNcC8uq/BmAU4rybhh7IG+4rZ8zSqHwCYK+kuSeNyfG2ZpJsl3S7paUlvSlovaVtJUyTtJ+kQSSe3/+fLa5IOMMYszfGdRFGA6cCKHL/Sh4G5gFcSA5sDpwEv5LDxDyBPMiaKAtzmKcpK4FRf4Uew0wdcgn8D89zQsSaGARztKcZTwIxANj8LvOlh813S62E8gPFtYV0sAj4S2PYsYJWH7d+GtJsYAnCShwCvAztFsn8gsMFhfx2wfQz7Yx7gVsfFbwGHRPbhUo8kvDSmD2MSYEfgfceF/2MFfowDnnH48WxsP8YcwFmOiz5AoEafhy9f87gL7FqFL1VS9wjYQY7jdxpjXqzEE+kG2U6kLHqui7jpCfDXSryQZIwZlPQXx8cOrsKXKqktAYCJkj6e9RFJt1TkTof5juPpERCQyY7jy40xrltyaBY7ju9ShRNVUmcCuAZmXq3Eiw/zkuP4NHps5lCdwbgmZa6txIshGGM2yj56sj7TqsidSqgzATY4jk+sxIshtH/dWQJvrMqXqqgzAfodx7erxIsPM03ZcxFcSdt11JkAyx3HdwUmVOLJB2S9lUjSkkq8qJDaEsAYs0LSOxkf2VTS/hW50+EIx/GnKvGiQupu0T7uOH5iJV58wLGO467XxK6j7gRY6Dh+GrBZFY4A+0va1/GxB6rwZcwAHOAxAHNeRb78yeHHCtL8wLAABnjeceHfJvJkDGCeRyKmWUExwE7QdHEbkXrggO2Alzx86LmBoEYAbAOs9hDgigi2NwPu87DtGiRKlAG43EMEgKsoOB18BJtbAXd62nUNWyfKAEwAXvYU42bANZLosjcbWOxp78ZQcSYywK4N8F0Q+gZwDjlfEYHJwJX4Lwp5jTQbuDqAn3kK02FZW9A5wPhRzjkROB64Dlif49wt4Kiqr0HVNG1x6HjZaVnHFfj6BknPSHpLdtSuT9LH2n+bFjjfxcaY4A3PhANse8CnZR6TH9V9HcY07SS4pQbhW8Dldcef0P/WDF5JdZVCVgMn1R13YhjAF4BXI4v/APCJumNNjAKwJfATbOmWkLwMfIVAnUuJyGD77X8IvFJC9BZwL3AGsHndMdVNV2Y+dmDoEElHSZorabZsbeDReEPSQ5Lul3SrMea56E52CV2ZAMNp38J3ljRd0iRJEyStkrRS0sr29LNEIpFIJBKJRCKRSCTGOo3qB2j3zO3e/ttFttjzFu2/rSOa7pedQ/CObF2CJZKelfSCMSZzuXgsgD5Jh8tuijVNdhFPp0NrvjFmXR1+BaXdtXsK8BvgaeJtC1OU/wDzge8Dsyu6Jn3Y/RKyyti+C1wGbFmFT0EBNgVOwE7urHpHkLK8AlxAvDUKk4G/5/BnMbBbDF+Cg52Dfy52omW3c02E67Mj8FwBX1YAe4b2JyjYkbclIRWomRawR8DrM41i4nconARRVwcDU4FbJP1BdrCmVzCSgmwpg923cKFsw7coUyTdUyQJoiUAdvuXJ1Vshm83ULqIVVv8BZJCzEaaImlB3iSI1Zg5Q3YPn15dVLFGJWsFAB+VFT/Yo0S29uICYC/fL4y4mKIM2C1WrlaxPoYBSY9JelT2Pfyt9t8WkmIWithEtmzdVEk7SdpL0qxRbCLpImPMqqLGgKnyF39Q0k9lk+4y2bkOWUyWfRwcaYx5sqiPhcBW3M77Lr8RuBH4MjCpUoczwL6uHordqHoRtk7BI8ApJc87Fdvn4cP7wGlDvjsXWOv53SXADuWvhH9gh2HLu/syAPwc6KXGYSbADkXFH3KOPEmwoKrAtseu0/PldqBMq7fraIvvszdSR/zTM86VJwlOqCK4mz2dWY/tDGrUGERscorfAr7ucU7fJLg7dnAnewb2NnBoVGcaCDAFeNLzGnW4Go8fiWcSbAC2ihXc5vjV13mLHK8mvQK2bz+v+EWSwNX2cpW/Kxzg+R6B9ANzojjQYNriP1FQ/A6+SXCH4zzHxAiwD781e6cGN95wCCN+h1+QkQTAbtjHaxYHxgjyDA/nrwtuuOFg34geL6f5/zFiEmDFdw2ytbAdT8EDXegwvILAW702HewEl8c8RR0kX6J8KAnwEx9gUYxAd8Ld4/et4IYbDFb8f3uKOQh8E9uIvt3zO9BOAmAG/kvmz4kRrKvxt5RRijb1IuQTvwWcOeS7eZPg9/iL/zx2bmHwgF0Ofy+40YYCbI0dI/ChBXx7hHP0Eb4kzjrgMzEC3ozszocWdpy758GWuV3kKUiLjMci+e8EWQwAX4wV9ByH8YejGG4Y2F/+Pz0FaQFne5wzxJ1gAIi30Qa28ZJFz5dYw/7y/+UpyIi3/Yxzl7kTxPvlD3Hwlw4nqt7mpVII8Mz3sFEkCQaA42PEPNw518hfd8xTLwARbvsZtmbjP7nmPaCauZe4X3eyavV0Ldjy8g/nEP87JWztASz3tBX/tj/MuayFHa7NILuSAuKfW8LWp4DXPW29B7h2OgsLdl3aaLxbqTMVAHwEeMhTEICLSthq7i9/iJNZ6/l6amvVisX/JP7L5qpp8I3iqGtBZ/iuxxpoi/9gDvHPL2FrJnYTDB/WE2N8P4ezrnKtXb8YBFua9t4c4l9cwlZ3/PKHOOxy1rUBc6MBJgH35xD/ghK29sQOm/uwHjg6ZKxFnXb1gM2r28eiYH/5C3OIf0kJW3lb+81YYwn82eHspXX7WATs3kJ5ijNcWMLWLLIrgAxlHU36UWGrdWdxR90+5gUYB9ydQ/wyrf1Z2FnS3Se+JGF34MpiEJhRt595wO4Z4EuZBt/snOJ/PmScQcA2kt5zON9VGy0Dv/MUpfBEF+DTwMoc4n8uZIxBwT0PvUXJVbRVAlzvIUrhtk1PiS9JwKkegawBvlS3rz54JMBVJc69dw7x1wJHhowtCti1877btlxLwzdk8kiAQotbgH2AVTnEnxs6tmgAp3sGBvaRcDfwA+wuYLtjF03GrPrhTYwEAPbtWfElu28PcE+OJKiSAWwRxbM8YwmaAFjxXcu1OqwFjiimQnkKF4kyxrQkfUPSm8G8CUefpJmSrqFEV20RgP0kzZetOeRiraRjjTEL43o1OqWqhBljlsqWgWvyRJDLiLU+fhjYefh5xD/OGPO3qE45KF0mzhjziKSDJS0v704UJspuKxcVYB9Jd8ivqvk6ScfXLb4UqE6gMeYJSXNks7+JRC1JA+wv6R5J23p8vF/SMXXe9ocS9MJgV69+VdKPJTWlO7hf0nRjzOrRPgBcL+v3aDwkaVnG8XmSfB4z/bLP/Ps8Ptu9YAdXTsSuclmXq/0eHmcjEL+ewLKsoYE1kqKs4DXGDEq6SdJNwARJh0raT/ZZvLNsNc7OLiAxbs8bJD0v6VfGmCaMS3Ru+/fX7UhiBCLfAfqBw+uOcTTGzBp+BxsjnXeN7C+/VGHpmETdL6CLWBzhnI0XP9EGW+HDd3KmD6uBg+qOK5ED7Nz8RwOI/yyxCjNGYEzV7HUBjJO0r+ybSpFrs0TSovZbUCKRSCQSiUQikUg0kP8CjU3r5zCJm9gAAAAASUVORK5CYII=" />
                                </defs>
                            </svg>
                        </label>
                        @error('profile_image')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="w-full flex flex-col gap-8 py-4">
                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="name" class="text-gray-600">First Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            placeholder="John Doe" />
                        @error('name')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="email" class="text-gray-600">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            placeholder="john@gmail.com" />
                        @error('email')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="contact_number" class="text-gray-600">Phone</label>
                        <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number') }}"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            placeholder="+1 123 456 7890" />
                        @error('contact_number')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="grid md:grid-cols-2 sm:grid-cols-2 xs:grid-cols-1 gap-3 w-full">
                        <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                            <label for="country" class="text-gray-600">
                                Country
                            </label>
                            <select name="country_id" id="country"
                                class="country-dropdown bg-gray-200 md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] rounded-md border border-gray-300 outline-none px-3 w-full">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @selected($country->id == old('country_id'))
                                        data-states="{{ $country->states }}">
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                            <label for="state" class="text-gray-600">
                                State
                            </label>
                            <select disabled name="state_id" id="state"
                                class="state-dropdown bg-gray-200 md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] rounded-md border border-gray-300 outline-none px-3 w-full">
                                <option value="">Select Country First</option>
                            </select>
                            @error('state_id')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="specialization" class="text-gray-600">Specialization</label>
                        <input type="text" name="specialization" id="specialization" value="{{ old('specialization') }}"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            placeholder="e.g. Dermatologist, Cardiologist, Psychiatrist, etc." />
                        @error('specialization')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="qualifications" class="text-gray-600">Qualifications</label>
                        <input type="text" name="qualifications" id="qualifications" value="{{ old('qualifications') }}"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            placeholder="(MBBS, MD, FCPS, etc.)" />
                        @error('qualifications')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="years_of_experience" class="text-gray-600">Years of Experience</label>
                        <input type="number" name="years_of_experience" id="years_of_experience"
                            value="{{ old('years_of_experience') }}"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            placeholder="10" />
                        @error('years_of_experience')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="password" class="text-gray-600">Password</label>
                        <input type="password" name="password" id="password"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            placeholder="Enter your password" />
                        @error('password')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="password_confirmation" class="text-gray-600">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            placeholder="Re-enter your password" />
                        @error('password_confirmation')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-2">
                        <label for="clinicAddress" class="text-gray-600">Clinic Address (if any)</label>
                        <textarea name="address"
                            class="md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] bg-gray-200 rounded-md border border-gray-300 outline-none px-3 w-full"
                            rows="3">{{ old('address') }}
                        </textarea>
                        @error('address')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div> --}}

                    <div class="w-full py-3 flex items-center flex-col gap-2 justify-center">
                        <button type="submit"
                            class="cursor-pointer md:py-[0.7vw] sm:py-[1.2vw] xs:py-[1.7vw] md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-white bg-theme-blue rounded-md md:w-[75%] xs:w-full text-center">
                            Singup
                        </button>
                        <label for="remember" class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500">Already
                            have an
                            account
                            <a href="{{ route('doctor.login') }}" class="text-theme-blue underline">Login</a></label>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        function populateStatesFromCountryDropdown() {
            let selectedCountry = $('.country-dropdown').find(":selected");
            let states = selectedCountry.data('states');

            if (!states || states.length == 0) {
                $('.state-dropdown').empty();
                $('.state-dropdown').append(`<option value="">Select Country First</option>`);
                $('.state-dropdown').attr('disabled', true);
                return;
            }

            $('.state-dropdown').empty();
            $('.state-dropdown').append(`<option value="">Select State</option>`);
            $('.state-dropdown').attr('disabled', false);

            states.forEach(state => {
                $('.state-dropdown').append(`<option value="${state.id}">${state.name}</option>`);
            });
        }

        // On change
        $('.country-dropdown').change(function(e) {
            e.preventDefault();
            populateStatesFromCountryDropdown();
        });
    </script>
@endsection
