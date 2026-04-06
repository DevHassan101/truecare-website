<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Call</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="video-container">
        <h2>Agora Video Call Test</h2>
        
        <div>
            <input type="text" id="channel-name" placeholder="Enter channel name" value="test-channel">
            <button onclick="joinCall()">Join Call</button>
            <button onclick="leaveCall()">Leave Call</button>
        </div>
        
        <div id="local-video" style="width: 300px; height: 200px; background: #000; margin: 10px;"></div>
        <div id="remote-videos"></div>
        
        <div id="status"></div>
    </div>

    <!-- Agora SDK -->
    <script src="https://cdn.agora.io/sdk/release/AgoraRTC_N.js"></script>
    
    <script>
        let client;
        let localVideoTrack;
        let localAudioTrack;
        
        // Initialize Agora client
        client = AgoraRTC.createClient({mode: "rtc", codec: "vp8"});
        
        async function joinCall() {
            const channelName = document.getElementById('channel-name').value;
            updateStatus('Generating token...');
            
            try {
                // Get token from Laravel backend
                const response = await fetch('/generate-agora-token', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        channel_name: channelName,
                        uid: 0
                    })
                });
                
                const data = await response.json();
                updateStatus('Token generated, joining channel...');
                
                // Join channel
                await client.join(data.app_id, channelName, data.token, null);
                updateStatus('Joined channel successfully!');
                
                // Create and publish local tracks
                localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
                localVideoTrack = await AgoraRTC.createCameraVideoTrack();
                
                // Play local video
                localVideoTrack.play('local-video');
                
                // Publish tracks
                await client.publish([localAudioTrack, localVideoTrack]);
                updateStatus('Publishing local stream...');
                
            } catch (error) {
                console.error('Error joining call:', error);
                updateStatus('Error: ' + error.message);
            }
        }
        
        async function leaveCall() {
            try {
                // Stop local tracks
                if (localVideoTrack) {
                    localVideoTrack.stop();
                    localVideoTrack.close();
                }
                if (localAudioTrack) {
                    localAudioTrack.stop();
                    localAudioTrack.close();
                }
                
                // Leave channel
                await client.leave();
                updateStatus('Left channel');
                
                // Clear videos
                document.getElementById('local-video').innerHTML = '';
                document.getElementById('remote-videos').innerHTML = '';
                
            } catch (error) {
                console.error('Error leaving call:', error);
            }
        }
        
        // Handle remote users
        client.on("user-published", async (user, mediaType) => {
            await client.subscribe(user, mediaType);
            
            if (mediaType === "video") {
                const remoteVideoTrack = user.videoTrack;
                const remotePlayerContainer = document.createElement('div');
                remotePlayerContainer.id = `remote-${user.uid}`;
                remotePlayerContainer.style.width = "300px";
                remotePlayerContainer.style.height = "200px";
                remotePlayerContainer.style.background = "#000";
                remotePlayerContainer.style.margin = "10px";
                
                document.getElementById('remote-videos').appendChild(remotePlayerContainer);
                remoteVideoTrack.play(`remote-${user.uid}`);
            }
            
            if (mediaType === "audio") {
                user.audioTrack.play();
            }
        });
        
        client.on("user-unpublished", (user) => {
            const remotePlayerContainer = document.getElementById(`remote-${user.uid}`);
            if (remotePlayerContainer) {
                remotePlayerContainer.remove();
            }
        });
        
        function updateStatus(message) {
            document.getElementById('status').innerText = message;
            console.log(message);
        }
    </script>
</body>
</html>