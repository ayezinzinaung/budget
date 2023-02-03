<?php

namespace App\Events;

use App\Models\Activity;
use App\Models\Tag;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Support\Facades\Auth;

class TagDeleted
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(Tag $tag)
    {
        $userId = null;

        if (Auth::check()) {
            $userId = Auth::user()->id;
        }

        Activity::create([
            'space_id' => $tag->space_id,
            'user_id' => $userId,
            'entity_id' => $tag->id,
            'entity_type' => 'tag',
            'action' => 'tag.deleted'
        ]);
    }
}
