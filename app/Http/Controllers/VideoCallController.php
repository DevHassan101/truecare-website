<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AgoraService;

class VideoCallController extends Controller
{
    public function index()
    {
        return view('video-call');
    }

    public function generateToken(Request $request)
    {
        $channelName = $request->channel_name ?? 'test-channel';
        $uid = $request->uid ?? 0;
        
        $agoraService = new AgoraService();
        $token = $agoraService->generateToken($channelName, $uid);
        
        return response()->json([
            'token' => $token,
            'app_id' => config('services.agora.app_id'),
            'channel' => $channelName,
            'uid' => $uid
        ]);
    }
}