<?php
namespace App\Services;

use App\Libraries\Agora\RtcTokenBuilder;

// use App\Libraries\Agore\
class AgoraService
{
    private $appId;
    private $appCertificate;

    public function __construct()
    {
        $this->appId = config('services.agora.app_id');
        $this->appCertificate = config('services.agora.app_certificate');
    }

    public function generateToken($channelName, $uid = 0, $expireTime = 3600)
    {
        $currentTimestamp = time();
        $privilegeExpiredTs = $currentTimestamp + $expireTime;

        return RtcTokenBuilder::buildTokenWithUid(
            $this->appId,
            $this->appCertificate,
            $channelName,
            $uid,
            RtcTokenBuilder::RolePublisher,
            $privilegeExpiredTs
        );
    }

    public function getAppId()
    {
        return $this->appId;
    }
}