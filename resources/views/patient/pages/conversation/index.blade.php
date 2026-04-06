@extends('patient.layouts.app')
@section('content')
    <div class="relative rounded-xl border border-slate-200 bg-white chat-section overflow-hidden">
        <div class="chat-header flex justify-between bg-[#0e7ff8] p-2">
            <div class="flex items-center text-white">
                <img src="{{ asset($conversation->doctor->profile_image) }}" class="h-14 w-14 rounded-full" alt=""
                    srcset="">
                <div class="ml-2">
                    <h3 class="text-lg font-semibold">
                        {{ $conversation->doctor->name }}
                    </h3>
                    <h4>
                        {{ date('d M Y', strtotime($conversation->appointment->date)) . ' - ' . date('h:i A', strtotime($conversation->appointment->availableTiming->time)) }}
                    </h4>
                </div>
            </div>

            <div class="flex items-center gap-4 text-white">
                <a href="#" onclick="toggleModal('crud-modal'); return false;"
                    class="cursor-pointer bg-white/30 hover:bg-white hover:!text-[#0e7ff8] rounded h-12 w-12 flex items-center justify-center">
                    End
                </a>
                <button onclick="startCall('video')" id="video-call-btn"
                    class="cursor-pointer bg-white/30 hover:bg-white hover:!text-[#0e7ff8] rounded h-12 w-12 flex items-center justify-center">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.5 13V9M12.5 9H8.5M12.5 9L6.5 15M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.0799 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button onclick="startCall('audio')" id="audio-call-btn"
                    class="cursor-pointer bg-white/30 hover:bg-white hover:!text-[#0e7ff8] rounded h-12 w-12 flex items-center justify-center">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.3308 15.9402L15.6608 14.6101C15.8655 14.403 16.1092 14.2384 16.3778 14.1262C16.6465 14.014 16.9347 13.9563 17.2258 13.9563C17.517 13.9563 17.8052 14.014 18.0739 14.1262C18.3425 14.2384 18.5862 14.403 18.7908 14.6101L20.3508 16.1702C20.5579 16.3748 20.7224 16.6183 20.8346 16.887C20.9468 17.1556 21.0046 17.444 21.0046 17.7351C21.0046 18.0263 20.9468 18.3146 20.8346 18.5833C20.7224 18.8519 20.5579 19.0954 20.3508 19.3L19.6408 20.02C19.1516 20.514 18.5189 20.841 17.8329 20.9541C17.1469 21.0672 16.4427 20.9609 15.8208 20.6501C10.4691 17.8952 6.11008 13.5396 3.35083 8.19019C3.03976 7.56761 2.93414 6.86242 3.04914 6.17603C3.16414 5.48963 3.49384 4.85731 3.99085 4.37012L4.70081 3.65015C5.11674 3.23673 5.67937 3.00464 6.26581 3.00464C6.85225 3.00464 7.41488 3.23673 7.83081 3.65015L9.40082 5.22021C9.81424 5.63615 10.0463 6.19871 10.0463 6.78516C10.0463 7.3716 9.81424 7.93416 9.40082 8.3501L8.0708 9.68018C8.95021 10.8697 9.91617 11.9926 10.9608 13.04C11.9994 14.0804 13.116 15.04 14.3008 15.9102L14.3308 15.9402Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.3398 8.66L20.9998 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M16.7598 3H20.9998V7.24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Call Interface Overlay -->
        <div id="call-interface" class="absolute inset-0 bg-black/95 z-40 hidden">
            <div class="h-full flex flex-col">
                <!-- Call Header -->
                <div class="flex justify-between items-center p-4 bg-black/50 text-white">
                    <div class="flex items-center">
                        <img src="{{ asset($conversation->doctor->profile_image) }}" class="h-10 w-10 rounded-full mr-3">
                        <div>
                            <h3 class="font-semibold">{{ $conversation->doctor->name }}</h3>
                            <p class="text-sm" id="call-status">Connecting...</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span id="call-duration" class="text-sm">00:00</span>
                        <button onclick="endCall()" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">
                            End Call
                        </button>
                    </div>
                </div>

                <!-- Video Container -->
                <div class="flex-1 relative">
                    <!-- Remote Video (Doctor) -->
                    <div id="remote-video-container" class="absolute inset-0">
                        <div id="remote-video" class="w-full h-full bg-gray-900 flex items-center justify-center">
                            <div id="audio-only-remote" class="text-center text-white hidden">
                                <img src="{{ asset($conversation->doctor->profile_image) }}"
                                    class="h-32 w-32 rounded-full mx-auto mb-4">
                                <h3 class="text-xl">{{ $conversation->doctor->name }}</h3>
                                <p class="text-gray-300">Audio Call</p>
                            </div>
                        </div>
                    </div>

                    <!-- Local Video (Patient) - Picture in Picture -->
                    <div id="local-video-container"
                        class="absolute top-4 right-4 w-40 h-28 bg-gray-800 rounded-lg overflow-hidden border-2 border-white/20">
                        <div id="local-video" class="w-full h-full">
                            <div id="audio-only-local"
                                class="w-full h-full bg-blue-600 flex items-center justify-center text-white hidden">
                                <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Call Controls -->
                <div class="p-4 bg-black/50">
                    <div class="flex justify-center gap-4">
                        <button id="mute-btn" onclick="toggleMute()"
                            class="bg-gray-600 hover:bg-gray-700 p-3 rounded-full text-white">
                            <svg id="mute-icon" width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.617.763L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.797-3.763a1 1 0 011.617.763z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <button id="video-btn" onclick="toggleVideo()"
                            class="bg-gray-600 hover:bg-gray-700 p-3 rounded-full text-white hidden">
                            <svg id="video-icon" width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                            </svg>
                        </button>

                        <button onclick="endCall()" class="bg-red-500 hover:bg-red-600 p-3 rounded-full text-white">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="chat-body h-[400px] p-4 overflow-y-auto">
            <!-- Messages will appear here -->
        </div>
        <div class="chat-footer flex p-2">
            <input type="text" class="message w-[100%] border border-slate-300 rounded-tl rounded-bl h-12 px-2"
                placeholder="Type here...">
            <button
                class="send-message cursor-pointer bg-[#0e7ff8]/30 hover:bg-[#0e7ff8] hover:!text-white rounded-tr rounded-br h-12 w-12 flex items-center justify-center">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.5003 12H5.41872M5.24634 12.7972L4.24158 15.7986C3.69128 17.4424 3.41613 18.2643 3.61359 18.7704C3.78506 19.21 4.15335 19.5432 4.6078 19.6701C5.13111 19.8161 5.92151 19.4604 7.50231 18.7491L17.6367 14.1886C19.1797 13.4942 19.9512 13.1471 20.1896 12.6648C20.3968 12.2458 20.3968 11.7541 20.1896 11.3351C19.9512 10.8529 19.1797 10.5057 17.6367 9.81135L7.48483 5.24303C5.90879 4.53382 5.12078 4.17921 4.59799 4.32468C4.14397 4.45101 3.77572 4.78336 3.60365 5.22209C3.40551 5.72728 3.67772 6.54741 4.22215 8.18767L5.24829 11.2793C5.34179 11.561 5.38855 11.7019 5.407 11.8459C5.42338 11.9738 5.42321 12.1032 5.40651 12.231C5.38768 12.375 5.34057 12.5157 5.24634 12.7972Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <div id="incoming-call"
            class="call-bar absolute hidden top-[70px] w-full bg-gray-500/90 h-[70px] flex justify-between items-center px-2 z-30">
            <p class=" text-white font-semibold text-lg" id="caller-name">
                Hassan is calling you
            </p>
            <div>
                <button onclick="acceptCall()"
                    class="bg-green-500 hover:bg-transparent hover:text-green-500 cursor-pointer border-2 font-semibold border-green-500 text-white px-4 py-2 rounded">Accept</button>
                <button onclick="rejectCall()"
                    class="bg-red-500 hover:bg-transparent hover:text-red-500 text-white cursor-pointer font-semibold border-2 border-red-500 px-4 py-2 rounded">Reject</button>

            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 bg-black/50 flex z-50 items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-5 dark:bg-gray-700 relative">

            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-600 pb-3">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New Product</h3>
                <button type="button" onclick="toggleModal('crud-modal')"
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form class="mt-4 space-y-4 text-gray-900 dark:text-white"
                action="{{ route('patient.appointment.add-review', ['appointment' => $conversation->appointment]) }}"
                method="post">
                @csrf
                @method('PUT')

                <div>
                    <label for="stars" class="block mb-1 font-medium capitalize">give stars</label>
                    <select id="stars" name="stars"
                        class="w-full p-2 border rounded-md dark:bg-gray-600 dark:border-gray-500" required>
                        <option value="">Select One</option>
                        <option value="1">very bad</option>
                        <option value="2">poor</option>
                        <option value="3">fair</option>
                        <option value="4">very good</option>
                        <option value="5">excelent</option>
                    </select>
                </div>

                <div>
                    <label for="comments" class="block mb-1 font-medium capitalize">comments</label>
                    <textarea id="comments" name="comments" rows="4" placeholder="Write comments here"
                        class="w-full p-2 border rounded-md dark:bg-gray-600 dark:border-gray-500"></textarea>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center mb-4">
                        <input id="recommended-yes" type="radio" value="1" name="recomnded"
                            {{ old('recommended', $conversation->recommended) == 1 ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="recommended-yes" class="ms-2 text-sm font-medium text-white">Recommended</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="recommended-no" type="radio" value="0" name="recomnded"
                            {{ old('recommended', $conversation->recommended) == 0 ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="recommended-no" class="ms-2 text-sm font-medium text-white">Not Recommended</label>
                    </div>
                </div>

                <button type="submit"
                    class="capitalize bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-lg font-semibold w-full">
                    submit
                </button>
            </form>

        </div>
    </div>
    {{-- /Modal --}}

    @push('head')
        {{-- pusher --}}
        <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
        <!-- Agora SDK -->
        <script src="https://cdn.agora.io/sdk/release/AgoraRTC_N.js"></script>
    @endpush

    @push('script')
        <script>
            // Existing Pusher code
            Pusher.logToConsole = true;
            var pusher = new Pusher('64d16f51719ffdb0c023', {
                cluster: 'ap2'
            });

            console.warn('my-channel-' + "{{ Auth::id() }}");
            var channel = pusher.subscribe('my-channel-' + "{{ Auth::id() }}");
            channel.bind('my-event', function(data) {
                replyElement(data.message.message, data.message.created_at);
                scrollToBottom();
            });

            function toggleModal(id) {
                const modal = document.getElementById(id);
                if (!modal) return;
                modal.classList.toggle('hidden');
            }

            // Agora Video/Audio Call Implementation
            let client;
            let localVideoTrack;
            let localAudioTrack;
            let isVideoCall = false;
            let isMuted = false;
            let isVideoOn = true;
            let callStartTime;
            let callTimer;
            let isInCall = false;

            // Initialize Agora client
            client = AgoraRTC.createClient({
                mode: "rtc",
                codec: "vp8"
            });

            // Start call function
            async function startCall(type) {
                if (isInCall) {
                    alert('Already in a call');
                    return;
                }

                isVideoCall = type === 'video';
                const channelName = `appointment-{{ $conversation->appointment->id }}`;

                try {
                    updateCallStatus('Generating token...');
                    showCallInterface();

                    // Get token from Laravel backend
                    const response = await fetch('/generate-agora-token', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            channel_name: channelName,
                            uid: {{ Auth::id() }},
                            call_type: type
                        })
                    });

                    const data = await response.json();
                    updateCallStatus('Connecting...');

                    // Join channel
                    await client.join(data.app_id, channelName, data.token, {{ Auth::id() }});
                    updateCallStatus('Connected');
                    isInCall = true;
                    startCallTimer();

                    // Create and publish local tracks
                    localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();

                    if (isVideoCall) {
                        localVideoTrack = await AgoraRTC.createCameraVideoTrack();
                        localVideoTrack.play('local-video');
                        document.getElementById('video-btn').classList.remove('hidden');
                        document.getElementById('audio-only-local').classList.add('hidden');
                        document.getElementById('audio-only-remote').classList.add('hidden');
                    } else {
                        document.getElementById('video-btn').classList.add('hidden');
                        document.getElementById('audio-only-local').classList.remove('hidden');
                        document.getElementById('audio-only-remote').classList.remove('hidden');
                    }

                    // Publish tracks
                    const tracksToPublish = [localAudioTrack];
                    if (isVideoCall && localVideoTrack) {
                        tracksToPublish.push(localVideoTrack);
                    }

                    await client.publish(tracksToPublish);
                    updateCallStatus('In call');

                } catch (error) {
                    console.error('Error starting call:', error);
                    updateCallStatus('Connection failed');
                    hideCallInterface();
                }
            }

            // End call function
            async function endCall() {
                try {
                    isInCall = false;
                    stopCallTimer();

                    // Stop local tracks
                    if (localVideoTrack) {
                        localVideoTrack.stop();
                        localVideoTrack.close();
                        localVideoTrack = null;
                    }
                    if (localAudioTrack) {
                        localAudioTrack.stop();
                        localAudioTrack.close();
                        localAudioTrack = null;
                    }

                    // Leave channel
                    await client.leave();
                    hideCallInterface();
                    resetCallControls();

                } catch (error) {
                    console.error('Error ending call:', error);
                    hideCallInterface();
                }
            }

            // Toggle mute function
            async function toggleMute() {
                if (localAudioTrack) {
                    if (isMuted) {
                        await localAudioTrack.setEnabled(true);
                        isMuted = false;
                        document.getElementById('mute-btn').classList.remove('bg-red-500');
                        document.getElementById('mute-btn').classList.add('bg-gray-600');
                    } else {
                        await localAudioTrack.setEnabled(false);
                        isMuted = true;
                        document.getElementById('mute-btn').classList.remove('bg-gray-600');
                        document.getElementById('mute-btn').classList.add('bg-red-500');
                    }
                }
            }

            // Toggle video function
            async function toggleVideo() {
                if (localVideoTrack && isVideoCall) {
                    if (isVideoOn) {
                        await localVideoTrack.setEnabled(false);
                        isVideoOn = false;
                        document.getElementById('video-btn').classList.remove('bg-gray-600');
                        document.getElementById('video-btn').classList.add('bg-red-500');
                    } else {
                        await localVideoTrack.setEnabled(true);
                        isVideoOn = true;
                        document.getElementById('video-btn').classList.remove('bg-red-500');
                        document.getElementById('video-btn').classList.add('bg-gray-600');
                    }
                }
            }

            // Utility functions
            function showCallInterface() {
                document.getElementById('call-interface').classList.remove('hidden');
            }

            function hideCallInterface() {
                document.getElementById('call-interface').classList.add('hidden');
            }

            function updateCallStatus(status) {
                document.getElementById('call-status').textContent = status;
            }

            function startCallTimer() {
                callStartTime = Date.now();
                callTimer = setInterval(() => {
                    const elapsed = Math.floor((Date.now() - callStartTime) / 1000);
                    const minutes = Math.floor(elapsed / 60).toString().padStart(2, '0');
                    const seconds = (elapsed % 60).toString().padStart(2, '0');
                    document.getElementById('call-duration').textContent = `${minutes}:${seconds}`;
                }, 1000);
            }

            function stopCallTimer() {
                if (callTimer) {
                    clearInterval(callTimer);
                    callTimer = null;
                }
            }

            function resetCallControls() {
                isMuted = false;
                isVideoOn = true;
                document.getElementById('mute-btn').classList.remove('bg-red-500');
                document.getElementById('mute-btn').classList.add('bg-gray-600');
                document.getElementById('video-btn').classList.remove('bg-red-500');
                document.getElementById('video-btn').classList.add('bg-gray-600');
                document.getElementById('call-duration').textContent = '00:00';
            }

            // Handle remote users
            client.on("user-published", async (user, mediaType) => {
                await client.subscribe(user, mediaType);

                if (mediaType === "video") {
                    const remoteVideoTrack = user.videoTrack;
                    remoteVideoTrack.play('remote-video');
                    document.getElementById('audio-only-remote').classList.add('hidden');
                }

                if (mediaType === "audio") {
                    user.audioTrack.play();
                }
            });

            client.on("user-unpublished", (user, mediaType) => {
                if (mediaType === "video") {
                    if (!isVideoCall) {
                        document.getElementById('audio-only-remote').classList.remove('hidden');
                    }
                }
            });

            // Incoming call functions
            function acceptCall() {
                document.getElementById('incoming-call').classList.add('hidden');
                // Auto-determine call type based on what the caller initiated
                // You can get this from the call notification data
                startCall('video'); // or 'audio' based on incoming call type
            }

            function rejectCall() {
                document.getElementById('incoming-call').classList.add('hidden');
                // Send rejection notification to caller via Pusher
                // Implementation depends on your backend notification system
            }

            // Handle incoming call notifications via Pusher
            channel.bind('incoming-call', function(data) {
                document.getElementById('caller-name').textContent = `${data.caller_name} is calling you`;
                document.getElementById('incoming-call').classList.remove('hidden');

                // Store call data for when user accepts
                window.incomingCallData = data;
            });

            channel.bind('call-ended', function(data) {
                if (isInCall) {
                    endCall();
                }
                document.getElementById('incoming-call').classList.add('hidden');
            });

            // Handle page unload - cleanup call resources
            window.addEventListener('beforeunload', () => {
                if (isInCall) {
                    endCall();
                }
            });
        </script>


        <script>
            // Send Message Handler
            $('.send-message').click(function(e) {
                e.preventDefault();
                let msg = $('.message').val().trim();

                if (!msg) {
                    alert('Please enter a message');
                    return;
                }

                let receiverId = "{{ $conversation->doctor_id }}";
                let conversationId = "{{ $conversation->id }}";

                // Send via backend API
                $.ajax({
                    type: "POST",
                    url: "{{ route('send-message') }}",
                    data: {
                        receiverId: receiverId,
                        conversationId: conversationId,
                        msg: msg,
                    },
                    headers: {
                        'x-csrf-token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log("Message sent via API");
                    },
                    error: function(xhr, status, error) {
                        console.error("API send error:", error);
                        alert("Failed to send message. Please try again.");
                    }
                });

                // Display message immediately
                myElement(msg, new Date());
                $('.message').val('');
                scrollToBottom();
            });

            // Handle Enter key for sending messages
            $('.message').keypress(function(e) {
                if (e.which === 13) {
                    $('.send-message').click();
                }
            });

            // Display user's own message
            function myElement(msg, createdAt = new Date()) {
                const time = new Date(createdAt).toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });

                let div = `<div class="my-1 flex justify-end">
                                <div class="bg-[#0f7ff7] rounded px-2 py-1 text-white min-w-[150px] max-w-[80%] relative">
                                    <p class="mb-3">
                                        ${escapeHtml(msg)}                                   
                                    </p>
                                    <span class="absolute text-xs bottom-[3px] right-[7px]">
                                            ${time}
                                    </span>
                                </div>                                                          
                            </div>`;
                $('.chat-body').append(div);
            }

            // Display received message
            function replyElement(msg, createdAt = new Date()) {
                const time = new Date(createdAt).toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });

                let div = `<div class="my-1 flex">
                                <div class="bg-slate-100 rounded px-2 py-1 text-black border border-slate-200 min-w-[150px] max-w-[80%] relative">
                                    <p class="mb-3">
                                        ${escapeHtml(msg)}
                                    </p>
                                    <span class="absolute text-xs bottom-[3px] right-[7px]">
                                            ${time}
                                    </span>
                                </div>
                            </div>`;
                $('.chat-body').append(div);
            }

            // Utility Functions
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            function scrollToBottom() {
                const chatBody = document.querySelector('.chat-body');
                chatBody.scrollTo({
                    top: chatBody.scrollHeight,
                    behavior: 'smooth'
                });
                // chatBody.scrollTop = chatBody.scrollHeight;
            }

            function showNotification(message) {
                // Simple notification - you can enhance this
                console.log("Notification:", message);
            }

            // Load existing messages
            function getMessages() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('patient.conversation.get') }}",
                    data: {
                        conversationId: "{{ $conversation->id }}"
                    },
                    success: function(response) {
                        if (response.error) {
                            console.error(response.message);
                            return;
                        }

                        let messages = response.messages;
                        messages.forEach(message => {
                            if (message.sender_id == "{{ Auth::id() }}") {
                                myElement(message.message, message.created_at);
                            } else {
                                replyElement(message.message, message.created_at);
                            }
                        });
                        setTimeout(() => {
                            scrollToBottom();
                        }, 100);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading messages:", error);
                    }
                });
            }
            $(document).ready(function() {
                getMessages();
            });
        </script>
    @endpush
@endsection
