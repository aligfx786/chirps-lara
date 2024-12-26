<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    //Passing all of the data from a request to your model can be risky. Imagine you have a page where users can edit their profiles. If you were to pass the entire request to the model, then a user could edit any column they like, such as an is_admin column. This is called a mass assignment vulnerability.
    // 
    // Laravel protects you from accidentally doing this by blocking mass assignment by default. Mass assignment is very convenient though, as it prevents you from having to assign each attribute one-by-one. We can enable mass assignment for safe attributes by marking them as "fillable".
    // 
    // Let's add the $fillable property to our Chirp model to enable mass-assignment for the message attribute:
    // 
    public $timestamps = true; // Default is true; ensure this isn't overridden.
    
    protected $fillable = [
        'message',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        // Now any time a new Chirp is created, the ChirpCreated event will be dispatched.
        'created' => ChirpCreated::class,
    ];
    // Now that we're dispatching an event, we're ready to listen for that event and send our notification.
    // 
    //Let's create a listener that subscribes to our ChirpCreated event:

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
