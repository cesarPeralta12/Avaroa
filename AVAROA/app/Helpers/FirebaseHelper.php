<?php

    namespace App\Helpers;

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\Auth;
    use Kreait\Firebase\Messaging;

    class FirebaseHelper
    {
        public static function auth(): Auth
        {
            $factory = (new Factory)
                ->withServiceAccount(public_path('firebase_credentials.json'));

            return $factory->createAuth();
        }

        public static function messaging(): Messaging
        {
            $factory = (new Factory)
                ->withServiceAccount(public_path('firebase_credentials.json'));

            return $factory->createMessaging();
        }
    }
