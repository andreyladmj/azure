<?php


// 1. Identify a point of flexibility
    // 1. Forum Account
    // 2. Regular Subscriber
    // 3. Team Member Access
    // 4. Forever Account
// 2. Extract each strategy into its own class
// 3. Ensure that each of those strategies adheres to a common contract/interface
// 4. Determine the proper strategy, and let it handle the task

use Illuminate\Http\Request;

class Subscriber {

    public function store(Request $request)
    {
        $strategy = $this->getRegistrationStrategy($request);

        $strategy->handle($request);
    }

    public function getRegistrationStrategy(Request $request)
    {
        if($request->plan == 'forever') {
            return new RegisterForeverUser;
        }

        if($request->invitation) {
            return new RegistersTeamMember;
        }

        return new RegistersSubscriber;
    }
}