@extends('doctor.layouts.app')
@section('content')
    <form action="{{ route('doctor.update-profile') }}" method="post" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Profile Photo Section -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 flex justify-between items-center border-b border-gray-100 bg-gradient-to-r from-purple-50 to-pink-50">
                <div class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-xl flex items-center justify-center">
                        <iconify-icon icon="basil:user-solid" width="26" height="26"
                                style="color: white"></iconify-icon>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-[#312E81]">Profile Settings</h2>
                        <p class="text-sm text-gray-600">Manage your account information and preferences</p>
                    </div>
                </div>
                <a href="{{ route('doctor.stripe.setup') }}"
                    class="flex items-center gap-2 px-6 py-3.5 rounded-xl font-medium text-white bg-gradient-to-r from-[#4F46E5] to-[#312E81] hover:from-indigo-700 hover:to-purple-700 shadow-md shadow-indigo-200 hover:shadow-xl transition-all duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>
                    Setup Stripe Account
                </a>
            </div>

            <div class="p-6">
                <div class="flex items-start gap-6">
                    <div class="relative group">
                        <div class="w-32 h-32 rounded-2xl overflow-hidden border-4 border-[#d4d2ff] shadow-md">
                            <img id="imageShow" src="{{ asset(Auth::user()->profile_image) }}"
                                class="w-full h-full object-cover" alt="Profile" />
                        </div>
                        <div
                            class="absolute inset-0 bg-black/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-[#312E81] mb-2">Change Profile Picture</h3>
                        <p class="text-sm text-gray-600 mb-4">Upload a new photo to personalize your profile</p>

                        <input type="file" accept=".jpg,.png,.svg" name="image" hidden id="profileImage" />
                        <label for="profileImage"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200 cursor-pointer transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Upload New Photo
                        </label>

                        <p class="mt-3 text-xs text-gray-500 flex items-start gap-2">
                            <svg class="w-4 h-4 text-indigo-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Maximum 4 MB. Accepted: JPG, PNG, SVG</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Information Section -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-pink-50">
                <div class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-[#312E81]">Personal Information</h2>
                        <p class="text-sm text-gray-600">Update your personal details</p>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-6">
                <!-- Name & Email -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">Display Name</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none" />
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">Email Address</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none" />
                        @error('email')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Phone, DOB, Experience -->
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">Phone Number</label>
                        <input type="text" name="contact_number" value="{{ Auth::user()->contact_number }}"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none" />
                        @error('contact_number')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">Date of Birth</label>
                        <input type="date" name="dob" value="{{ Auth::user()->dob }}"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none" />
                        @error('dob')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">Years of Experience</label>
                        <input type="number" name="years_of_experience" value="{{ Auth::user()->years_of_experience }}"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none" />
                        @error('years_of_experience')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Specialization & Qualifications -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">Specialization</label>
                        <input type="text" name="specialization" value="{{ Auth::user()->specialization }}"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none" />
                        <p class="text-xs text-gray-500">Separate with commas (e.g. Dermatologist, Cardiologist)</p>
                        @error('specialization')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">Qualifications</label>
                        <input type="text" name="qualifications" value="{{ Auth::user()->qualifications }}"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none" />
                        <p class="text-xs text-gray-500">Separate with commas (e.g. MBBS, BDS)</p>
                        @error('qualifications')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Country & State -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">Country</label>
                        <select name="country_id" id="country"
                            class="country-dropdown w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none bg-white">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @selected($country->id == old('country_id', Auth::user()->country_id))
                                    data-states="{{ $country->states }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700">State</label>
                        <select disabled name="state_id" id="state"
                            class="state-dropdown w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none bg-white">
                            <option value="">Select Country First</option>
                        </select>
                        @error('state_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Languages -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700">Languages</label>
                    <div
                        class="border-2 border-gray-200 rounded-xl px-4 py-3 focus-within:border-indigo-500 focus-within:ring-4 focus-within:ring-indigo-100 transition-all">
                        <div id="langShow" class="flex flex-wrap gap-2 mb-2"></div>
                        <input type="text" name="languages" id="languages" value="{{ Auth::user()->languages }}"
                            class="w-full outline-none" placeholder="Type languages" />
                    </div>
                    <p class="text-xs text-gray-500">Separate with commas (e.g. English, Spanish, Dutch)</p>
                    @error('languages')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Available Full Time Toggle -->
                <label
                    class="inline-flex items-center cursor-pointer p-4 rounded-xl bg-purple-50 border border-purple-100">
                    <input type="checkbox" value="1" class="sr-only peer" name="available_full_time"
                        @checked(old('available_full_time', Auth::user()->available_full_time))>
                    <div
                        class="relative w-11 h-6 bg-gray-300 peer-focus:ring-4 peer-focus:ring-indigo-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-[#4F46E5] peer-checked:to-[#312E81]">
                    </div>
                    <span class="ms-3 text-sm font-semibold text-[#312E81]">Available Full Time</span>
                </label>

                <!-- Bio -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700">Professional Bio</label>
                    <textarea name="bio" id="bio" rows="6"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all outline-none resize-none"
                        placeholder="Tell us about your experience and expertise...">{{ Auth::user()->bio }}</textarea>
                    @error('bio')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                    <button type="button"
                        class="px-6 py-3 rounded-xl font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                        Cancel
                    </button>

                    <button type="submit"
                        class="flex items-center gap-2 px-6 py-3 rounded-xl font-medium text-white bg-gradient-to-r from-[#EC4899] to-[#DB2777] hover:from-indigo-700 hover:to-purple-700 shadow-md shadow-[#EC4899]/40 hover:shadow-xl transition-all duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>

    @push('script')
        <script>
            const selectProfileImage = () => {
                const imageShow = document.getElementById("imageShow");
                const profileInput = document.getElementById("profileImage");
                const removeImage = document.getElementById("removeImage");

                // Check if a file is selected
                if (profileInput.files && profileInput.files[0]) {
                    const profileImage = profileInput.files[0];
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        imageShow.src = e.target.result;
                    };

                    reader.readAsDataURL(profileImage);

                    removeImage.addEventListener("click", () => {
                        imageShow.src =
                            "../images/doctor-dashboard/default-featured-image.png.jpg";
                        profileInput.value = ""; // Clear input
                    });
                }
            };

            // Add change event listener to trigger function when a file is selected
            document
                .getElementById("profileImage")
                .addEventListener("change", selectProfileImage);

            let langs = []; // Global array to persist values

            const handleEnterLang = () => {
                const saveBtn = document.getElementById("saveBtn");
                const langInput = document.getElementById("lang");
                const langShow = document.getElementById("langShow");

                if (!saveBtn || !langInput || !langShow) return;

                // Function to re-render the language list
                const renderLangs = () => {
                    langShow.innerHTML = "";

                    langs.forEach((lang, index) => {
                        const p = document.createElement("p");
                        p.classList.add(
                            "md:py-[0.3vw]",
                            "sm:py-[0.8vw]",
                            "xs:py-[1.3vw]",
                            "md:text-[0.9vw]",
                            "sm:text-[1.9vw]",
                            "xs:text-[3.4vw]",
                            "px-3",
                            "flex",
                            "items-center",
                            "gap-2",
                            "bg-gray-100",
                            "rounded-md"
                        );

                        const span = document.createElement("span");
                        span.textContent = lang;

                        const crossIcon = document.createElement("i");
                        crossIcon.classList.add(
                            "fa-solid",
                            "fa-xmark",
                            "cursor-pointer",
                            "text-red-500"
                        );
                        crossIcon.title = "Remove";

                        // Remove the language on cross click
                        crossIcon.addEventListener("click", () => {
                            langs.splice(index, 1); // remove the language
                            renderLangs(); // re-render the list
                        });

                        p.appendChild(span);
                        p.appendChild(crossIcon);
                        langShow.appendChild(p);
                    });
                };

                saveBtn.addEventListener("click", (e) => {
                    e.preventDefault();

                    const value = langInput.value.trim();
                    if (value.length > 0) {
                        langs.push(value);
                        langInput.value = "";
                        renderLangs(); // update view
                    }
                });
            };

            handleEnterLang();

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
                let userStateId = "{{ Auth::user()->state_id }}";

                states.forEach(state => {
                    $('.state-dropdown').append(
                        `<option value="${state.id}" ${state.id == userStateId ? 'selected' : ''}>${state.name}</option>`
                    );
                });
            }

            // On change
            $('.country-dropdown').change(function(e) {
                e.preventDefault();
                populateStatesFromCountryDropdown();
            });

            // On page load
            $(document).ready(function() {
                populateStatesFromCountryDropdown();
            });
        </script>
    @endpush

    @push('head')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
@endsection
