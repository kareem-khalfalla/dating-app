<?php

namespace App\Traits;

use Hootlex\Friendships\Models\Friendship;
use Hootlex\Friendships\Status;
use Hootlex\Friendships\Traits\Friendable as TraitsFriendable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

trait Friendable
{
    use TraitsFriendable;

    /**
     * @param Model $recipient
     *
     * @return \Hootlex\Friendships\Models\Friendship|false
     */
    public function befriend(Model $recipient)
    {

        if (!$this->canBefriend($recipient)) {
            return false;
        }

        $friendship = (new Friendship())->fillRecipient($recipient)->fill([
            'status' => Status::PENDING,
        ]);

        $this->friends()->save($friendship);

        Event::dispatch('friendships.sent', [$this, $recipient]);

        return $friendship;
    }

    /**
     * @param Model $recipient
     *
     * @return bool
     */
    public function unfriend(Model $recipient)
    {
        $deleted = $this->findFriendship($recipient)->delete();

        Event::dispatch('friendships.cancelled', [$this, $recipient]);

        return $deleted;
    }


    /**
     * @param Model $recipient
     *
     * @return bool|int
     */
    public function acceptFriendRequest(Model $recipient)
    {
        $updated = $this->findFriendship($recipient)->whereRecipient($this)->update([
            'status' => Status::ACCEPTED,
        ]);

        Event::dispatch('friendships.accepted', [$this, $recipient]);

        return $updated;
    }

    /**
     * @param Model $recipient
     *
     * @return bool|int
     */
    public function denyFriendRequest(Model $recipient)
    {
        $updated = $this->findFriendship($recipient)->whereRecipient($this)->update([
            'status' => Status::DENIED,
        ]);

        Event::dispatch('friendships.denied', [$this, $recipient]);

        return $updated;
    }


    /**
     * @param Model $recipient
     *
     * @return \Hootlex\Friendships\Models\Friendship
     */
    public function blockFriend(Model $recipient)
    {
        // if there is a friendship between the two users and the sender is not blocked
        // by the recipient user then delete the friendship
        if (!$this->isBlockedBy($recipient)) {
            $this->findFriendship($recipient)->delete();
        }

        $friendship = (new Friendship)->fillRecipient($recipient)->fill([
            'status' => Status::BLOCKED,
        ]);

        $this->friends()->save($friendship);

        Event::dispatch('friendships.blocked', [$this, $recipient]);

        return $friendship;
    }

    /**
     * @param Model $recipient
     *
     * @return bool
     */
    public function isBlockedBy(Model $recipient)
    {
        return $recipient->hasBlocked($this);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Friendship[]
     */
    public function getFriendRequests()
    {
        return Friendship::whereRecipient($this)->whereStatus(Status::PENDING)->get();
    }

    /**
     * This method will not return Friendship models
     * It will return the 'friends' models. ex: App\User
     *
     * @param int $perPage Number
     * @param string $groupSlug
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFriends($perPage = 0, $groupSlug = '')
    {
        return $this->getOrPaginate($this->getFriendsQueryBuilder($groupSlug), $perPage);
    }
}
