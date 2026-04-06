@extends('doctor.layouts.app')
@section('content')
    <div class="relative rounded-xl border border-slate-200 bg-white chat-section overflow-hidden">
        <div class="chat-header flex justify-between bg-[#0e7ff8] p-2">
            <div class="flex items-center text-white">
                {{-- Show patient info --}}
                <img src="{{ asset($conversation->user->profile_image ?? 'default-avatar.png') }}"
                    class="h-14 w-14 rounded-full" alt="" srcset="">
                <div class="ml-2">
                    <h3 class="text-lg font-semibold">
                        {{ $conversation->user->name }}
                    </h3>
                    <h4>
                        {{ date('d M Y', strtotime($conversation->appointment->date)) . ' - ' . date('h:i A', strtotime($conversation->appointment->availableTiming->time)) }}
                    </h4>
                </div>
            </div>
            
            <div class="flex items-center gap-4 text-white">
                <button onclick="startCall('video')" id="video-call-btn"
                    class="cursor-pointer bg-white/30 hover:bg-white hover:!text-[#0e7ff8] rounded h-12 w-12 flex items-center justify-center transition-all">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.5 13V9M12.5 9H8.5M12.5 9L6.5 15M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.0799 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button onclick="startCall('audio')" id="audio-call-btn"
                    class="cursor-pointer bg-white/30 hover:bg-white hover:!text-[#0e7ff8] rounded h-12 w-12 flex items-center justify-center transition-all">
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
                        <img src="{{ asset($conversation->user->profile_image ?? 'default-avatar.png') }}" 
                             class="h-10 w-10 rounded-full mr-3">
                        <div>
                            <h3 class="font-semibold">{{ $conversation->user->name }}</h3>
                            <p class="text-sm" id="call-status">Connecting...</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span id="call-duration" class="text-sm bg-black/30 px-2 py-1 rounded">00:00</span>
                        <button onclick="endCall()" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm transition-colors">
                            End Call
                        </button>
                    </div>
                </div>

                <!-- Video Container -->
                <div class="flex-1 relative">
                    <!-- Remote Video (Patient) -->
                    <div id="remote-video-container" class="absolute inset-0">
                        <div id="remote-video" class="w-full h-full bg-gray-900 flex items-center justify-center">
                            <div id="audio-only-remote" class="text-center text-white hidden">
                                <img src="{{ asset($conversation->user->profile_image ?? 'default-avatar.png') }}" 
                                     class="h-32 w-32 rounded-full mx-auto mb-4 border-4 border-white/20">
                                <h3 class="text-xl">{{ $conversation->user->name }}</h3>
                                <p class="text-gray-300">Audio Call</p>
                                <div class="mt-4 flex justify-center">
                                    <div class="animate-pulse bg-green-500 w-4 h-4 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Local Video (Doctor) - Picture in Picture -->
                    <div id="local-video-container" class="absolute top-4 right-4 w-40 h-28 bg-gray-800 rounded-lg overflow-hidden border-2 border-white/20 shadow-lg">
                        <div id="local-video" class="w-full h-full">
                            <div id="audio-only-local" class="w-full h-full bg-blue-600 flex items-center justify-center text-white hidden">
                                <div class="text-center">
                                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20" class="mx-auto mb-1">
                                        <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-xs">You</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Connection Quality Indicator -->
                    <div id="connection-quality" class="absolute top-4 left-4 bg-black/50 px-3 py-1 rounded text-white text-sm">
                        <span class="inline-block w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                        Good Connection
                    </div>
                </div>

                <!-- Call Controls -->
                <div class="p-6 bg-black/50">
                    <div class="flex justify-center gap-4">
                        <!-- Mute Button -->
                        <button id="mute-btn" onclick="toggleMute()" 
                                class="bg-gray-600 hover:bg-gray-700 p-4 rounded-full text-white transition-all duration-200 group">
                            <svg id="mute-icon" width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        
                        <!-- Video Toggle Button -->
                        <button id="video-btn" onclick="toggleVideo()" 
                                class="bg-gray-600 hover:bg-gray-700 p-4 rounded-full text-white transition-all duration-200 hidden">
                            <svg id="video-icon" width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                            </svg>
                        </button>
                        
                        <!-- Screen Share Button (Optional) -->
                        <button id="share-btn" onclick="toggleScreenShare()" 
                                class="bg-gray-600 hover:bg-gray-700 p-4 rounded-full text-white transition-all duration-200">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v4a1 1 0 01-2 0V5H5v10h4a1 1 0 110 2H4a1 1 0 01-1-1V4zm7.707 4.293a1 1 0 00-1.414 1.414L10.586 11H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414l-3-3z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        
                        <!-- End Call Button -->
                        <button onclick="endCall()" 
                                class="bg-red-500 hover:bg-red-600 p-4 rounded-full text-white transition-all duration-200 shadow-lg">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.455 12.778L2.22 10.545a1 1 0 00-1.414 1.414l3.5 3.5a1 1 0 001.414 0l7-7a1 1 0 00-1.414-1.414L5 13.364l-1.545-1.545a1 1 0 00-1.414 1.414l.414.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Call Statistics (Optional) -->
                    <div class="mt-4 text-center text-gray-300 text-sm">
                        <span id="call-stats" class="bg-black/30 px-3 py-1 rounded">
                            Audio: Good | Video: Good
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Messages -->
        <div class="chat-body h-[400px] p-4 overflow-y-auto" style="scroll-behavior: smooth;">
            <!-- Messages will appear here -->
        </div>
        
        <!-- Chat Input -->
        <div class="chat-footer flex p-2">
            <input type="text" class="message w-[100%] border border-slate-300 rounded-tl rounded-bl h-12 px-2"
                placeholder="Type here...">
            <button
                class="send-message cursor-pointer bg-[#0e7ff8]/30 hover:bg-[#0e7ff8] hover:!text-white rounded-tr rounded-br h-12 w-12 flex items-center justify-center transition-colors">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.5003 12H5.41872M5.24634 12.7972L4.24158 15.7986C3.69128 17.4424 3.41613 18.2643 3.61359 18.7704C3.78506 19.21 4.15335 19.5432 4.6078 19.6701C5.13111 19.8161 5.92151 19.4604 7.50231 18.7491L17.6367 14.1886C19.1797 13.4942 19.9512 13.1471 20.1896 12.6648C20.3968 12.2458 20.3968 11.7541 20.1896 11.3351C19.9512 10.8529 19.1797 10.5057 17.6367 9.81135L7.48483 5.24303C5.90879 4.53382 5.12078 4.17921 4.59799 4.32468C4.14397 4.45101 3.77572 4.78336 3.60365 5.22209C3.40551 5.72728 3.67772 6.54741 4.22215 8.18767L5.24829 11.2793C5.34179 11.561 5.38855 11.7019 5.407 11.8459C5.42338 11.9738 5.42321 12.1032 5.40651 12.231C5.38768 12.375 5.34057 12.5157 5.24634 12.7972Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <!-- Incoming Call Notification -->
        <div id="incoming-call"
            class="call-bar absolute hidden top-[70px] w-full bg-gray-500/90 h-[70px] flex justify-between items-center px-2 z-30 backdrop-blur-sm">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-3 animate-pulse">
                    <svg width="24" height="24" fill="white" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <p class="text-white font-semibold text-lg" id="caller-name">
                    Hassan is calling you
                </p>
            </div>
            <div class="flex gap-2">
                <button onclick="acceptCall()"
                    class="bg-green-500 hover:bg-green-600 cursor-pointer border-2 font-semibold border-green-500 text-white px-4 py-2 rounded transition-colors">
                    Accept
                </button>
                <button onclick="rejectCall()"
                    class="bg-red-500 hover:bg-red-600 text-white cursor-pointer font-semibold border-2 border-red-500 px-4 py-2 rounded transition-colors">
                    Reject
                </button>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
        <!-- Agora SDK -->
        <script src="https://cdn.agora.io/sdk/release/AgoraRTC_N.js"></script>
        
        <script>
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
            let isScreenSharing = false;

            // Initialize Agora client
            client = AgoraRTC.createClient({mode: "rtc", codec: "vp8"});

            // Start call function
            async function startCall(type) {
                if (isInCall) {
                    alert('Already in a call');
                    return;
                }

                // First notify the patient about incoming call
                try {
                    await fetch('/initiate-call', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            appointment_id: {{ $conversation->appointment->id }},
                            call_type: type
                        })
                    });
                } catch (error) {
                    console.error('Error notifying patient:', error);
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
                    updateCallStatus('Waiting for patient...');

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

            // Screen share function (optional)
            async function toggleScreenShare() {
                if (!isVideoCall) return;
                
                try {
                    if (!isScreenSharing) {
                        // Start screen sharing
                        const screenTrack = await AgoraRTC.createScreenVideoTrack();
                        await client.unpublish(localVideoTrack);
                        await client.publish(screenTrack);
                        
                        localVideoTrack.stop();
                        localVideoTrack = screenTrack;
                        isScreenSharing = true;
                        
                        document.getElementById('share-btn').classList.add('bg-blue-500');
                        document.getElementById('share-btn').classList.remove('bg-gray-600');
                    } else {
                        // Stop screen sharing
                        await client.unpublish(localVideoTrack);
                        localVideoTrack.stop();
                        
                        localVideoTrack = await AgoraRTC.createCameraVideoTrack();
                        await client.publish(localVideoTrack);
                        localVideoTrack.play('local-video');
                        isScreenSharing = false;
                        
                        document.getElementById('share-btn').classList.remove('bg-blue-500');
                        document.getElementById('share-btn').classList.add('bg-gray-600');
                    }
                } catch (error) {
                    console.error('Screen share error:', error);
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
                isScreenSharing = false;
                document.getElementById('mute-btn').classList.remove('bg-red-500');
                document.getElementById('mute-btn').classList.add('bg-gray-600');
                document.getElementById('video-btn').classList.remove('bg-red-500');
                document.getElementById('video-btn').classList.add('bg-gray-600');
                document.getElementById('share-btn').classList.remove('bg-blue-500');
                document.getElementById('share-btn').classList.add('bg-gray-600');
                document.getElementById('call-duration').textContent = '00:00';
            }

            // Handle remote users
            client.on("user-published", async (user, mediaType) => {
                await client.subscribe(user, mediaType);
                updateCallStatus('Patient joined the call');
                
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

            client.on("user-left", (user) => {
                updateCallStatus('Patient left the call');
                if (!isVideoCall) {
                    document.getElementById('audio-only-remote').classList.remove('hidden');
                }
            });

            // Incoming call functions
            function acceptCall() {
                document.getElementById('incoming-call').classList.add('hidden');
                // Auto-determine call type based on what the caller initiated
                const callType = window.incomingCallData?.call_type || 'video';
                startCall(callType);
            }

            function rejectCall() {
                document.getElementById('incoming-call').classList.add('hidden');
                // Send rejection notification to caller via Pusher
            }

            // Handle incoming call notifications via Pusher
            var pusher = new Pusher('64d16f51719ffdb0c023', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel-' + "{{ Auth::id() }}");
            
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

            // Existing chat functionality
            $('.send-message').click(function(e) {
                e.preventDefault();
                let msg = $('.message').val().trim();

                if (!msg) {
                    alert('Please enter a message');
                    return;
                }

                let receiverId = "{{ $conversation->user_id }}";
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
                        // Send via QuickBlox for real-time delivery
                        if (typeof sendQBMessage === 'function') {
                            sendQBMessage(msg);
                        }
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
            }

            // Load existing messages
            function getMessages() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('get-messages') }}",
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

            // Pusher for receiving messages
            channel.bind('my-event', function(data) {
                replyElement(data.message.message, data.message.created_at);
                scrollToBottom();
            });

            // Load messages on page load
            $(document).ready(function() {
                getMessages();
            });
        </script>
    @endpush
@endsection