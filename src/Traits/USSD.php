<?php

namespace Arhinful\LaravelMnotify\Traits;

trait USSD
{
    public function sharedUSSD()
    {
        // Implementation depends on specific requirements for shared USSD
        // Usually involves setting up a callback.
        // The endpoint is /your-server.com/your-callback-url which seems to be a webhook setup?
        // Or maybe it's registering a callback?
        // endpoints.json: POST /your-server.com/your-callback-url
        // This looks like a placeholder in the docs.
        
        // Let's skip implementation if it's unclear, or just add a placeholder method.
        return "USSD implementation requires specific callback setup.";
    }
    
    public function dedicatedUSSD()
    {
        return "USSD implementation requires specific callback setup.";
    }
}
