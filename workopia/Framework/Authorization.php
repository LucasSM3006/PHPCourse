<?php

namespace Framework;

use Framework\Session;

class Authorization
{

    /**
     * Check if the current user is the owner. Returns true if yes, false otherwise.
     * 
     * @param int resourceId
     * @return bool
     */
    public static function isOwner($resourceId)
    {
        $sessionUser = Session::get('user');

        if($sessionUser !== null && isset($sessionUser['id']))
        {
            $sessionUserId = (int) $sessionUser['id'];

            return $sessionUserId === $resourceId;
        }

        return false;
    }
}